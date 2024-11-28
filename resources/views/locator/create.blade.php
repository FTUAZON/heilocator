@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <h1 class="text-center text-primary mb-4">Add New HEI</h1>
    <div class="row">
        <form action="{{route('locators.store')}}" 
            method="POST" 
            enctype="multipart/form-data">

            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">HEI Name </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                @error('name')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">HEI Address </label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                @error('address')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude </label>
                <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude">
                @error('latitude')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude </label>
                <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude">
                @error('longitude')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website </label>
                <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website">
                @error('website')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input 
                    type="text" 
                    class="form-control @error('contact_number') is-invalid @enderror" 
                    id="contact_number" 
                    name="contact_number" 
                    maxlength="11" 
                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 11);"
                >
                @error('contact_number')
                    <small class="text-danger">{{ $message }} </small>
                @enderror
            </div>
            <button class="btn btn-success btn-sm">Save</button>
        </form>        
    </div>
</div>
@endsection

