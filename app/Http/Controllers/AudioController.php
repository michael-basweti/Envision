<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Audio;
use Illuminate\Support\Facades\Storage;

class AudioController extends Controller
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
        $this->validate($request, [
            
            'body'=>'required', 
            'post_audio'=>'required|mimes:mpeg,mpga,ogg,wav,mp2a,mp3,mp2,m3a,m|max:14999'
       ]);
       //Handle File Upload
        if($request->hasFile('post_audio')){
                          //get filename with extension
                $filenameWithExt=$request->file('post_audio')->getClientOriginalName();
              //Get Just FileName
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
              //Get Just ext.
                $extension=$request->file('post_audio')->getClientOriginalExtension();
                //Filename To Store
                $fileNameToStore=$filename. '_' .time() . '.'. $extension;
                //upload image  
                $path=$request->file('post_audio')->storeAs('public/post_audio',$fileNameToStore);

        }else{
            $fileNameToStore='noimage.jpg';
          
        }
       //Create Post
       $audios=new Audio;
       
       $audios->body=$request->input('body');
       $audios->user_id=auth()->user()->id;
       $audios->avatar=auth()->user()->avatar;
       $audios->name=auth()->user()->name;
       $audios->post_audio=$fileNameToStore;
       $audios->save();

       return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
        $audio= Audio::find($id);
        
                if(auth()->user()->id !==$audio->user_id){
                    return redirect('profile')->with('error','Unathorised Page');
                }
        
                return view('audio.edit')->with('audio',$audio);
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
        $this->validate($request, [
            
            'body'=>'required',
            'post_audio'=>'nullable|mimes:mpeg,mpga,ogg,wav,mp2a,mp3,mp2,m3a,m|max:14999'
       ]);
         //Handle File Upload
         if($request->hasFile('post_audio')){
            //get filename with extension
  $filenameWithExt=$request->file('post_audio')->getClientOriginalName();
//Get Just FileName
  $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
//Get Just ext.
  $extension=$request->file('post_audio')->getClientOriginalExtension();
  //Filename To Store
  $fileNameToStore=$filename. '_' .time() . '.'. $extension;
  //upload image  
  $path=$request->file('post_audio')->storeAs('public/post_audio',$fileNameToStore);

}
       //Create Post
       $audio=Audio::find($id);
       
       $audio->body=$request->input('body');
       if($request->hasFile('post_audio')){
           $audio->post_audio=$fileNameToStore;
       }
       $audio->save();

       return redirect('/profile')->with('success','Post Updated');
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
        $audio=Audio::find($id);
        
                if(auth()->user()->id !==$audio->user_id){
                    return redirect('/profile')->with('error','Unathorised Page');
                }
                if($audio->post_audio!='noimage.jpg'){
                    //delete image
                    Storage::delete('public/post_audio/'.$audio->post_audio);
                }
        
        
                $audio->delete();
                return redirect('/profile')->with('success','Audio Deleted');
    }
}
