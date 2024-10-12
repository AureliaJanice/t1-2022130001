@extends('layouts.template')

@section('title', 'Update Product')

@section('body')

<div class="mt-4 p-5 bg-black text-white">
    <h1>Update Existing Product</h1>
</div>

<div class="row my-4">
    <div class="col-12 px-5">
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name"
                    placeholder="Product Name" name="product_name" required value="{{ old('product_name', $product->product_name) }}">
            </div><br>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description"
                    placeholder="Description" name="description" required value="{{ old('description', $product->description)}}">
            </div><br>

            <div class="form-group">
                <label for="retail_price">Retail Price</label>
                <input type="number" class="form-control" id="retail_price"
                    placeholder="Retail Price" name="retail_price" value="{{ old('retail_price', $product->retail_price)}}">
            </div><br>

            <div class="form-group">
                <label for="wholesale_price">Wholesale Price</label>
                <input type="number" class="form-control" id="wholesale_price"
                    placeholder="Wholesale Price" name="wholesale_price" value="{{ old('wholesale_price', $product->wholesale_price)}}">
            </div><br>

            {{-- Select ISO 3166-1 ALPHA-2 Country Codes --}}
            <div class="">
                <label for="origin" class="form-group">Origin</label>
                <select class="form-control" id="origin" name="origin">
                    <option value="" disabled selected>Select Country</option>
                    <option value="ID" {{ old('origin', $product->origin) == 'ID' ? 'selected' : '' }}>Indonesia</option>
                    <option value="CN" {{ old('origin', $product->origin) == 'CN' ? 'selected' : '' }}>China</option>
                    <option value="US" {{ old('origin', $product->origin) == 'US' ? 'selected' : '' }}>United States</option>
                    <option value="UK" {{ old('origin', $product->origin) == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="MY" {{ old('origin', $product->origin) == 'MY' ? 'selected' : '' }}>Malaysia</option>
                    <option value="IN" {{ old('origin', $product->origin) == 'IN' ? 'selected' : '' }}>India</option>
                    <option value="JP" {{ old('origin', $product->origin) == 'JP' ? 'selected' : '' }}>Japan</option>
                    <option value="SG" {{ old('origin', $product->origin) == 'SG' ? 'selected' : '' }}>Singapore</option>
                    <option value="DE" {{ old('origin', $product->origin) == 'DE' ? 'selected' : '' }}>Germany</option>
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity"
                    placeholder="Quantity" name="quantity" value="{{ old('quantity', $product->quantity)}}">
            </div>


            {{-- Input product_image --}}
            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" class="form-control" id="product_image" name="product_image">
                @if ($product->product_image)
                    <img src={{ $product->product_image_url }} class="mt-3" style="max-width: 400px;" />
                @endif
            </div>
            <br>

            <button type="submit" class="btn btn-success btn-block">Save Update</button>
            <div class="d-flex justify-content-start mt-4">
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>

@endsection
