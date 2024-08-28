@extends('dashboard')

@section('content')
<div class="container">
    <h1>Manage Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add New Product</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Discount</th>
                <th>Price After Discount</th>
                <th>Category</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>${{ number_format($product->product_price, 2) }}</td>
                <td>{{ $product->product_description }}</td>
                <td>
                    @if($product->discount)
                        {{ number_format($product->discount, 2) }}%
                    @else
                        N/A
                    @endif
                </td>
                <td>
                    @if($product->discount)
                        ${{ number_format($product->product_price - ($product->product_price * ($product->discount / 100)), 2) }}
                    @else
                        ${{ number_format($product->product_price, 2) }}
                    @endif
                </td>
                <td>{{ $product->category->name }}</td>
                <td>
                    @if($product->image)
                        <img src="{{ Storage::url('public/products/' . $product->image) }}" alt="Product Image" style="max-width: 100px;">
                    @else
                        No image
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
