@extends('master')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<center>
<h1>Intransit</h1>
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
<center>  <a href="#" class="btn btn-warning" onclick="printDiv('PrintTableArea')">Print</a>


</center>
<div id="PrintTableArea">
<p><h3 style="color:DodgerBlue">Tracking Number:{{$intra->track_number}}</span></h3><h2><span style="color:#2874A6"></span><h2></p>
        <p class="card-text" ><b style="color:#2E4053;">Sender Name:</b> {{$intra->user->name}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Sender Contact:</b>{{$intra->user->phone}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Sender Address:</b>{{$intra->user->email}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Receipient Name:</b>{{$intra->recepient_name}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Recepient Phone:</b>{{$intra->recepient_phone}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Recepient Address:</b>{{$intra->recepient_email}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Branch Name:</b>{{$intra->branch_name}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Type of Shipment:</b>{{$intra->type_of_shipment}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Description:</b>{{$intra->courier_description}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Quantity:</b>{{$intra->quantity}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Weight:</b>{{$intra->weight}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Price:</b>{{$intra->price}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Delivery Type:</b>{{$intra->delitype}}({{$intra->payment}})</p>
        <p class="card-text" ><b style="color:#2E4053;">Pickup Date:</b>{{$intra->pickup_date}}</p>
        <p class="card-text" ><b style="color:#2E4053;">Pickup Time:</b>{{$intra->pickup_time}}</p>
<p>
    <img style="border-radius: 4px;" width="200px;" src=" {{url('/uploads/'.$intra->cus_image)}}" alt="post">
</p>
<p><h4><span style="color:red">Delivery Status:{{$intra->delievery}}</span></h4></p>
</center>
</div>
        <form action="{{route('admin.intransit.update.status',$intra->id)}}" method='POST' enctype="multipart/form-data">
         @method('PUT')
         @csrf
        <p class="card-text" style="margin-top: 900px">Status:</p>
        <select class="form-select" aria-label="Default select example" name="delievery">
        <option selected>{{$intra->delievery}}</option>
        <option value="Accepted By Courier">Accepted By Courier</option>
        <option value="Collected">Collected</option>
        <option value="Ready to Pickup">Ready to Pickup</option>
        <option value="Picked Up">Picked Up</option>
        <option value="Out for Delievery">Out for Delievery</option>
        <option value="Shipped">Shipped</option>
        <option value="Arrived At Destination">Arrived At Destination</option>
        <option value="Delieverd">Delieverd</option>
        @if($intra->payment=='Paid')
        <option value="Handover">Handover</option>
        @else
        <option value="" style="color:red">For handover need to pay first</option>
        @endif
        <option value="Unsuccessful Delievery Attempt">Unsuccessful Delievery Attempt</option>
</select>
        <div>
<button type="submit" class="btn btn-success">Submit</button>
</div>
</form>
  </div>
</div>

<a href="#" class="btn btn-warning" onclick="printDiv('PrintTableArea')">Print</a>
<script type="text/javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>

@endsection