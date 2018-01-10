@extends('layouts.bootstrap')

@section('content')
   
   @foreach ($errors->all() as $error)
       <div class="alert alert-danger">{{ $error }}</div>
   @endforeach

   <h3>Category: {{$category->name}}</h3>

   <form method="post">
      {{ csrf_field() }}
      <div class="form-group">
         <label for="inputName">Thread Name</label>
         <input type="text" class="form-control" name="inputName" id="inputName">
      </div>
      <div class="form-group">
         <label for="inputBody">First Reply</label>
         <textarea class="form-control" class="form-control" rows="5" name="inputBody" id="inputBody"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Create Thread</button>
   </form>

@endsection