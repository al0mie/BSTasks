<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator; 
use App\Book;
use App\User;
use DB;

/**
 * Controller for entity of book
 *
 * @author Aleksandr Mokrenko <alex.mokrencko@yandex.ru>
 */
class BookController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin', ['except' => ['drop']]);
    }
   /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    { 
        $books = Book::paginate(10);
        return view('book.index', array('books' => $books));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request::merge(array_map('trim', $request::all()));  //delete spaces
        $validator = Validator::make($request::all(), Book::$rules);

        $req = $request::all();
     
        if($validator->fails()){
            return Redirect::to('book/create')
                            ->withErrors($validator)
                            ->withInput();
        }

        $book = new Book();
        $book->title = $req['title'];
        $book->author = $req['author'];
        $book->year = $req['year'];
        $book->genre = $req['genre'];
        $book->save();
        $job = (new SendEmailForNotification($book))->onQueue('emails');
        $this->dispatch($job);
        Session::flash('message', 'Succefully created book');
        return Redirect::to('book');
    }

    /**
     * Display the specified resource.  
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $users = DB::table('users')->distinct()->lists('email','id'); 
        return view('book.edit', array('book' => $book, 'users'=> $users));
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
        $validator = Validator::make($request::all(), Book::$rules);
        $req = $request::all();
       
        if($validator->fails()){
            return Redirect::to('book/'.$id.'/edit')
                            ->withErrors($validator)
                            ->withInput();
        }

        $book = Book::find($id);
        $book->title = $req['title'];
        $book->author = $req['author'];
        $book->year = $req['year'];
        $book->genre = $req['genre'];
        $book->user()->associate(User::find($req['owner']));
        $book->save();
        Session::flash('message', 'Succefully updated book');
        return Redirect::to('book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {   
        $book = Book::find($id);
        $book->delete();
        Session::flash('message', 'Succefully deleted book with id #' . $book->id);
        return Redirect::to('book');
    }
    
    /**
     * Remove assiciation from book
     *
     * @param int $id 
     *
     * @return Redirect 
     */
    public function drop($id)
    {  
       $book = Book::find($id);
       $book->user()->dissociate();
       $book->save();
       return Redirect::back();
    }
}
