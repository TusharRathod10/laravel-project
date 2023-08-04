<?php

namespace App\Http\Controllers\Admin;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;

class ColorController extends Controller
{
    public function index()
    {
        $color = Color::paginate(5);
        return view('admin.color.index', compact('color'));
    }
    public function create()
    {
        return view('admin.color.create');
    }
    public function store(ColorFormRequest $request)
    {
        $validate = $request->validated();
        $color = new Color();
        $color->name = $validate['name'];
        $color->code = $validate['code'];
        $color->status = $request->status == TRUE ? '1' : '0';
        $color->save();

        return redirect('admin/color')->with('message', 'Color Added Successfully');
    }
    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }
    public function update(ColorFormRequest $request, $color)
    {
        $validate = $request->validated();
        $color = Color::findOrFail($color);

        $color->name = $validate['name'];
        $color->code = $validate['code'];
        $color->status = $request->status == TRUE ? '1' : '0';
        $color->update();

        return redirect('admin/color')->with('message', 'Color Update Successfully');
    }
    public function delete($color)
    {
        $color = Color::findOrFail($color);
        $color->delete();
        return redirect('admin/color')->with('message', 'Color Delete Successfully');
    }
}
