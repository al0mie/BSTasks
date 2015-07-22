<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Goal;
use App\Status;

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
            'Message' => 'Success',
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

        $validator = Validator::make($request->all(), Goal::$rules);
        
        if ($validator->fails()) {
            return response()->json([$validator->rules()], 500);
        }

        $goal->type = $request->type;
        $goal->position = $request->position;
        $goalStatus = GoalStatus::find(1);
        $goal->status()->associate($goalStatus);
        $goal->save();

        return response()->json([
            'Message' => 'Success',
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
    {   try {
            $goal = Goal::find($id);
        } catch (Exception $ex) {
            return  return response()->json([
                'Message' => 'Fail',
            ], 200);
        }
        return response()->json([
            'Message' => 'Success',
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
    {   try {
            $goal = Goal::find($id);
            $goal->type = $request->type;
            $status = Status::find($request->status_id);
            $goal->status = $status->status;
            $goal->save();
            return response()->json([
                'Message' => 'Success',
                'goal'=>$member,
                ], 200);

        } catch (Exception $ex) {
             return response()->json([
                'Message' => 'Fail',
                ], 500
            );
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
            'Message' => 'Success',
            ], 200
        );
    }
}
