<?php

namespace App\Http\Livewire\Admin\Category;

use Illuminate\Support\Facades\Session;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;

    public function render()
    {
        $categories = Category::orderBy('id','ASC')->paginate(5);
        return view('livewire.admin.category.index',['categories' => $categories]);
    }
    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }
    public function destroyCategory()
    {
        $Category = Category::find($this->category_id);
        $path = 'uploads/category/'.$Category->image;
        if(File::exists($path))
        {
            File::delete($path);
        }
        $Category->delete();
        session::flash('message', 'Category Deleted Successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
}
