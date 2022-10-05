@extends('admin.app')

@section('content')
<div class="content-wrapper ">
    <div class="content-header">
        <div class="container-fluid">
            <h1>{{__('admin.users')}}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID.</th>
                                        <th>{{__('admin.name')}}</th>
                                        <th>{{__('admin.email')}}</th>
                                        <th>{{__('admin.action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td> {{ $user->name }} </td>
                                        <td> {{ $user->email }} </td>
                                        <td><a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="{{__('admin.edit')}}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{__('admin.edit')}}</button></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <a href="{{ url()->previous() }}" title="{{__('admin.back')}}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> {{__('admin.back')}}</button></a>
            </div>
        </div>
    </div>
</div>
@endsection