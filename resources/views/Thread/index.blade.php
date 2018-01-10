@extends('layouts.bootstrap')

@section('content')
   
   <h2>My Tickets:</h2>



<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Date Created</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      @foreach($tickets as $ticket)
         <tr>
            <td>{{$ticket->title}}</td>
            <td>{{$ticket->description}}</td>
            <td>{{$ticket->created_at->diffForHumans()}}</td>
            <td>
               <a href="/ticketdetails/{{$ticket->id}}" class="btn btn-primary" role="button">History</a>
            </td>
         </tr>
      @endforeach
  </tbody>
</table>

{{-- <p>{{ Util::foo() }}</p> --}}

@endsection