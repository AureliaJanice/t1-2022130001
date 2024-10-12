@extends('layouts.template')

@section('title', 'Input New Product')

@section('body')

<div class="mt-4 p-5 bg-black text-white">
    <h1>Input New Product</h1>
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

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name"
                    placeholder="Input Product Name" name="product_name" required value="{{ old('product_name')}}">
            </div><br>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description"
                    placeholder="Input Description" name="description" required value="{{ old('description')}}">
            </div><br>

            <div class="form-group">
                <label for="retail_price">Retail Price</label>
                <input type="text" class="form-control" id="retail_price"
                    placeholder="Input Retail Price" name="retail_price" value="{{ old('retail_price')}}">
            </div><br>

            <div class="form-group">
                <label for="wholesale_price">Wholesale Price</label>
                <input type="text" class="form-control" id="wholesale_price"
                    placeholder="Input Wholesale Price" name="wholesale_price" value="{{ old('wholesale_price')}}">
            </div><br>

            {{-- Select ISO 3166-1 ALPHA-2 Country Codes --}}
            <div class="">
                {{-- mb-3 col-md-12 col-sm-12 --}}
                <label for="origin" class="form-group">Origin</label>
                <select class="form-control" id="origin" name="origin">
                    <option value="" disabled selected>Select Country</option>
                    <option value="ID" {{ old('origin') == 'ID' ? 'selected' : '' }}>Indonesia</option>
                    <option value="CN" {{ old('origin') == 'CN' ? 'selected' : '' }}>China</option>
                    <option value="US" {{ old('origin') == 'US' ? 'selected' : '' }}>United States</option>
                    <option value="UK" {{ old('origin') == 'UK' ? 'selected' : '' }}>United Kingdom</option>
                    <option value="MY" {{ old('origin') == 'MY' ? 'selected' : '' }}>Malaysia</option>
                    <option value="IN" {{ old('origin') == 'IN' ? 'selected' : '' }}>India</option>
                    <option value="JP" {{ old('origin') == 'JP' ? 'selected' : '' }}>Japan</option>
                    <option value="SG" {{ old('origin') == 'SG' ? 'selected' : '' }}>Singapore</option>
                </select>
            </div><br>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity"
                    placeholder="Input Quantity" name="quantity" value="{{ old('quantity')}}">
            </div><br>

            {{-- Input product_image --}}
            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" class="form-control" id="product_image"
                    name="product_image">
            </div>
            <br>

            <table>
                <td>
                    <button type="submit" class="btn btn-success btn-block">Save</button>
                    <button type="reset" class="btn btn-outline-danger btn-block">Reset</button>
                    <div class="d-flex justify-content-start mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </td>
            </table>
        </form>
    </div>
</div>

@endsection
