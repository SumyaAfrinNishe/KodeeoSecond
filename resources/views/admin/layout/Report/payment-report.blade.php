@extends('master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Report Generate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
</head>
<body>

<div class="container">
  <h2 style="text-align:center;">Report Generate For Payment Status</h2>
  <!-- <p>Make the viewport larger than 768px wide to see that all of the form elements are inline, left aligned, and the labels are alongside.</p> -->
  <form class="form-inline" action="{{route('admin.payment.report.show')}}">
    <div class="form-group">
      <label for="date"><b>From Date:</b></label>
      <input type="date" class="form-control" id="fromdate" placeholder="From Date" name="fromdate">
    </div>
    <div class="form-group">
      <label for="date"><b>To Date:</b></label>
      <input type="date" class="form-control" id="todate" placeholder="To Date" name="todate">
    </div>
    <div class="form-group">
    <label for="date"><b>Payment Status:</b></label>
        <select class="form-select" aria-label="Default select example" style="margin-bottom:30px" name="payment">
        <option value="Pending">Pending</option>
        <option value="Paid">Paid</option>
        <select>
          
</div>
    <button type="submit" class="btn btn-primary" style="margin-bottom:30px;margin-left:500px;">Search</button>
   
  </form>
  <table class="table table-bordered">
  <thead>
    <tr>
       
        <th scope="col">ID</th>
        <th scope="col">Image</th> 
        <th scope="col">Sender Name</th> 
        <th scope="col">Recepient Name</th>
        <th scope="col">From Branch Name</th>
        <th scope="col">To Branch Name</th>
        
</tr>
</thead>
<tbody>
        @foreach($paymentreports as $key=>$rep )
    <tr>
        <td>{{$key+1}}</td>
        <td><img src="{{url('/uploads/'.$rep->cus_image)}}" width="100px" alt="courier image"></td>
        <td>{{$rep->user->name}}</td>
        <td>{{$rep->recepient_name}}</td>
        <td>{{$rep->frombranch->name}}</td>
        <td>{{$rep->tobranch->name}}</td>
</tr>
@endforeach
</tbody>
</table>
</div>

</body>
</html>
@endsection