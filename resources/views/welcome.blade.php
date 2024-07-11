@extends('common')
@section('title', 'List Page')
@section('content')
    <div class="container mt-5">

        <h1 class="h1 text-center">Repository Pattern Crud</h1>
        @if(Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
        <div class="row mt-5">
            <div class="col-lg-12">
                <button class="btn btn-success" style="float: right"><a class="text-decoration-none text-white"
                        href="{{ url('create') }}">Create Product</a></button>
                <table class="table table-striped">
                    <thead>
                        <th>Sno</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Quatity</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>

                                <td>
                                    @foreach (explode(',',$item->image) as $img )
                                        <img src='{{ "images/".$img }}' alt="" height="100" width="100">
                                    @endforeach
                                </td>

                                <td>{{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>
                                    <button class="btn btn-warning"><a class="text-decoration-none text-white"
                                            href="{{ url('edit') }}/{{ $item->id }}">Edit</a></button>
                                    <button class="btn btn-danger"><a class="text-decoration-none text-white"
                                            href="{{ url('delete') }}/{{ $item->id }}">Delete</a></button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
