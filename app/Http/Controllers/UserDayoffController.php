<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Dayoff;
use App\Enum\DayoffTypeEnum;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

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
        $dayoffs = Dayoff::ofUser();
        
        return view('dayoff.index',compact('dayoffs','user'));
    }

    public function calendar()
    {
        $userdayoffs = Dayoff::ofUser();
        $types = DayoffTypeEnum::cases();

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
        $holidays = $this->holidays();
        $today = Carbon::now()->format('Y-m-d');

        return view('dayoff.calendar',compact('dayoffs','user','holidays','types','today'));
    }

    private function holidays()
    {
        $client = new Client();
        $response = $client->post('https://api.ubilisim.com/resmitatiller/');
        $result = $response->getBody()->getContents();
        $results = json_decode($result);
        $holidays = $results->resmitatiller;

        return $holidays;
    }

    public function approve(Request $request, User $user,Dayoff $dayoff)
    {
        $dayoff->is_approved = 1;
        $dayoff->color = 'green';
        $dayoff->update();

        $start = new DateTime($dayoff->start_date);
        $end = new DateTime($dayoff->end_date);
        $days = $start->diff($end)->d;
        if($dayoff->type == 'Ücretli İzin'){
            $daysleft = $dayoff->user->dayoff - $days;
            $dayoff->user->dayoff = $daysleft;
            $dayoff->user->update();
        }

        return redirect()->route('admin.user.dayoff.index',['user' => $user])->with('success', __('Dayoff approved successfully.'));
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
        $validated = $request->validate([
            'title' => 'required|string',
            'type' => 'nullable'
        ]);

        $dayoff = Dayoff::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'type' => $request->type,
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

        if($dayoff->color != 'green') {
            $dayoff->update([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
        }

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

    public function destroyindex(User $user,Dayoff $dayoff)
    {
        $dayoff->delete();
        
        return redirect()->route('admin.user.dayoff.index',$user);
    }
}
