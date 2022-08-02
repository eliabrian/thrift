@extends('layouts.app')

@section('content')
    <div class="card m-auto col-lg-6">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form action="{{ route('auth.authenticate') }}" method="POST">
                @csrf
                <x-input type="email" name="email" id="email" label="Email Address"/>
                <x-input type="password" name="password" id="password" label="Password"/>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
@endsection