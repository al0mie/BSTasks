<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
         
        $members = Member::get();
    
        return response()->json([
            'Message' => 'Success',
            'member'=> $member->toArray()
            ], 200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $member = new Member();

        $validator = Validator::make($request->all(), Member::$rules);
        
        if ($validator->fails()) {
            return response()->json([$validator->rules()], 500);
        }

        $member->name = $request->name;
        $member->position = $request->position;
        $member->save();

        return response()->json([
            'Message' => 'Success',
            'member'=> $member,
            ], 200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $member = Member::find($id);
        } catch (Exception $ex) {
            return response()->json([
              'Message' => 'Fail',
            ], 404
        );
        }
        return response()->json([
            'Message' => 'Success',
            'member'=>$member,
            ], 200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try {
            $member = Member::find($id);
            $member->name = $request->name;
            $member->position = $request->position;
            $member->save();

            return response()->json([
                'Message' => 'Success',
                'member'=>$member,
                ], 200
            );
        catch (Exception $ex) {
             return response()->json([
                'Message' => 'Fail',
                ], 500
            );
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return response()->json([
            'Message' => 'Success',
            ], 200
        );
    }
}
