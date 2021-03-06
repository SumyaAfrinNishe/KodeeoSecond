@extends('master')
@section('content')

<h1 style="text-align:center;">Total Shipped</h1>


    <table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Consignment No.</th>
        <th scope="col">Sender</th>
        <th scope="col">Recepient</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ships as $key=>$s)
        <td>{{$key+1}}</td>
        <td>{{$s->track_number}}</td>
        <td>{{$s->user->name}}</td>
        <td>{{$s->recepient_name}}</td>
        <td>{{$s->delievery}}</td>
        <td>
            <a class="btn btn-primary" href="{{route('admin.shipped.details.view',$s->id)}}"><i class="fas fa-eye"></i></a>
            
        </td>
        @endforeach
   </tbody>
    @endsection