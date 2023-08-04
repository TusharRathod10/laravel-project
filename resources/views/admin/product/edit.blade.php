@extends('layouts.admin')
@section('content')

<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Product
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
                @if (session('message'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
                    <div class="alert alert-success">
                        <h5>{{ session('message') }}</h5>
                    </div>
                </div>
                @endif
                <form action="{{ url('admin/product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                                    <input type="text" name="name" id="" class="form-control"
                                        value="{{ $product->name }}">
                                    @error('name')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Product Slug : </label>
                                    <input type="text" name="slug" id="" class="form-control"
                                        value="{{ $product->slug }}">
                                    @error('slug')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Category : </label>
                                    <select name="category_id" id="" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ?
                                            'selected' : '' }}>
                                            {{ $category->name }}</option>
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
                                        <option value="{{ $brand->id }}" {{ $brand->name == $product->brand ? 'selected'
                                            : '' }}>
                                            {{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Small Description : </label>
                                    <textarea name="small_description" id="" rows="3"
                                        class="form-control">{{ $product->small_description }}</textarea>
                                    @error('small_description')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="" class="h6">Description : </label>
                                    <textarea name="description" id="" class="form-control" cols="30"
                                        rows="4">{{ $product->description }}</textarea>
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
                                    <input type="text" name="meta_title" id="" class="form-control"
                                        value="{{ $product->meta_title }}">
                                    @error('meta_title')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="h6">Meta-Keyword : </label>
                                    <textarea name="meta_keyword" id="" rows="3"
                                        class="form-control">{{ $product->meta_keyword }}</textarea>
                                    @error('meta_keyword')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="" class="h6">Meta-Description : </label>
                                    <textarea name="meta_description" id="" class="form-control" cols="30"
                                        rows="4">{{ $product->meta_description }}</textarea>
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
                                    <input type="text" name="original_price" id="" class="form-control"
                                        value="{{ $product->original_price }}">
                                    @error('original_price')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="h6">Selling Price : </label>
                                    <input type="text" name="selling_price" id="" class="form-control"
                                        value="{{ $product->selling_price }}">
                                    @error('selling_price')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="h6">Quantity : </label>
                                    <input type="number" name="quantity" id="" class="form-control"
                                        value="{{ $product->quantity }}">
                                    @error('quantity')
                                    <div class="text-danger"> {{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="" class="h6">Trending : </label><br>
                                    <input type="checkbox" name="trending" id="" style="width: 20px;height: 20px;" {{
                                        $product->trending == '1' ? 'checked' : '' }}>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label for="" class="h6">Status : </label><br>
                                    <input type="checkbox" name="status" id="" style="width: 20px;height: 20px;" {{
                                        $product->status == '1' ? 'checked' : '' }}>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="pro_image" role="tabpanel" aria-labelledby="pro_image-tab">
                            <div class="col-md-6 mb-3">
                                <label for="" class="h6">Product Images : </label>
                                <input type="file" name="image[]" id="" class="form-control" multiple>
                                @if ($product->productImages)

                                @foreach ($product->productImages as $image)
                                <div class="btn-group-vertical m-2 p-2 border rounded">
                                    <img src="{{ asset($image->image) }}" alt="image" class="m-1" height="70px"
                                        width="70px">
                                    <a class="btn text-danger px-2 py-1 mt-1" href={{
                                        url('admin/product-image/'.$image->id.'/delete') }}>
                                        <i class="fa fa-trash"></i></a>
                                </div>
                                @endforeach

                                @else
                                <h5>No Image Added</h5>
                                @endif
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
                                    <h5>Quantity : </h5><input type="number" name="color_quantity[{{ $color->id }}]"
                                        id="" class="form-control">
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
                        <button type="submit" class="btn btn-primary px-4 py-2" value="submit">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
