<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mission;
use App\MissionStatus;
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
            'msg' => 'Success',
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
        $mission->name = 'Apollo';
        $missionStatus = MissionStatus::find(1);
        $mission->status()->associate($missionStatus);
        $mission->save();

        return response()->json([
            'msg' => 'Success',
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
        $mission = Mission::find($id);

        return response()->json([
            'msg' => 'Success',
            'mission'=>$mission
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
        $mission = Mission::find($id);
        $mission->delete();

        return response()->json([
            'msg' => 'Success',
            ], 200
        );
    }


    public function addMember(Request $request, $id)
    {
        $mission = Mission::find($id);
        $member = Member::find($request->id);
        $mission->members()->attach($member->id);

        return response()->json([
            'msg' => 'Success',
            ], 200
        );
    }

    public function addGoal(Request $request, $id)
    {
        $mission = Mission::find($id);
        $goal = Goal::find($request->id);
        $goal->mission()->associate($mission);

        return response()->json([
            'msg' => 'Success',
            ], 200
        );
    }

    public function changeStatus(Request $request, $id)
    {
        $mission = Mission::find($id);
        $status = MissionStatus::find($request->id);

        if ($status->status == 'achieved' || $status->status == 'cancelled') {
            foreach ($mission->members as $member) {
                $mission->members()->detach($member->id);
            }
            if ($status->status == 'cancelled') {
                foreach ($mission->goals as $goal) {
                    $goal->mission()->dissociate();
                }  
            }
        }

        $mission->status()->associate($status);

        return response()->json([
            'msg' => 'Success',
            ], 200
        );
    }



}
