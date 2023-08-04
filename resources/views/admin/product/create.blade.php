@extends('layouts.admin')
@section('content')

<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Product
                    <a href="{{ url('admin/product') }}" class="btn btn-outline-primary float-right">Back</a>
                </h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-warning mt-2">
                    @foreach ($errors->all() as $error)
                    <h6>{{ $error }}</h6>
                    @endforeach
                </div>
                @endif
                <form action="{{ url('admin/product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active h5" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5" id="seo-tab" data-toggle="tab" href="#seo" role="tab"
                                aria-controls="seo" aria-selected="false">SEO Tags</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5" id="details-tab" data-toggle="tab" href="#details" role="tab"
                                aria-controls="details" aria-selected="false">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5" id="pro_image-tab" data-toggle="tab" href="#pro_image" role="tab"
                                aria-controls="pro_image" aria-selected="false">Product Image</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5" id="pro_color-tab" data-toggle="tab" href="#pro_color" role="tab"
                                aria-controls="pro_color" aria-selected="false">Product Color</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Product Name : </label>
                                    <input type="text" name="name" id="" class="form-control">
                                    @error('name')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Product Slug : </label>
                                    <input type="text" name="slug" id="" class="form-control">
                                    @error('slug')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Category : </label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Brand : </label>
                                    <select name="brand" id="" class="form-control">
                                        @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Small Description : </label>
                                    <textarea type="text" name="small_description" id="" rows="3"
                                        class="form-control"></textarea>
                                    @error('small_description')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="" class="h6">Description : </label>
                                    <textarea name="description" id="" class="form-control" cols="30"
                                        rows="4"></textarea>
                                    @error('description')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="" class="h6">Meta-Title : </label>
                                    <input type="text" name="meta_title" id="" class="form-control">
                                    @error('meta_title')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Meta-Keyword : </label>
                                    <textarea type="text" name="meta_keyword" id="" rows="3"
                                        class="form-control"></textarea>
                                    @error('meta_keyword')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="" class="h6">Meta-Description : </label>
                                    <textarea name="meta_description" id="" class="form-control" cols="30"
                                        rows="4"></textarea>
                                    @error('meta_description')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="" class="h6">Original Price : </label>
                                    <input type="text" name="original_price" id="" class="form-control">
                                    @error('original_price')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="h6">Selling Price : </label>
                                    <input type="text" name="selling_price" id="" class="form-control">
                                    @error('selling_price')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="h6">Quantity : </label>
                                    <input type="number" name="quantity" id="" class="form-control">
                                    @error('quantity')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="" class="h6">Trending : </label><br>
                                    <input type="checkbox" name="trending" id="" style="width: 20px;height: 20px;">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="" class="h6">Status : </label><br>
                                    <input type="checkbox" name="status" id="" style="width: 20px;height: 20px;">
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="pro_image" role="tabpanel" aria-labelledby="pro_image-tab">
                            <div class="col-md-6 mb-3">
                                <label for="" class="h6">Product Images : </label>
                                <input type="file" name="image[]" id="" class="form-control" multiple>
                                @error('image')
                                <div class="text-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pro_color" role="tabpanel" aria-labelledby="pro_color-tab">
                            <label for="" class="h4 mb-3">Select Color : </label>
                            <div class="row d-flex justify-content-center">
                                @forelse ($colors as $color)
                                <div class="col-md-2 mx-3 my-4 p-2 border rounded">
                                    <h5>Color : </h5><input type="checkbox" name="color[{{ $color->id }}]" id=""
                                        value="{{ $color->id }}">&nbsp;{{
                                    $color->name }}<span class="float-right"
                                        style="height: 20px; width: 20px; background-color:{{ $color->code }}; border:1px solid gray"></span>
                                    <br><br>
                                    <h5>Quantity : </h5><input type="number" name="color_quantity[{{ $color->id }}]" id=""
                                        class="form-control">
                                </div>
                                @empty
                                <div class="col-md-12">
                                    <h2>No Color Found</h2>
                                </div>
                                @endforelse
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary px-4 py-2" value="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
