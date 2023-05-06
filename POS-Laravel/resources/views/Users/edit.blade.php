@extends('layouts.admin')

@section('title', 'Edit User')
@section('content-header', 'Edit User')

@section('content')


    <div class="card">
        <div class="card-body">
            <form action="{{ route('user-setup.update', $data)}}" method="POST" enctype="multipart/form-data">
             @csrf
             @method('PUT')
         
             <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first name" class="form-control @error('first_name') is-invalid @enderror"
               id="first_name"
               placeholder="first name" value="{{ old('first_name', $data->first_name) }}">
                @error('first_name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
               id="last_name"
               placeholder="Last Name" value="{{ old('last_name', $data->last_name) }}">
        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
               placeholder="Email" value="{{ old('email', $data->email) }}">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Status</label>
            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                <option value="1" {{ old('status', $data->status) === 1 ? 'selected' : ''}}>Active</option>
                <option value="0" {{ old('status', $data->status) === 0 ? 'selected' : ''}}>Inactive</option>
            </select>
        @error('status')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        
        <button class="btn btn-success btn-block btn-lg" type="submit">Save Changes</button>
    </div>


{{ $data->first_name }}
{{ $data->id }}
@endsection 

@section('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endsection 
{{-- 
    @php
        echo var_dump($data->first_name);
    @endphp
 --}}
 
