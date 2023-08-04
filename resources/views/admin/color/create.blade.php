@extends('layouts.admin')
@section('content')
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Color
                    <a href="{{ url('admin/color') }}" class="btn btn-outline-primary float-right">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/color/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6 mb-3">
                        <label for="" class="h6">Name : </label>
                        <input type="text" name="name" id="" class="form-control">
                        @error('name')
                        <div class="text-danger"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="h6">Color Code : </label>
                        <input type="color" name="code" id="" class="form-control">
                        @error('code')
                        <div class="text-danger"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="" class="h6">Status : </label><br>
                        <input type="checkbox" name="status" id="">&nbsp;[Checked=>Hidden] [Unchecked=>visible]
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
