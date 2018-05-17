<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
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
        $posts= Post::all();
        return view('/home')->with('home',$posts);
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
            
       ]);
      
       //Create Post
       $post=new Post;
      
       $post->body=$request->input('body');
      $post->user_id=auth()->user()->id;
      $post->avatar=auth()->user()->avatar;
      $post->name=auth()->user()->name;
       
       $post->save();

       return redirect('/home')->with('success','Your post has been uploaded');
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
        $post= Post::find($id);
        
                if(auth()->user()->id !==$post->user_id){
                  return redirect('/home')->with('error','Unathorised Page');
               }
        
                return view('/home')->with('home',$post);
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
        $post= Post::find($id);
        
                if(auth()->user()->id !==$post->user_id){
                    return redirect('/profile')->with('error','Unathorised Page');
                }
        
                return view('posts.edit')->with('post',$post);
            
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
   
   //Create Post
   $post=Post::find($id);
   
   
   $post->body=$request->input('body');
  
   $post->save();

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
        $post=Post::find($id);
        
                if(auth()->user()->id !==$post->user_id){
                    return redirect('/profile')->with('error','Unathorised Page');
                }
                
        
        
                $post->delete();
                return redirect('/profile')->with('success','Post Deleted');
    }
}
