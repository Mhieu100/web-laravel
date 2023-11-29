<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $products = Product::orderBy('id', 'ASC')->paginate(5);
        return view('livewire.admin.product.index', ['products' => $products]);
    }
}