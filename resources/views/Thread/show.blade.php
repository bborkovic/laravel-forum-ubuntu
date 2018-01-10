@extends('layouts.bootstrap')

@section('content')
   
   <h3>Thread: {{$thread->name}}</h3>

   <table>
      @foreach( $replies as $reply )
      <tr>
      <div class="panel panel-info">
         <div class="panel-heading">
            {{$reply->rn}}. {{$reply->created_at->diffForHumans()}}
         </div>
         <div class="panel-body">
            <div class="row">
               <div class="col-sm-3">
                  {{-- {{$reply->user['name']}} --}}
                  {{$reply->user->name}}
               </div>
               <div class="col-sm-9">
                  <div class="row">{!! $reply->body !!}</div>
               </div>
            </div>
         </div>
         <div class="panel-footer">
            <div class="row">
               <div class="col-sm-12" text-right>
                  <div class="pull-right">
                     <button type="button" class="btn btn-default btn-sm like-button" id="like_{{$reply->id}}">
                        <span class="glyphicon glyphicon-thumbs-up">{{$reply->likes}}</span>
                     </button>
                     <button type="button" class="btn btn-default btn-sm dislike-button" id="dislike_{{$reply->id}}">
                        <span class="glyphicon glyphicon-thumbs-up">{{$reply->dislikes}}</span>
                     </button>

                  </div>
               </div>
            </div>
         </div>
      </div>
      </tr>
      @endforeach
   </table>

   {{-- Bla Bla Bla --}}
   <div class="pull-center">
      {{$replies->links()}}
   </div>

   <a href="/replies/create/{{$thread->id}}" class="btn btn-primary" role="button">Reply</a>
   
@endsection



@section('javascript')
   <script type="text/javascript">
      $('.like-button').click(function(el) {
         self = this;
         div_id = this.id;
         reply_id = div_id.replace('like_','');
         $.get("/replies/" + reply_id + "/like", function(data, status){
            console.log(data.status);
            $('#' + div_id)[0].innerHTML = '<span class="glyphicon glyphicon-thumbs-up">' + data.likes + '</span>';
         });
      });

      $('.dislike-button').click(function(el) {
         self = this;
         div_id = this.id;
         reply_id = div_id.replace('dislike_','');
         $.get("/replies/" + reply_id + "/dislike", function(data, status){
            console.log(data.status);
            $('#' + div_id)[0].innerHTML = '<span class="glyphicon glyphicon-thumbs-up">' + data.dislikes + '</span>';
         });
      });

   </script>
@endsection