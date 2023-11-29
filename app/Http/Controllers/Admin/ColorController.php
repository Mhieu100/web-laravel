<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;


class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index', compact('colors'));
    }
    public function create()
    {
        return view('admin.colors.create');
    }
    public function store(ColorFormRequest $request)
    {
        $validatData = $request->validated();
        Color::create($validatData);
        return redirect('admin/colors')->with('message','Color Add Successfully');
    }
    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }
    public function update(ColorFormRequest $request, int $color_id)
    {
        $validatData = $request->validated();
        $validatData['status'] = $request->status == true ? '1' : '0';
        Color::findOrFail($color_id)->update($validatData);
        return redirect('admin/colors')->with('message', 'Color Update Successfully');
    }
    public function destroy(int $color_id)
    {
        $color = Color::findOrFail($color_id);
        $color->delete();
        return redirect()->back()->with('message', 'Color Delete Successfully');
    }
}