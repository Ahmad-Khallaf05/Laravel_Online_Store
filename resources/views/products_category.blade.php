@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Select Category</h1>
    
    <form action="{{ route('products.byCategory') }}" method="GET">
        <div class="form-group">
            <label for="category">Choose a Category:</label>
            <select name="category_id" id="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Show Products</button>
    </form>
    
    @if(isset($product))
        <h2 class="mt-5">Products in {{ $selectedCategory->name }} Category</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Discount</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $products)
                <tr>
                    <td>{{ $products->name }}</td>
                    <td>{{ $products->price }}</td>
                    <td>{{ $products->description }}</td>
                    <td>{{ $products->discount }}</td>
                    <td><img src="{{ $products->image }}" alt="{{ $products->name }}" style="width: 50px; height: 50px;"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
