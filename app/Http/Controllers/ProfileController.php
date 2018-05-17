<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;




class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts=DB::select('select * from posts');
        $photos=DB::select('select * from photos');
        $videos=DB::select('select * from videos');
        $audios=DB::select('select * from audio');
        $posts=DB::table('posts')->orderBy('created_at','asc')->get();
        $videos=DB::table('videos')->orderBy('created_at','desc')->get();
        $photos=DB::table('photos')->orderBy('created_at','desc')->get();
        $audios=DB::table('audio')->orderBy('created_at','desc')->get();
       
        return view('profile',['photos'=>$user->photos,'posts'=>$user->posts,
        'audios'=>$user->audios,'videos'=>$user->videos]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
