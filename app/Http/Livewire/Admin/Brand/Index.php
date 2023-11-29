<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name,$status,$brand_id,$category_id;

    public function rules()
    {
        return [
            'name' => 'required | string',
            'category_id' => 'required | integer',
            'status' => 'nullable'
        ];
    }
    public function resetInput()
    {
        $this->name = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
        $this->category_id = NULL;
    }
    public function storeBrand()
    {
        $validateData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'status' => $this->status == true ? '1' : '0',
            'category_id' => $this->category_id
        ]);
        session()->flash('message','Brand Add Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function closeModal()
    {
        $this->resetInput();
    }
    public function openModal()
    {
        $this->resetInput();
    }
    public function editBrand(int $brand_id)
    {
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;
    }
    public function updateBrand()
    {
        $validateData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'status' => $this->status == true ? '1' : '0',
            'category_id' => $this->category_id
        ]);
        session()->flash('message','Brand Update Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function deleteBrand($brand_id)
    {
        $this->brand_id = $brand_id;
    }
    public function destroyBrand()
    {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message','Brand Delete Successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInput();
    }
    public function render()
    {
        $categories = Category::where('status', '0')->get();
        $brands = Brand::orderBy('id','ASC')->paginate(5);
        return view('livewire.admin.brand.index', ['brands' => $brands ,'categories' => $categories])
            ->extends('layouts.admin')
            ->section('content');
    }
}
