@extends('admin.app')

@section('content')
<div class="content-wrapper ">
    <div class="content-header">
        <div class="container-fluid">
            <h1>{{__('admin.orders')}}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{__('admin.product')}}</th>
                                    <th>{{__('admin.user')}}</th>
                                    <th>{{__('admin.created_at')}}</th>
                                    <th>{{__('admin.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr data-rowid="{{ $order->id }}">
                                    <td>{{ $order->id }}</td>
                                    <td id="name"><a href="{{ route('admin.product.show', $order->product->id) }}">{{ $order->product->name }}</a></td>
                                    <td><a href="{{ route('admin.user.show', $order->user->id) }}">{{ $order->user->name }}</a></td>
                                    <td>{{ $order->created_at}}</td>
                                    <td>
                                        <a href="{{ route('admin.order.show', $order->id) }}" title="{{__('admin.show')}}"><button class="btn btn-info btn-sm">{{__('admin.show')}}</button></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-id="{{ $order->id }}" data-toggle="modal" data-target="#modal-delete" id="modal">
                                            {{__('admin.delete')}}
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form method="POST" action="{{ route('admin.order.destroy') }}">
                            @csrf
                            @method('DELETE')
                            <div class="modal fade" id="modal-delete">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{__('admin.delete_order')}}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{__('admin.delete_sure')}} <span id="modalName"></span> ?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <input type="hidden" name="id" value="">
                                            <button type="submit" class="btn btn-primary">{{__('admin.delete')}}</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">{{__('admin.cancel')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{ $orders->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#modal', function() {
            let data_id = $(this).data('id');
            let name = $(`[data-rowid='${data_id}']`).find('#name').text();
            $('#modalName').html('<b>' + name + '</b>');
            $("input[name=id]").val(data_id);
        });
    });
</script>


@endsection