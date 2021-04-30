@extends('layouts.adminLayout.admin_front_header')

@section ('content')
<div class="container">
<div class="p-5">
    <h2>Vendor Details</h2>
   
<form class="form-horizontal" method="post" action="/connect-vendors">
    @csrf
    <div class="sucess-error-message">
@if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{!! session('flash_message_error') !!} </strong>
</div>
        @endif      
         @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
        <strong>{!! session('flash_message_success') !!} </strong>
</div>
        @endif  
</div>
    <div class="form-group">
        <label for="Name">Client Name: </label>
        <input type="text" class="form-control" id="name" placeholder="" name="client_name" required>
    </div>
    <div class="form-group">
        <label for="Name">Company Name: </label>
        <input type="text" class="form-control" id="company_name" placeholder="" name="company_name" required>
    </div>
    <div class="form-group">
        <label for="Name">Brand Name: </label>
        <input type="text" class="form-control" id="brand_name" placeholder="" name="brand_name" required>
    </div>
    <div class="form-group">
        <label for="Name">Vendor Type: </label>
        <select class="form-select" name="vendor_type" aria-label="Default select example">
            <option selected="selected">Choose</option>
            <option value="Importer">Importer</option>
            <option value="Distributor">Distributor</option>
            <option value="Manufacturer">Manufacturer</option>
            <option value="Farmer">Farmer</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Designation: </label>
        <input type="text" class="form-control" id="email" placeholder="" name="designation" required>
    </div>
    <div class="form-group">
        <label for="email">Official Email: </label>
        <input type="text" class="form-control" id="email" placeholder="" name="email" required>
    </div>
    <div class="form-group">
        <label for="email">Address: </label>
        <input type="text" class="form-control" id="email" placeholder="" name="address" required>
    </div>
    <div class="form-group">
        <label for="email">Phone Number: </label>
        <input type="text" class="form-control" id="email" placeholder="" name="phone" required>
    </div>
    <div class="form-group">
            <label for="">Are you registered with VAT: </label>
            <input class="form-check-input d-flex ml-2" type="radio" name="is_registered" id="flexRadioDefault1" value="1" checked>
            <label class="form-check-label d-flex ml-4" for="flexRadioDefault1">
                Yes
            </label>
            <input class="form-check-input d-flex ml-2" type="radio" name="is_registered" value="0" id="flexRadioDefault2" >
            <label class="form-check-label d-flex ml-4" for="flexRadioDefault2">
                No
            </label>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-md" value="Send">Send</button>
    </div>

</form>
</div>
</div>

@include('layouts.frontLayout.footer')

@endsection


