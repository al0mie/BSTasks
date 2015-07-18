<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Input;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator; 
use App\User;
use App\Book;
use DB;
use App\Jobs\SendEmailForReminde;

/**
 * Controller for entity for  user
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index','show','getSignout']]);
    }

     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request::user()->admin){
              $users = User::paginate(10);
              return view('user.index', array('users' => $users));
        }
      
        $books = $request::user()->books()->paginate(10);
        return redirect('/user/' . $request::user()->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {   
        $request::merge(array_map('trim', $request::all()));  //delete spaces
        $validator = Validator::make($request::all(), User::$rules);
        $req = $request::all();
   
        if($validator->fails()){
            return Redirect::to('user/create')
                            ->withErrors($validator)
                            ->withInput();
        }
        
        $user = new User();
        $user->firstname = $req['firstname'];
        $user->lastname = $req['lastname'];
        $user->email = $req['email'];
        $user->save();
        Session::flash('message', 'Succefully created user');
        return Redirect::to('user');
    }

    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {   $user = User::find($id);
        $books = $user->books;
        return view('user.show_books', array('books' => $books, 'user'=>$user));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', array('user' => $user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {   
        $request::merge(array_map('trim', $request::all()));  //delete spaces
        $req = $request::all();
        $rules = User::$rules;
        $rules['email'] .= $id;  //required to pass validation for unique on own data
        $validator = Validator::make($request::all(), $rules);
 
        if($validator->fails()){
              return Redirect::to('user/'.$id.'/edit')
                            ->withErrors($validator)
                            ->withInput();
        }

        $user = User::find($id);
        $user->firstname = $req['firstname'];
        $user->lastname = $req['lastname'];
        $user->email = $req['email'];
        $user->save();
        Session::flash('message', 'Succefully updated user');
        return Redirect::to('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {   
        $user = User::find($id);
        $user->delete();
        Session::flash('message', 'Succefully deleted user with id #' . $user->id);
        return Redirect::to('user');
    }

    /**
     * Call form for adding a book from not engaged book list
     *
     * @param int $id 
     */
    public function add_book($id)
    {  
        $user = User::find($id);
        $books = DB::table('books')->lists('title','id');
        return view('user.add_book', array('user' => $user,  'books' => $books));
    }   

    /**
     * Call to save data 
     *
     * @param $id 
    */
    public function save_book($id)
    {      
        $req = Input::all();
        $book = Book::find($req['title']);
        $user = User::find($id);
        $user->books()->attach($book->id, ['date_booking' => Carbon::now()]);
        $user->save();
        $job = (new SendEmailForReminde($user, $book))->delay('2592000'); //set mounth in seconds
        $this->dispatch($job);
        Session::flash('message', 'Succefully added book to user #'.$id);
        return Redirect::to('user');
    } 

    public function getSignout()
    {
        Auth::logout();
        Session::flash('message', 'Succefully sign out');
        return Redirect::to('auth/login');
    }
}
