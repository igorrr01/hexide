@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (Auth::user()->admin == 1)
                    <div class="text-center">
                        <a class="navbar-brand" href="{{ route('admin.index') }}"><b>Go to Admin Panel</b></a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection