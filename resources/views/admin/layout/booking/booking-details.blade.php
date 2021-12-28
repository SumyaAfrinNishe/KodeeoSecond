@extends('master')
@section('content')
<h1>Booking Details</h1>
   
<p>Sender Name: {{$book->sender_name}}</p>
<p>Sender Contact: {{$book->sender_contact}}</p>
<p>Sender Address: {{$book->sender_address}}</p>
<p>Receipient Name: {{$book->recepient_name}}</p>
<p>Recepient Phone: {{$book->recepient_phone}}</p>
<p>Recepient Address: {{$book->recepient_address}}</p>
<p>Branch Name: {{$book->name}}</p>
<p>Branch Address: {{$book->address}}</p>
<p>Consignment Number: {{$book->consignment_no}}</p>
<p>Type of Shipment: {{$book->type_of_shipment}}</p>
<p>Description: {{$book->courier_description}}</p>
<p>Quantity: {{$book->quantity}}</p>
<p>Weight: {{$book->weight}}</p>
<p>Price: {{$book->price}}</p>
<p>Pickup Date: {{$book->pickup_date}}</p>
<p>Pickup Time: {{$book->pickup_time}}</p>
<p>Status: {{$book->status}}</p>

@endsection