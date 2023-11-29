<?php

namespace App\Http\Livewire\Frontend\Product;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Cart;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity, $quantityCount = 1, $productColorId;

    public function addToWishList($productId)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                // session()->flash('message', 'Already add to wishlist');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already add to wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
                return false;
            } else {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                // session()->flash('message', 'Add to wishlist successfully');
                $this->emit('wishlistAddUpdate');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Add to wishlist successfully',
                    'type' => 'success',
                    'status' => 200
                ]);
                return false;
            }
        } else {
            // session()->flash('message', 'Please login to continue');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor =  $this->product->productColors()->where('id',  $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;
        if ($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = 'outofStock';
        }
    }
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }
    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                //check color product quantity and add to cart
                if ($this->product->productColors()->count() > 1) {
                    if ($this->prodColorSelectedQuantity != NULL) {
                        if (Cart::where('user_id', auth()->user()->id)->where('product_color_id', $this->productColorId)->where('product_id', $productId)->exists()) {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Product Already Add',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        } else {
                            $productColor = $this->product->productColors()->where('id', $this->productColorId)->first();
                            if ($productColor->quantity > 0) {
                                if ($productColor->quantity >= $this->quantityCount) {
                                    Cart::create([
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $this->quantityCount
                                    ]);
                                    $this->emit('cartAddUpdate');
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Add to cart successfully',
                                        'type' => 'success',
                                        'status' => 200
                                    ]);
                                } else {
                                    $this->dispatchBrowserEvent('message', [
                                        'text' => 'Only ' . $productColor->quantity . ' quantity available',
                                        'type' => 'warning',
                                        'status' => 404
                                    ]);
                                }
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Out of stock',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Product Color',
                            'type' => 'info',
                            'status' => 404
                        ]);
                    }
                } else {
                    if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Product Already Add',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    } else {
                        if ($this->product->quantity > 0) {
                            if ($this->product->quantity >= $this->quantityCount) {
                                Cart::create([
                                    'user_id' => auth()->user()->id,
                                    'product_id' => $productId,
                                    'quantity' => $this->quantityCount
                                ]);
                                $this->emit('cartAddUpdate');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Add to cart successfully',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only ' . $this->product->quantity . ' quantity available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of stock',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Produc not exist',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login to continue',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }
}