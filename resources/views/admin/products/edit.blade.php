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

                <form method="POST" action="{{ route('admin.product.update') }}">
                    @csrf
                    @method('PATCH')
                    <div class="card card-light">
                        <div class="card-header">
                            <h3 class="card-title">{{__('admin.edit_product')}} - <b>{{ $product->name }}</b></h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">{{__('admin.product')}}</label>
                                <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('admin.description')}}</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">{{__('admin.price')}}</label>
                                <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection