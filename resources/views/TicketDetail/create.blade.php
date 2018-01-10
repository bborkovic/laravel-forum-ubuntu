@extends('layouts.bootstrap')

@section('content')
   
   <h2>Create Action</h2>

   @foreach ($errors->all() as $error)
       <div class="alert alert-danger">{{ $error }}</div>
   @endforeach


   <form method="post">
      {{ csrf_field() }}
      <div class="form-group">
         <label for="inputTitle">Action</label>
         <input type="text" class="form-control" name="inputAction" id="inputAction">
      </div>
      <div class="form-group">
         <label for="inputDescription">Action Description</label>
         <input type="text" class="form-control" name="inputDescription" id="inputDescription">
      </div>
      <button type="submit" class="btn btn-primary">Create Action</button>
   </form>

@endsection