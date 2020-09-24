@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="float: right;"><a href="{{ route('product') }}" class="btn btn-primary btn-sm">Back Product</a></div>
                   <div class="text-center"> <b>Add Products</b></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <form action="{{ route('product.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                            <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                            <input type="file" name="image" id="image" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Enter Price" >
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="product_sku">Product SKU</label>
                            @if ($errors->has('product_sku'))
                                <span class="text-danger">{{ $errors->first('product_sku') }}</span>
                            @endif
                            <input type="text" name="product_sku" id="product_sku" class="form-control" placeholder="Enter Product SKU" >
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="6"></textarea>
                        </div>
                        <input type="submit" value="Add Product" class="btn btn-success">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
