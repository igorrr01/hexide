@extends('admin.app')

@section('content')
<div class="content-wrapper ">
    <div class="content-header">
        <div class="container-fluid">
            <h1>{{__('admin.products')}}</h1>
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
                                        <th>{{__('admin.product')}}</th>
                                        <th>{{__('admin.user')}}</th>
                                        <th>{{__('admin.created_at')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <tr data-rowid="{{ $order->id }}">
                                        <td>{{ $order->id }}</td>
                                        <td id="name"><a href="{{ route('admin.product.show', $order->product->id) }}">{{ $order->product->name }}</a></td>
                                        <td><a href="{{ route('admin.user.show', $order->user->id) }}">{{ $order->user->name }}</a></td>
                                        <td>{{ $order->created_at}}</td>
                                    </tr>
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