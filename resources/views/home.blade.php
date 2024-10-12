@extends('layouts.template')

{{-- @section('title', 'Home | Products') --}}


@section('title', 'Retail Product')

@section('body')
    <div class="mt-2 p-2 bg-black text-white text-center">
        <h1>Dashboard</h1>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row mb-4">
                    <!-- Dashboard Cards -->
                    <div class="col-md-4">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header text-center">Total Quantity</div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $total_quantity }}</h5><br>
                                <h4 class="card-subtitle"> </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-header text-center">Most Expensive Product</div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $most_expensive_product->product_name }}</h5>
                                <h5 class="card-subtitle text-center">Price: {{ $most_expensive_product->retail_price }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-header text-center">Most Stocked Product</div>
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $most_stocked_product->product_name }}</h5>
                                <h5 class="card-subtitle text-center">Quantity: {{ $most_stocked_product->quantity }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <!-- Daftar Produk -->
                <div class="mt-1 p-2 bg-black text-white text-center">
                    <h4>Product List</h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mb-5">
                        <thead >
                            <tr class="bg-primary">
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Retail Price</th>
                                <th>Wholesale Price</th>
                                <th>Origin</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ 'Rp ' . number_format($product->retail_price, 0, ',', '.') }}</td>
                                    <td>{{ 'Rp ' . number_format($product->wholesale_price, 0, ',', '.') }}</td>
                                    <td>{{ $product->origin }}</td>
                                    <td>{{ $product->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
