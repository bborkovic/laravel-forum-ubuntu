@extends('layouts.bootstrap')

@section('content')
   
   @foreach ($errors->all() as $error)
       <div class="alert alert-danger">{{ $error }}</div>
   @endforeach

   <h3>Posting reply in: {{$thread->name}}</h3>

   <form method="post">
      {{ csrf_field() }}
      <div class="form-group">
         <label for="inputBody">Reply Text</label>
         <textarea class="form-control" class="form-control" rows="5" name="inputBody" id="inputBody"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Post Reply</button>
   </form>

@endsection