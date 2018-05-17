@extends('layouts.app')

@section('content')


<div class="row" style="margin-left:0px;">
  {{--user info--}}
	<div class="col-md-3  user-scroll" >

        <div class="card" >
            
            <div class="row">
              <div class="col-md-2 "> <img src="/uploads/avatars/{{Auth::user()->avatar }}" style="width:40px; height:40px; float:left;
                border-radius:50%; margin-right:25px"> </div>
              <div class="col-md-10">{{ Auth::user()->first_name }}</div>
               
        </div>
        
        <hr>
        <h6><b>Who Am I?</b></h6>
        <span class="border border-danger">
          {!! Auth::user()->description !!}
        </span>
        <div class="row">
          <div class="col-md-5">
          <h6><b>From:</b></h6>
        {!! Auth::user()->home_town !!}</div>
          <div class="col-md-7">
            <h6><b>Current Location:</b></h6>
            {!! Auth::user()->current_city !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-5">
              <h6><b>First Name:</b></h6>
               {!! Auth::user()->first_name !!}
          </div>
          <div class="col-md-7">
              <h6><b>Second Name:</b></h6>
              {!! Auth::user()->second_name !!}
          </div>
        </div>
          <div class="row">
          <div class="col-md-5">
         <h6><b>Nickname:</b></h6>
          
        {!! Auth::user()->nick_name !!}
        </div>
          <div class="col-md-7">
             <h6><b>Gender:</b></h6>
        {!! Auth::user()->Gender !!}
          </div>
        </div>
        
       
        <h6><b>Email:</b></h6>
        {!! Auth::user()->email !!}
        <h6><b>Phone Number:</b></h6>
        {!! Auth::user()->phone !!}
        <h6><b>Website:</b></h6>
        <a href="{!! Auth::user()->website !!}">{!! Auth::user()->website !!}</a>
         <h6><b>Date of birth:</b></h6>
        {!! Auth::user()->year !!}
         
        <hr>
        <a class="btn btn-primary btn-sm" href="editprofile" >Edit your information>></a>
        
            
              
               
        </div>
        
    </div>
    {{--end of user info--}}
	<div class="col-md-6  h-scroll" style="border-left:1px solid #000;height:500px" >
        <div class="card" >
            <div class="card-header" class="col-md-offset-1 col-md-4">
                    <ul class="nav nav-tabs card-header-tabs">
                      {{--photos tab--}}
                            <li class="nav-item">
                                
                              <a class="nav-link" href="#" style="position:relative;padding-left:50px;" data-toggle="modal" data-target="#exampleModal">
                                  <img src="/uploads/avatars/photo_icon.png" style="width:32px;height:32px;position:absolute; left:10px;top:10px;border-radius:50%;">
                                Upload Photos
                                  
                              </a>
                            </li> | 
                            {{--video tab--}}
                            <li class="nav-item">
                              <a class="nav-link" href="#" style="position:relative;padding-left:50px;" data-toggle="modal" data-target="#exampleModal1">
                                  <img src="/uploads/avatars/video_icon.png" style="width:32px;height:32px;position:absolute; left:10px;top:10px;border-radius:50%;">
                                Upload Videos</a>
                            </li> |
                            {{--audio tab--}}
                            <li class="nav-item">
                              <a class="nav-link" href="#" style="position:relative;padding-left:50px;" data-toggle="modal" data-target="#exampleModal2">
                                  <img src="/uploads/avatars/audio_icon.png" style="width:32px;height:32px;position:absolute; left:10px;top:10px;border-radius:50%;">
                                Upload Audio</a>
                            </li>
                          </ul>
                        
                          {{--upload of photos--}}

                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"><img src="/uploads/avatars/{{Auth::user()->avatar }}" style="width:40px; height:40px; float:left;
                                    border-radius:50%; margin-right:25px"> Upload Photo</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    
                                    {!! Form::open(['action'=>'PhotosController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                    @csrf
                                            <div class="form-group">
                            
                                            {{Form::textArea('body','',['class'=>'form-control','placeholder'=>'inspire one person today','rows'=>5])}}
                                        </div>
                                        
                                        <div class="form-group">
                                            {{Form::file('post_image')}}
                                            
                                        </div>
                                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                                        
                                    {!! Form::close() !!}
                                </div>
                                <div class="modal-footer">
                                 
                                </div>
                              </div>
                            </div>
                          </div>

                          {{--upload of videos--}}

                          <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"><img src="/uploads/avatars/{{Auth::user()->avatar }}" style="width:40px; height:40px; float:left;
                                    border-radius:50%; margin-right:25px"> Upload Video</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    
                                    {!! Form::open(['action'=>'VideoController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                      @csrf
                                            <div class="form-group">
                            
                                            {{Form::textArea('body','',['class'=>'form-control','placeholder'=>'inspire one person today','rows'=>5,'cols'=>10])}}
                                        </div>
                                        
                                        <div class="form-group">
                                            {{Form::file('post_video')}}
                                        </div>
                                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                                        
                                    {!! Form::close() !!}
                                </div>
                                <div class="modal-footer">
                                 
                                </div>
                              </div>
                            </div>
                          </div>

                          {{--upload of audio--}}

                          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel"><img src="/uploads/avatars/{{Auth::user()->avatar }}" style="width:40px; height:40px; float:left;
                                    border-radius:50%; margin-right:25px"> Upload Audio</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    
                                    {!! Form::open(['action'=>'AudioController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                                    @csrf
                                            <div class="form-group">
                            
                                            {{Form::textArea('body','',['class'=>'form-control','placeholder'=>'inspire one person today','rows'=>5,'cols'=>10])}}
                                        </div>
                                        
                                        <div class="form-group">
                                            {{Form::file('post_audio')}}
                                        </div>
                                        {{Form::submit('Submit',['class'=>'pull-right btn btn-primary '])}}
                                        
                                    {!! Form::close() !!}
                                </div>
                                <div class="modal-footer">
                                 
                                </div>
                              </div>
                            </div>
                          </div>
            </div>
            
            <div class="card-body" >
                
                {!! Form::open(['action'=>'PostsController@store','method'=>'POST']) !!}
                @csrf
                     <div class="form-group">
     
                     {{Form::textArea('body','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'inspire one person today' ,'rows'=>3,'cols'=>10])}}
                     </div>
                 {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                 
             {!! Form::close() !!}
                
              
            </div>
        </div>
        <br>
        <div class="tabset" >
            <!-- Tab 1 -->
            
            <input type="radio" name="tabset" id="tab1" aria-controls="marzen" checked  >
            <label for="tab1" >
              
                  
              
           View Quotes
              </label>
            <!-- Tab 2 -->
            <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier">
            <label for="tab2"> 
             View Photos</label>
            <!-- Tab 3 -->
            <input type="radio" name="tabset" id="tab3" aria-controls="dunkles" >
            <label for="tab3"> 
             View Videos</label>
              {{--audio--}}
              <input type="radio" name="tabset" id="tab4" aria-controls="audio" >
              <label for="tab4"> 
              View Audio</label>
            
            <div class="tab-panels">
              <section id="marzen" class="tab-panel">
                  @if(count($posts) > 0)
                  @foreach($posts as $post)
                 {{--<a href="/posts/{{$post->id}}">--}} 
                    <div class="card">
                      <div class="row" style="position:relative;">
                        <div class="col-md-1">
                        <img src="/uploads/avatars/{{$post->avatar }}" style="width:40px; height:40px; float:left;
                        border-radius:50%; margin-right:25px"> 
                        </div>
                        <div class="col-md-7">
                      <h5>{{$post->name}}</h5>
                        </div>
                        <div class="col-md-2"><button type="button" class="btn btn-sm btn-primary">Follow</button></div>
                        <div class="col-md-2">
                            <div class="dropdown" >
                                <a class=" dropdown-toggle"  data-toggle="dropdown"><small>more</small>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <li><a  href="" >Edit</a></li>
                                  <li><a href="#">Delete</a></li>
                                  {{--<li><a href="#">JavaScript</a></li>--}}
                                </ul>
                              </div>
                        </div>
                        
                      </div>
                      <hr>
                    <p>{!!$post->body!!}</p>
                    <small style="float:right;">{{$post->created_at}}</small>
                    </div>
                    <br> 
        
        
        
                 
                    
                  @endforeach
                

               
        
                 
                @else
                    <p>no posts</p>
                @endif
                <br>
            </section>
              <section id="rauchbier" class="tab-panel">
                  @if(count($photos) > 0)
                  @foreach($photos as $photo)
                 {{--<a href="/posts/{{$post->id}}">--}} 
                    <div class="card">
                      <div class="row">
                        <div class="col-md-1"><img src="/uploads/avatars/{{$photo->avatar }}" style="width:40px; height:40px; float:left;
                          border-radius:50%; margin-right:25px"> </div>
                        
                        <div class="col-md-7"><h5>{{$photo->name}}</h5></div>
                        <div class="col-md-2"><button type="button" class="btn btn-sm btn-primary">Follow</button></div>
                          <div class="col-md-2">
                              <div class="dropdown" style="float:right;margin-top:0%;">
                                  <a class=" dropdown-toggle"  data-toggle="dropdown"><small>more</small>
                                  <span class="caret"></span></a>
                                  <ul class="dropdown-menu">
                                  <li><a  href="" >Edit</a></li>
                                    <li><a href="#">Delete</a></li>
                                    {{--<li><a href="#">JavaScript</a></li>--}}
                                  </ul>
                                </div>
                              
                            </div>
                          </div>
                        
                      <hr>
                    <p>{!!$photo->body!!}</p>
                    <img  class="img-thumbnail" alt="..." src="/storage/post_images/{{$photo->post_image}}" >
                    <small style="float:right;">{{$photo->created_at}}</small>
                    </div>
                    <br>
          
          
                   
                 
                    
                  @endforeach
               
          
                 
                @else
                    <p>no posts</p>
                @endif
                 
              </section>
              <section id="dunkles" class="tab-panel">
                  @if(count($videos) > 0)
                  @foreach($videos as $video)
                 {{--<a href="/posts/{{$post->id}}">--}} 
                    <div class="card">
                      <div class="row">
                        <div class="col-md-1">
                            <img src="/uploads/avatars/{{$video->avatar }}" style="width:40px; height:40px; float:left;
                            border-radius:50%; margin-right:25px"> 
                        </div>
                        <div class="col-md-7"><h5>{{$video->name}}</h5></div>
                        <div class="col-md-2"><button type="button" class="btn btn-sm btn-primary">Follow</button></div>
                        <div class="col-md-2">
                            <div class="dropdown" style="float:right;margin-top:0%;">
                                <a class=" dropdown-toggle"  data-toggle="dropdown"><small>more</small>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <li><a  href="" >Edit</a></li>
                                  <li><a href="#">Delete</a></li>
                                  {{--<li><a href="#">JavaScript</a></li>--}}
                                </ul>
                              </div>
                           
                          </div>
                        </div>
                       
                      <hr>
                    <p>{!!$video->body!!}</p>
                    <div class="embed-responsive embed-responsive-4by3">
                        <video loop width="320" height="240" controls>
                                <source  src="/storage/post_videos/{{$video->post_video}}" >
                                
                        </video>
                  </div>
                    <small style="float:right;">{{$video->created_at}}</small>
                    </div>
                    <br>
          
          
                   
                 
                    
                  @endforeach
               
          
                 
                @else
                    <p>no posts</p>
                @endif
              </section>
              <section id="audio" class="tab-panel">
                  @if(count($audios) > 0)
                  @foreach($audios as $audio)
                 {{--<a href="/posts/{{$post->id}}">--}} 
                    <div class="card">
                      <div class="row" style="position:relative;">
                        <div class="col-md-1">
                        <img src="/uploads/avatars/{{$audio->avatar }}" style="width:40px; height:40px; float:left;
                        border-radius:50%; margin-right:25px"> 
                        </div>
                        <div class="col-md-7">
                      <h5>{{$audio->name}}</h5>
                        </div>
                        <div class="col-md-2"><button type="button" class="btn btn-sm btn-primary">Follow</button></div>
                        <div class="col-md-2">
                            <div class="dropdown" >
                                <a class=" dropdown-toggle"  data-toggle="dropdown"><small>more</small>
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                <li><a  href="" >Edit</a></li>
                                  <li><a href="#">Delete</a></li>
                                  {{--<li><a href="#">JavaScript</a></li>--}}
                                </ul>
                              </div>
                        </div>
                        
                      </div>
                      <hr>
                    <p>{!!$audio->body!!}</p>
                    <audio controls src="/storage/post_audio/{{$audio->post_audio}}"></audio>
                    <small style="float:right;">{{$post->created_at}}</small>
                    </div>
                    <br>
        
        
        
                 
                    
                  @endforeach
               
        
                 
                @else
                    <p>no posts</p>
                @endif
                </section>
            </div>
            
          </div>

        
       
        
    </div>

    
         
	<div class="col-md-3 col-xs-3 post-scroll">
		  <div class="card">
          <div class="card-header row">
            <div class="col-md-2"><img src="/uploads/avatars/{{Auth::user()->avatar }}" style="width:40px; height:40px; float:left;
              border-radius:50%; margin-right:25px"> </div>
             <div class="col-md-10">Your Posts {{ Auth::user()->first_name }} </div> 
          </div>
             
      </div>
    </div>
    
   
	
</div>







@endsection
