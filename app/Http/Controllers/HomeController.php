<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user=User::all();
        return view('home');
    }

    /**
     * Method for Displaying all users of User table using Yajara Database Table
     */

    public function getuser(){

        return Datatables::of(User::query())->make(true);
    }

}



