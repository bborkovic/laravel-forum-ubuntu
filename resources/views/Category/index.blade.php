@extends('layouts.bootstrap')

@section('content')
   
   <div class="row">

      <div class="col-sm-4">
         @if($category)
            <h3>Category: {{$category->name}}</h3>
         @endif
         @foreach($categories as $cat)
            <li><a href="/categories/{{$cat->id}}">{{ $cat->name }}</a></li>
         @endforeach

         <br/><br/>
         @if($category)
            <a class="btn btn-primary" href="/threads/create/{{$category->id}}" role="button">Create New Thread</a>
         @endif
      </div>

      <div class="col-sm-1"></div>

      @if( isset($threads) && (!$threads->isEmpty()) )
         <h3>Threads in {{$category->name}}</h3>
         <div class="col-sm-4">
            <ul>
               @foreach($threads as $thread)
                  <li>
                     <a href="/threads/{{$thread->id}}">{{ $thread->name }} ({{ $thread->replies }})</a>
                  </li>
               @endforeach
            </ul>
         </div>
      @else
         <h3>No Threads</h3>
      @endif

   </div>



   {{-- <a href="/threads/{{$ticket->id}}" class="btn btn-primary" role="button">History</a> --}}

@endsection