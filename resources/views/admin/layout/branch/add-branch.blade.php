@extends('master')
@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {!! session('error') !!}
</div>
@endif
<center><h1> Add Branch</h1></center>



<div class="card mt-3">
  <div class="container p-5">
<form action="{{route('admin.branch.list.create')}}" method='POST' enctype="multipart/form-data">
  
@csrf
<div class="mb-3">
  <label for="name" class="form-label">Branch Name</label>
  <input type="text" name="name" class="form-control" id="name" placeholder="">
</div>
<div class="mb-3">
  <label for="contact" class="form-label">Branch Contact Number</label>
  <input type="text" name="contact" class="form-control" id="contact" placeholder="">
</div>
<div class="mb-3">
  <label for="email" class="form-label">Branch Email</label>
  <input type="text" name="email" class="form-control" id="email" placeholder="">
</div>
<div class="mb-3">
  <label for="address" class="form-label">Branch Address</label>
  <input type="text" name="address" class="form-control" id="address" placeholder="">
</div>
<div class="mb-3">
  <label for="city" class="form-label">Branch City</label>
  <input type="text" name="city" class="form-control" id="city" placeholder="">
</div>
<div class="mb-3">
  <label for="state" class="form-label">Branch State</label>
  <input type="text" name="state" class="form-control" id="state" placeholder="">
</div>
<div class="mb-3">
  <label for="pincode" class="form-label">Branch Pincode</label>
  <input type="text" name="pincode" class="form-control" id="pincode" placeholder="">
</div>
<div class="mb-3">
  <label for="country" class="form-label">Branch Country</label>
  <input type="text" name="country" class="form-control" id="country" placeholder="">
</div>
<div class="input-group">
  <div class="custom-file">
  <label for="image" class="form-label">Branch Image</label>
    <input type="file" name="image" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
  </div>
</div>
<button type="submit" class="btn btn-success" style="margin-bottom:30px;margin-left:500px;">Submit</button>
</form>
</div>
</div>
@endsection
