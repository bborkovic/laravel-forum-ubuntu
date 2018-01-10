@extends('layouts.bootstrap')

@section('content')
   
   <h3>Thread: {{$thread->name}}</h3>

   <table>
      @foreach( $replies as $reply )
      <tr>
      <div class="panel panel-info">
         <div class="panel-heading">{{$reply->created_at->diffForHumans()}}</div>
         <div class="panel-body">
            <div class="row">
               <div class="col-md-2">
                  {{$reply->user['name']}}
{{--                   <div class="panel panel-default">
                     <div class="panel-body">
                        {{$reply->created_at}}
                     </div>
                  </div> --}}
               </div>
               <div class="col-md-10">
                  {{$reply->body}}
{{--                   <div class="panel panel-default">
                     <div class="panel-body">
                        {{$reply->body}}
                     </div>
                  </div> --}}
               </div>
            </div>
         </div>
      </div>
      </tr>
      @endforeach
   </table>

   {{-- Bla Bla Bla --}}
<!--    <a href="/replies/create/{{$thread->id}}" class="btn btn-primary" role="button">Reply</a -->


@endsection