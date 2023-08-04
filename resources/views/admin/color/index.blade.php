@extends('layouts.admin')
@section('content')
<div class="row mt-3">
    <div class="col-md-12">
        @if (session('message'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
            <div class="alert alert-success">
                <h5>{{ session('message') }}</h5>
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Color List
                    <a href="{{ url('admin/color/create') }}" class="btn btn-outline-primary float-right">Add
                        Color</a>
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <th class="h5">Id</th>
                        <th class="h5">Name</th>
                        <th class="h5">Price</th>
                        <th class="h5">Status</th>
                        <th class="h5">Edit</th>
                        <th class="h5">Remove</th>
                    </thead>
                    <tbody>
                        @forelse ($color as $col)
                        <tr>
                            <td>{{ $col->id }}</td>
                            <td>{{ $col->name }}</td>
                            <td>{{ $col->code }}<span class="float-right" style="height: 20px;width: 20px;background-color:{{ $col->code }};"></span></td>
                            <td>{{ $col->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td><a href="{{ url('admin/color/'.$col->id.'/edit') }}"
                                    class="btn btn-sm btn-primary">Edit</a></td>
                            <td><a href="{{ url('admin/color/'.$col->id.'/delete') }}"
                                    onclick="return confirm('Are you sure, you want to delete this data?')"
                                    class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                No Colors Available
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="float-right">
                    {{ $color->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
