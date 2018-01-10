@extends('layouts.bootstrap')

@section('content')
   
   @foreach ($errors->all() as $error)
       <div class="alert alert-danger">{{ $error }}</div>
   @endforeach


   <form method="post">
      {{ csrf_field() }}
      <div class="form-group">
         <label for="inputTitle">Title</label>
         <input type="text" class="form-control" name="inputTitle" id="inputTitle">
      </div>
      <div class="form-group">
         <label for="inputDescription">Description</label>
         <input type="text" class="form-control" name="inputDescription" id="inputDescription">
      </div>
      <button type="submit" class="btn btn-primary">Create Ticket</button>
   </form>

@endsection