@extends('common')
@section('title', 'Create Page')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="h1 text-center mt-5">Create Product</h1>
                <form action="{{ url('store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="name">
                        @error('name')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail2" class="form-label">price</label>
                        <input type="number" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp"
                            name="price">
                        @error('price')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail3" class="form-label">Qty</label>
                        <input type="number" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp"
                            name="quantity">
                        @error('quantity')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <textarea cols="10" rows="5" name="description" class="form-control"></textarea>
                        @error('description')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image</label>
                        <input type="file" class="form-control" id="exampleInputPassword4" name="images[]" multiple>
                        @error('images[]')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
