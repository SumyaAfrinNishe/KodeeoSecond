@extends('master')
@section('content')
<div id="PrintTableArea">
<div class="card">
  <div class="card-body">
    <h5 class="card-title">Details</h5>
    <img style="border-radius: 4px;" width="500px;" src=" {{url('/uploads/'.$collect->image)}}" alt="booking">
        <p class="card-text" ><b style="color:blue">Sender Name:</b> {{$collect->sender_name}}</p>
        <p class="card-text" ><b style="color:blue">Sender Contact:</b> {{$collect->sender_contact}}</p>
        <p class="card-text" ><b style="color:blue">Sender Address:</b> {{$collect->sender_email}}</p>
        <p class="card-text" ><b style="color:blue">Receipient Name:</b> {{$collect->recepient_name}}</p>
        <p class="card-text" ><b style="color:blue">Recepient Phone:</b> {{$collect->recepient_phone}}</p>
        <p class="card-text" ><b style="color:blue">Recepient Address:</b> {{$collect->recepient_email}}</p>
        <p class="card-text" ><b style="color:blue">Branch Name:</b> {{$collect->branch_name}}</p>
        <p class="card-text" ><b style="color:blue">Consignment Number:</b> {{$collect->track_number}}</p>
        <p class="card-text" ><b style="color:blue">Type of Shipment:</b> {{$collect->type_of_shipment}}</p>
        <p class="card-text" ><b style="color:blue">Description:</b> {{$collect->courier_description}}</p>
        <p class="card-text" ><b style="color:blue">Quantity:</b> {{$collect->quantity}}</p>
        <p class="card-text" ><b style="color:blue">Weight: </b>{{$collect->weight}}</p>
        <p class="card-text" ><b style="color:blue">Price:</b> {{$collect->price}}</p>
        <p class="card-text" ><b style="color:blue">Pickup Date:</b> {{$collect->pickup_date}}</p>
        <p class="card-text" ><b style="color:blue">Pickup Time:</b> {{$collect->pickup_time}}</p>
        <form action="{{route('admin.collect.update.status',$collect->id)}}" method='POST' enctype="multipart/form-data">
         @method('PUT')
         @csrf
        <p class="card-text" >Status:</p>
        <select class="form-select" aria-label="Default select example" name="delievery">
        <option selected>{{$collect->delievery}}</option>
        <option value="Accepted By Courier">Accepted By Courier</option>
        <option value="Ready to Pickup">Ready to Pickup</option>
        <option value="Picked Up">Picked Up</option>
        <option value="Out for Delievery">Out for Delievery</option>
        <option value="Shipped">Shipped</option>
        <option value="Intransit">Intransit</option>
        <option value="Arrived At Destination">Arrived At Destination</option>
        <option value="Delieverd">Delieverd</option>
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