<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mission;
use App\Status;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $missions = Mission::get();
       
        return response()->json([
            'Message' => 'Success',
            'missions'=> $missions->toArray()
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
        $mission = new Mission();
        $validator = Validator::make($request->all(), Mission::$rules);
        
        if ($validator->fails()) {
            return response()->json([$validator->rules()], 500);
        }

        $mission->name = $request->name;
        $mission->status = 'planned';
        $mission->save();

        return response()->json([
            'Message' => 'Success',
            'missions'=> $mission,
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
            $mission = Mission::find($id);
        } catch (Exception $ex) {
            return response()->json([
                'Message' => 'Fail',
                ], 404
        );
        }
        return response()->json([
            'Message' => 'Success',
            'mission'=> $mission
            ], 200
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
        $mission = Mission::find($id);
        $mission->delete();

        return response()->json([
            'Message' => 'Success',
            ], 200
        );
    }


    public function postMember(Request $request, $id)
    {   
        try {
            $mission = Mission::find($id);
            $member = Member::find($request->id);
            $mission->members()->attach($member->id);

            return response()->json([
                'Message' => 'Success',
                ], 200
            );
        }
        catch (Exception $ex) {
             return response()->json([
                'Message' => 'Fail',
                ], 500
            );
        }
    }

    public function getMembers($id) {
        try {
            $mission = Mission::find($id);
            $members = $mission->members;
            return response()->json([
                'Message' => 'Success',
                'members'=> $members,
                ], 200
            );
        catch (Exception $ex) {
             return response()->json([
                'Message' => 'Fail',
                ], 500
            );
        }
    }

    public function postGoal(Request $request, $id)
    {
        try {
            $mission = Mission::find($id);
            $goal = Goal::find($request->id);
            $goal->mission()->associate($mission);

            return response()->json([
                'Message' => 'Success',
                ], 200
            );
        }
        catch (Exception $ex) {
           return response()->json([
                'Message' => 'Fail',
                ], 500
            ); 
        }
    }
    
    public function getGoals($id) {
        try {
            $mission = Mission::find($id);
            $goals = $mission->goals;
            return response()->json([
                'Message' => 'Success',
                'goals'=> $goals,
                ], 200
            );
        } catch (Exception $ex) {
            return response()->json([
                'Message' => 'Fail',
               ], 404
            );  
        }
    }


    public function putStatusMission(Request $request, $id)
    {
        try {
            $mission = Mission::find($id);
            $status = Status::find($request->id);

            if ($status->status == 'achieved' || $status->status == 'cancelled') {
                foreach ($mission->members as $member) {
                    $mission->members()->detach($member->id);
                }
                if ($status->status == 'cancelled') {
                    foreach ($mission->goals as $goal) {
                        if ($goal->status != 'completed')
                            $goal->status = 'cancelled';
                    }  
                }
            }
            $mission->status =$status->status;
            $mission->save();
            return response()->json([
                'msg' => 'Success',
                ], 200
            );
        } catch (Exception $ex) {
            return response()->json([
                'Message' => 'Fail',
                ], 500
            );
        }    
    }
}
