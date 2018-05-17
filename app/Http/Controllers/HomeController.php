<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Home;


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
       $user_id = auth()->user()->id;
        $user = User::find($user_id);
        //return view('home');
        $posts=DB::select('select * from posts');
        $photos=DB::select('select * from photos');
        $videos=DB::select('select * from videos');
        $audios=DB::select('select * from audio');
        $posts=DB::table('posts')->orderBy('created_at','desc')->get();
        $videos=DB::table('videos')->orderBy('created_at','desc')->get();
        $photos=DB::table('photos')->orderBy('created_at','desc')->get();
        $audios=DB::table('audio')->orderBy('created_at','desc')->get();
       
        return view('home',['posts'=>$posts,'photos'=>$photos,'videos'=>$videos,'audios'=>$audios]);

        
        
        

       
    }
}
