<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Photo;
class PhotosController extends Controller
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
            'post_image'=>'image|required|max:1999'
       ]);
       //Handle File Upload
        if($request->hasFile('post_image')){
                          //get filename with extension
                $filenameWithExt=$request->file('post_image')->getClientOriginalName();
              //Get Just FileName
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
              //Get Just ext.
                $extension=$request->file('post_image')->getClientOriginalExtension();
                //Filename To Store
                $fileNameToStore=$filename. '_' .time() . '.'. $extension;
                //upload image  
                $path=$request->file('post_image')->storeAs('public/post_images',$fileNameToStore);

        }else{
            $fileNameToStore='noimage.jpg';
          
        }
       //Create Post
       $post=new Photo;
       
       $post->body=$request->input('body');
       $post->user_id=auth()->user()->id;
       $post->avatar=auth()->user()->avatar;
       $post->name=auth()->user()->name;
       $post->post_image=$fileNameToStore;
       $post->save();

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
        $photo= Photo::find($id);
        
                if(auth()->user()->id !==$photo->user_id){
                    return redirect('profile')->with('error','Unathorised Page');
                }
        
                return view('photos.edit')->with('photo',$photo);
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
            
            'body'=>'required'
       ]);
         //Handle File Upload
         if($request->hasFile('post_image')){
            //get filename with extension
  $filenameWithExt=$request->file('post_image')->getClientOriginalName();
//Get Just FileName
  $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
//Get Just ext.
  $extension=$request->file('post_image')->getClientOriginalExtension();
  //Filename To Store
  $fileNameToStore=$filename. '_' .time() . '.'. $extension;
  //upload image  
  $path=$request->file('post_image')->storeAs('public/post_images',$fileNameToStore);

}
       //Create Post
       $photo=Photo::find($id);
       
       $photo->body=$request->input('body');
       if($request->hasFile('post_image')){
           $photo->post_image=$fileNameToStore;
       }
       $photo->save();

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
        $photo=Photo::find($id);
        
                if(auth()->user()->id !==$photo->user_id){
                    return redirect('/profile')->with('error','Unathorised Page');
                }
                if($photo->post_image!='noimage.jpg'){
                    //delete image
                    Storage::delete('public/post_images/'.$photo->post_image);
                }
        
        
                $photo->delete();
                return redirect('/profile')->with('success','Photo Deleted');
    }
}
