@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div style="float: right;"><a href="{{ route('product') }}" class="btn btn-primary btn-sm">Back Product</a></div>
                    <div class="text-center"> <b>Show Products</b></div>
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
                        </tr>
                      <tr>
                          <td>{{ $show->id }}</td>
                          <td><img src="/images/{{ $show->image }}" height="50px" alt=""></td>
                          <td>{{ $show->title }}</td>
                          <td>{{ $show->price }}</td>
                          <td>{{ $show->product_sku }}</td>
                      </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
