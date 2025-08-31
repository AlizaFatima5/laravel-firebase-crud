@extends('firebase.app')
@section('content')
   
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Contacts</h4>
                    <a   class="btn btn-danger btn-sm float-end" href="{{url('contacts')}}">Back</a>
                </div>
                <div class="card-body">
                   <form action="{{url('update/'.$id)}}" method="post">
@csrf
@method('PUT')
<div class="form-group mb-3">
  <label for="">First name</label>
    <input type="text" name="first-name" class="form-control" value="{{$contact['fname']}}">
</div>
<div class="form-group mb-3">
  <label for="">Last name</label>
    <input type="text" name="last-name" class="form-control" value="{{$contact['lname']}}">
</div>
 
<div class="form-group mb-3">
  <label for="">Phone</label>
    <input type="text" name="phone" class="form-control" value="{{$contact['phone']}}">
</div>
 <div class="form-group mb-3">
  <label for="">Email</label>
    <input type="email" name="email" class="form-control" value="{{$contact['email']}}">
</div>
<div class="form-group mb-3">
 <button type="submit" class="btn btn-primary">SAVE</button>
</div>
 
 
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection