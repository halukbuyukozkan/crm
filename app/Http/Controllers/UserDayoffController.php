<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dayoff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Generator\StringManipulation\Pass\Pass;

class UserDayoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $dayoffs = $user->dayoffs;

        return view('dayoff.index',compact('dayoffs','user'));
    }

    public function calendar()
    {
        $userdayoffs = Dayoff::all();
        $dayoffs = null;
        foreach($userdayoffs as $dayoff){
            $dayoffs[] = [
                'id' => $dayoff->id,
                'title' => $dayoff->title,
                'start' => $dayoff->start_date,
                'end' => $dayoff->end_date,
                'color' => $dayoff->color,
            ];
        }

        $user = Auth::user();

        return view('dayoff.calendar',compact('dayoffs','user'));
    }

    public function approve(Request $request, User $user,Dayoff $dayoff)
    {
        $dayoff->is_approved = 1;
        $dayoff->color = 'green';
        $dayoff->update();

        return redirect()->route('admin.user.dayoff.index',['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'title' => 'required|string'
        ]);
        
        $dayoff = Dayoff::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'is_approved' => 0,
            'color' => 'primary',
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json($dayoff);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dayoff  $dayoff
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Dayoff $dayoff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dayoff  $dayoff
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Dayoff $dayoff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dayoff  $dayoff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Dayoff $dayoff)
    {
        if(! $dayoff) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }

        $dayoff->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json('Event updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Dayoff  $dayoff
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Dayoff $dayoff)
    {
        if(! $dayoff) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        $dayoff->delete();

        return $dayoff;
    }
}
