@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="float: right;"><a href="{{ route('product.create') }}" class="btn btn-primary btn-sm">Add Product</a></div>
                    <div class="text-center"> <b>Products</b></div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>SKU</th>
                            <th>Action</th>
                        </tr>
                        @if($users)
                        @foreach($products as $product)
                        <tr>
                            <td><a href="{{ route('productshow',$product->id) }}" class="btn btn-success btn-sm">View</a></td>
                            <td><img src="/images/{{ $product->image }}" height="50px" alt=""></td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->product_sku }}</td>
                            <td>
                                <form action="{{ route('product.delete',$product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    
                                    {{-- <a href="#" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Are your want delete this product?')">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
