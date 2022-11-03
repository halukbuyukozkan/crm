<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $birthday = User::whereDay('birthdate', Carbon::now()->format('d'))->get()->first();

        $sliders = Slider::paginate();

        return view('goodssol.index',compact('birthday','sliders'));
    }
}
