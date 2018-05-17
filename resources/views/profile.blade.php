@extends('layouts.app')

@section('content')


<div class="row">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
	
        <div class="col-md-8 ">
            <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:150px; height:150px; float:left;
            border-radius:50%; margin-right:25px">
           <h2>{{ Auth::user()->name}}'s Profile</h2>
        <form enctype="multipart/form-data" action="/profile" method="POST">
            <label>Update Profile Image</label><br>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" value="Save Changes" class="pull-right btn btn-small btn-primary">
        </form>   
        </div>

         
  
  <div class="col-md-4"> {{--edit and to your infor--}}
        <!-- Button trigger modal -->

  <a class="btn btn-primary btn-sm" href="editprofile" >Edit your information>></a>
  


<!-- Modal -->

        {{--end of add and edit to infor--}}
  </div>
         
</div>
<hr style="color:white;">
<div class="row">
    <div class="col-md-3"><h3 style="color:#D85151">Quote</h3></div>
    <div class="col-md-3"><h3 style="color:#D85151">Photos</h3></div>
    <div class="col-md-3"><h3 style="color:#D85151">Videos</h3></div>
    <div class="col-md-3"><h3 style="color:#D85151">Audio</h3></div>
</div>
<div class="row" style="margin-left:0px;">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
  <div class=""></div>
    <div class="col-md-3 quote-scroll">
        {{--start of post--}}
        
        @if(count($posts) > 0)
        @foreach($posts as $post)
       {{--<a href="/posts/{{$post->id}}">--}} 
          <div class="card">
            <div class="row" style="position:relative;">
             <div class="col-md-8"></div>
              <div class="col-md-4">
                  <div class="dropdown" >
                      <a class=" dropdown-toggle"  data-toggle="dropdown"><small>more</small>
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                      <li><a  href="/posts/{{$post->id}}/edit" >Edit</a></li>
                      <hr>
                      {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
                      {{Form::hidden('_method','DELETE')}}
                      {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                      {!!Form::close()!!}
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


          {{--start of delete modal--}}
          
          <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel">Delete Post?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  {!!Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right'])!!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                  {!!Form::close()!!}
                  </div>
                    
                    
                  
                </div>
              </div>
            </div>
          {{--end of delete modal--}}
       
          
        @endforeach
     

       
      @else
          <p>no posts</p>
      @endif
       
        {{--end of post--}}
    </div>

   
     <div class="col-md-3 photo-scroll">
    {{--start of photos--}}
    
    @if(count($photos) > 0)
    @foreach($photos as $photo)
   {{--<a href="/posts/{{$post->id}}">--}} 
      <div class="card">
        <div class="row">
          
          <div class="col-md-8"></div>
            <div class="col-md-4">
                <div class="dropdown">
                    <a class=" dropdown-toggle"  data-toggle="dropdown"><small>more</small>
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a  href="/photos/{{$photo->id}}/edit" >Edit</a></li>
                    <hr>
                    {!!Form::open(['action'=>['PhotosController@destroy',$photo->id],'method'=>'POST','class'=>'pull-right'])!!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {!!Form::close()!!}
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


     
      {{--start of delete modal--}}
          
      <div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Delete Post?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              {!!Form::open(['action'=>['PhotosController@destroy',$photo->id],'method'=>'POST','class'=>'pull-right'])!!}
              {{Form::hidden('_method','DELETE')}}
              {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
              {!!Form::close()!!}
              </div>
                
                
              
            </div>
          </div>
        </div>
      {{--end of delete modal--}}
      
    @endforeach
 

   
  @else
      <p>no posts</p>
  @endif   
    {{--end of photos--}}  
    </div> 
    

    <div class="col-md-3 video-scroll">
        {{--start of videos--}}
        
        @if(count($videos) > 0)
        @foreach($videos as $video)
       {{--<a href="/posts/{{$post->id}}">--}} 
          <div class="card">
            <div class="row">
              <div class="col-md-8"></div>
                 
              <div class="col-md-4">
                  <div class="dropdown" style="float:right;margin-top:0%;">
                      <a class=" dropdown-toggle"  data-toggle="dropdown"><small>more</small>
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                      <li><a  href="/videos/{{$video->id}}/edit" >Edit</a></li>
                      <hr>
                      {!!Form::open(['action'=>['VideoController@destroy',$video->id],'method'=>'POST','class'=>'pull-right'])!!}
                      {{Form::hidden('_method','DELETE')}}
                      {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                      {!!Form::close()!!}
                        {{--<li><a href="#">JavaScript</a></li>--}}
                      </ul>
                    </div>
                 
                </div>
              </div>
             
            <hr>
          <p>{!!$video->body!!}</p>
          <div class="embed-responsive embed-responsive-4by3">
                <video width="320" height="240" controls>
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
        {{--end of videos--}}
    </div>
    <div class="col-md-3 audio-scroll">
        {{--start of audio--}}
        
        @if(count($audios) > 0)
        @foreach($audios as $audio)
       {{--<a href="/posts/{{$post->id}}">--}} 
          <div class="card">
            <div class="row" style="position:relative;">
              <div class="col-md-8"></div>
              <div class="col-md-4">
                  <div class="dropdown" >
                      <a class=" dropdown-toggle"  data-toggle="dropdown"><small>more</small>
                      <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                      <li><a  href="/audio/{{$audio->id}}/edit" >Edit</a></li>
                      <hr>
                        <li>{!!Form::open(['action'=>['AudioController@destroy',$audio->id],'method'=>'POST','class'=>'pull-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!!Form::close()!!}</li>
                        {{--<li><a href="#">JavaScript</a></li>--}}
                      </ul>
                    </div>
              </div>
              
            </div>
            <hr>
          <p>{!!$audio->body!!}</p>
          <audio controls style="width:100%;max-width:600px;" src="/storage/post_audio/{{$audio->post_audio}}"></audio>
          <small style="float:right;">{{$audio->created_at}}</small>
          </div>
          <br>



       
          
        @endforeach
     

       
      @else
          <p>no posts</p>
      @endif
    </div>
        {{--end of audio--}}
    </div>
</div>
@endsection

