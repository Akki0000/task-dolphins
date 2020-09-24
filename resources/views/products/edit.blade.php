@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="float: right;"><a href="{{ route('product') }}" class="btn btn-primary btn-sm">Back Product</a></div>
                   <div class="text-center"> <b>Edit Products</b></div>
                </div>

                <div class="card-body">
                    <form action="{{ route('product.update',$edit->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ $edit->title }}" class="form-control" placeholder="Enter Title" required>
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <img src="/images/{{ $edit->image }}" height="80px" alt="">
                            <input type="file" name="image" id="image" class="form-control">
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" value="{{ $edit->price }}" class="form-control" placeholder="Enter Price" required>
                            @if ($errors->has('price'))
                                <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="product_sku">Product SKU</label>
                            <input type="text" name="product_sku" id="product_sku" value="{{ $edit->product_sku }}" class="form-control" placeholder="Enter Product SKU" required>
                            @if ($errors->has('product_sku'))
                                <span class="text-danger">{{ $errors->first('product_sku') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control"  cols="30" rows="6">{{ $edit->description }}</textarea>
                        </div>
                        <input type="submit" value="Update Product" class="btn btn-success">
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
