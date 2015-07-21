<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Goal;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $goals = Goal::get();
    
        return response()->json([
            'msg' => 'Success',
            'goals'=> $goals->toArray()
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
        $goal = new Goal();
        $goal->type = $request->type;
        $goal->position = $request->position;
        $goalStatus = GoalStatus::find(1);
        $goal->status()->associate($goalStatus);
        $goal->save();

        return response()->json([
            'msg' => 'Success',
            'goal'=> $goal,
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
        $goal = Goal::find($id);

        return response()->json([
            'msg' => 'Success',
            'goal'=>$goal,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $goal = Goal::find($id);
        $goal->delete();

        return response()->json([
            'msg' => 'Success',
            ], 200
        );
    }
}
