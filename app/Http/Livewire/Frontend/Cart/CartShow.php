<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;

class CartShow extends Component
{
    public $cart,$totalPrice = 0;

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart,
        ]);
    }
    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if (1 < $cartData->quantity) {
                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Quantity down',
                    'type' => 'success',
                    'status' => 200
                ]);
            } else if ($cartData->quantity <= 1) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Dont small than 1',
                    'type' => 'warning',
                    'status' => 200
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->productColor()->where('id', $cartData->product_color_id)->exists()) {
                $productColor = $cartData->productColor()->where('id', $cartData->product_color_id)->first();
                if ($productColor->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity up',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $productColor->quantity . ' quantity available',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                }
            } else {
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Quantity up',
                        'type' => 'success',
                        'status' => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Only ' . $cartData->product->quantity . ' quantity available',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                }
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }
    public function removeItemCart(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id' ,$cartId)->first();
        if($cartRemoveData)
        {
            $cartRemoveData->delete();
            $this->emit('cartAddUpdate');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Delete product out Cart',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }
}