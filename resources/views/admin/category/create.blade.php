@extends('layouts.admin')
@section('content')
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Category
                    <a href="{{ url('admin/category') }}" class="btn btn-outline-primary float-right">Back</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="h6">Name : </label>
                            <input type="text" name="name" id="" class="form-control">
                            @error('name')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="h6">Slug : </label>
                            <input type="text" name="slug" id="" class="form-control">
                            @error('slug')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="" class="h6">Description : </label>
                            <textarea name="description" id="" class="form-control" cols="30" rows="5"></textarea>
                            @error('description')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="h6">Image : </label>
                            <input type="file" id="get_img" onchange="show_img(this);" name="image"
                                class="form-control">
                            @error('image')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3" id="new_img_div" style="display:none">
                            <img id="sh_img" height="80px" width="80px" alt="No image found">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="h6">Status : </label><br>
                            <input type="checkbox" name="status" id="">
                        </div>

                        <div class="col-md-12 mt-2">
                            <h4>SEO Tags</h4>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="h6">Meta-Title : </label>
                            <input type="text" name="meta_title" id="" class="form-control">
                            @error('meta_title')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="" class="h6">Meta-Keyword : </label>
                            <textarea type="text" name="meta_keyword" id="" rows="3" class="form-control"></textarea>
                            @error('meta_keyword')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="" class="h6">Meta-Description : </label>
                            <textarea name="meta_description" id="" class="form-control" cols="30" rows="4"></textarea>
                            @error('meta_description')
                            <div class="text-danger"> {{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary" value="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function show_img(input) {
        $('#sh_img')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
        $('#new_img_div').css("display", "block");
    }
</script>
