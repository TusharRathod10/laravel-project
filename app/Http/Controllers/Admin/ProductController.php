<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductFormRequest;
use App\Models\Color;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status','0')->get();
        return view('admin.product.create', compact('categories', 'brands','colors'));
    }
    public function store(ProductFormRequest $request)
    {
        $validate = $request->validated();
        $category = Category::findOrFail($validate['category_id']);
        $product = $category->products()->create([
            'category_id' => $validate['category_id'],
            'name' => $validate['name'],
            'slug' => Str::slug($validate['slug']),
            'brand' => $validate['brand'],
            'small_description' => $validate['small_description'],
            'description' => $validate['description'],
            'original_price' => $validate['original_price'],
            'selling_price' => $validate['selling_price'],
            'quantity' => $validate['quantity'],
            'trending' => $request->trending == TRUE ? '1' : '0',
            'status' => $request->status == TRUE ? '1' : '0',
            'meta_title' => $validate['meta_title'],
            'meta_keyword' => $validate['meta_keyword'],
            'meta_description' => $validate['meta_description'],
        ]);

        if ($request->hasFile('image')) {
            $path = 'assets/product/';
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = rand(111111111, 999999999) . '.' . $extension;
                $file->move($path, $filename);
                $imgpath = $path . $filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image' => $imgpath,
                ]);
            }
        }

        if($request->color){
            foreach ($request->color as $key => $color) {
                $product->productColor()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $request->color_quantity[$key] ?? 0,
                ]);
            }
        }

        return redirect('admin/product')->with('message', 'Product Added Successfully');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        $product_color=$product->productColor()->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id',$product_color)->get();

        return view('admin.product.edit', compact('categories', 'brands', 'product','colors'));
    }
    public function update(ProductFormRequest $request, int $product_id)
    {
        $validate = $request->validated();
        $product = Category::findOrFail($validate['category_id'])->products()->where('id', $product_id)->first();

        if ($product) {
            $product->update([
                'category_id' => $validate['category_id'],
                'name' => $validate['name'],
                'slug' => Str::slug($validate['slug']),
                'brand' => $validate['brand'],
                'small_description' => $validate['small_description'],
                'description' => $validate['description'],
                'original_price' => $validate['original_price'],
                'selling_price' => $validate['selling_price'],
                'quantity' => $validate['quantity'],
                'trending' => $request->trending == TRUE ? '1' : '0',
                'status' => $request->status == TRUE ? '1' : '0',
                'meta_title' => $validate['meta_title'],
                'meta_keyword' => $validate['meta_keyword'],
                'meta_description' => $validate['meta_description'],
            ]);

            if ($request->hasFile('image')) {
                $path = 'assets/product/';
                foreach ($request->file('image') as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = rand(111111111, 999999999) . '.' . $extension;
                    $file->move($path, $filename);
                    $imgpath = $path . $filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $imgpath,
                    ]);
                }
            }

            return redirect('admin/product')->with('message', 'Product Updated Successfully');
        } else {
            return redirect('admin/product')->with('message', 'No Product Id Found');
        }
    }
    public function destroyImage(int $image_id)
    {
        $pro_image = ProductImage::findOrFail($image_id);
        if (File::exists($pro_image->image)) {
            File::delete($pro_image->image);
        }
        $pro_image->delete();
        return redirect()->back()->with('message', 'Product Image Delete Successfully');
    }

    public function destroy(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        if ($product->productImages()) {
            foreach ($product->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product Delete Successfully');
    }
}
