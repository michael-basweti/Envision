<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
class VideoController extends Controller
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

      public function boot()
    {
        View::share('/home');
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
            'post_video'=>'required|mimes:mp4,mkv,x-flx,x-mpegURL,3gpp,qt,x-msvideo,x-ms-wmv|max:14999'
       ]);
       //Handle File Upload
        if($request->hasFile('post_video')){
                          //get filename with extension
                $filenameWithExt=$request->file('post_video')->getClientOriginalName();
              //Get Just FileName
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
              //Get Just ext.
                $extension=$request->file('post_video')->getClientOriginalExtension();
                //Filename To Store
                $fileNameToStore=$filename. '_' .time() . '.'. $extension;
                //upload image  
                $path=$request->file('post_video')->storeAs('public/post_videos',$fileNameToStore);

        }else{
            $fileNameToStore='noimage.jpg';
          
        }
       //Create Post
       $video=new Video;
       
       $video->body=$request->input('body');
       $video->user_id=auth()->user()->id;
       $video->avatar=auth()->user()->avatar;
       $video->name=auth()->user()->name;
       $video->post_video=$fileNameToStore;
       $video->save();

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
        $video= Video::find($id);
        
                if(auth()->user()->id !==$video->user_id){
                    return redirect('profile')->with('error','Unathorised Page');
                }
        
                return view('videos.edit')->with('video',$video);
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
            'post_video'=>'nullable|mimes:mp4,x-flx,x-mpegURL,3gpp,qt,x-msvideo,x-ms-wmv|max:14999'
       ]);
         //Handle File Upload
         if($request->hasFile('post_video')){
            //get filename with extension
  $filenameWithExt=$request->file('post_video')->getClientOriginalName();
//Get Just FileName
  $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
//Get Just ext.
  $extension=$request->file('post_video')->getClientOriginalExtension();
  //Filename To Store
  $fileNameToStore=$filename. '_' .time() . '.'. $extension;
  //upload image  
  $path=$request->file('post_video')->storeAs('public/post_videos',$fileNameToStore);

}
       //Create Post
       $video=Video::find($id);
       
       $video->body=$request->input('body');
       if($request->hasFile('post_video')){
           $video->post_video=$fileNameToStore;
       }
       $video->save();

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
        $video=Video::find($id);
        
                if(auth()->user()->id !==$video->user_id){
                    return redirect('/profile')->with('error','Unathorised Page');
                }
                if($video->post_video!='noimage.jpg'){
                    //delete image
                    Storage::delete('public/post_videos/'.$video->post_video);
                }
        
        
                $video->delete();
                return redirect('/profile')->with('success','Video Deleted');
    }
}
