<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        try{
            return view('home');

        }catch (\Exception $e){
            $data = [
                'action' => 'home View',
                'exception' => $e->getMessage(),
            ];
            Log::critical(json_encode($data));
        }
    }
}
