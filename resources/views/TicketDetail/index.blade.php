@extends('layouts.bootstrap')

@section('content')
   
   <h2>Ticket Actions:</h2>

   @if (session('status'))
       <div class="alert alert-success">
           {{ session('status') }}
       </div>
   @endif

   <table class="table table-bordered">
     <thead>
       <tr>
         <th scope="col">Action</th>
         <th scope="col">User</th>
         <th scope="col">Action Time</th>
       </tr>
     </thead>
     <tbody>
         @if( $ticket_details->isNotEmpty() )
            @foreach($ticket_details as $detail)
               <tr>
                  <td>{{$detail->action}}</td>
                  <td>{{$detail->email}}</td>
                  <td>{{$detail->created_at}}</td>
               </tr>
            @endforeach
         @endif
     </tbody>
   </table>

   <a href="/ticketdetails/{{$ticket_id}}/create" class="btn btn-primary" role="button">New Action</a>




{{-- <p>{{ Util::foo() }}</p> --}}

@endsection