<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $cart, $totalProductAmount = 0;

    public $fullname, $email, $phone, $address, $pincode, $payment_mode = NULL, $payment_id = NULL;

    protected $listeners = [
        'validationForAll',
        'transactionEmit' => 'paidOnlineOrder'
    ];

    public function paidOnlineOrder($value)
    {
        $this->payment_id = $value;
        $this->payment_mode = 'Paid By Paypal';

        $codOrder = $this->placeOrder();
        if ($codOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('message', 'Order Place Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Place Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'warning',
                'status' => 500
            ]);
        }
    }

    public function validationForAll()
    {
        $this->validate();
    }

    public function rules()
    {
        return [
            'fullname' => 'required | string | max: 121',
            'email' => 'required | email | max: 121',
            'phone' => 'required | string| max: 11 | min: 10',
            'address' => 'required | string | max: 500',
            'pincode' => 'required | string | max: 6 | min: 6'
        ];
    }
    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'cod-' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'is progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id,
        ]);
        foreach ($this->cart as $itemCart) {
            $orderItems = Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $itemCart->product_id,
                'product_color_id' => $itemCart->product_color_id,
                'quantity' => $itemCart->quantity,
                'price' => $itemCart->product->selling_price,
            ]);
            if($itemCart->product_color_id != NULL){
                $itemCart->productColor()->where('id', $itemCart->product_color_id)->decrement('quantity', $itemCart->quantity);
            } else {
                $itemCart->product()->where('id', $itemCart->product_id)->decrement('quantity', $itemCart->quantity);
            }
        }
        return $order;
    }
    public function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();
            session()->flash('message', 'Order Place Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Place Successfully',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'warning',
                'status' => 500
            ]);
        }
    }
    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->cart as $itemCart) {
            $this->totalProductAmount += $itemCart->product->selling_price * $itemCart->quantity;
        }
        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->userDetail->phone;
        $this->pincode = auth()->user()->userDetail->pin_code;
        $this->address = auth()->user()->userDetail->address;
        $this->totalProductAmount = $this->totalProductAmount();
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount,
            'cart' => $this->cart,
        ]);
    }
}