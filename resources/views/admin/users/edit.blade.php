@extends('admin.app')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-2">
                @if ($errors->any())
                <ul class="alert alert-danger" style="list-style:none">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <form method="POST" action="{{ route('admin.user.update') }}">
                    @csrf
                    @method('PATCH')
                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{__('admin.edit_user')}} - <b>{{ $user->name }}</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('admin.name')}}</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('admin.email')}}</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label>{{__('admin.role')}}</label>
                                <select class="form-control" name="admin">
                                    <option value="0" @if($user->admin == 0) selected @endif>User</option>
                                    <option value="1" @if($user->admin == 1) selected @endif>Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection