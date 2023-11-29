<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DemoMail;
use App\Mail\IncvoiceOrderMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $todayDate = Carbon::now()->format('Y');
        $orders = Order::when($request->date != null, function ($q) use ($request) {
                            return $q->whereDate('created_at', $request->date);
                         }, function ($q) use ($todayDate) {
                            return $q->whereYear('created_at', $todayDate);
                        })
                        ->when($request->status != null, function ($q) use ($request) {
                            return $q->where('status_message', $request->status);
                        })
                        ->paginate(5);

            return view('admin.orders.index', compact('orders'));
    }
    public function show(int $orderId)
    {
        $order = Order::where('id', $orderId)->first();
        if ($order) {
            return view('admin.orders.view', compact('order'));
        } else {
            return redirect('admin/orders')->with('message', 'Order not found');
        }
    }

    public function updateOrderStatus(int $orderId, Request $request)
    {
        $order = Order::where('id', $orderId)->first();
        if($order)
        {
            $order->update([
                'status_message' => $request->order_status
            ]);
            return redirect('admin/orders/' . $orderId)->with('message', 'Order Status Update');
        } else {
            return redirect('admin/orders/' . $orderId)->with('message', 'Order Id Not Found');
        }
    }

    public function viewInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('admin.invoice.generate-invoice', compact('order'));
    }
    public function generateInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];
        $today = Carbon::now()->format('d-m-Y');
        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);
        return $pdf->download('invoice-'.$order->id.'-'.$today.'.pdf');
    }
    public function sendmailInvoice(int $orderId)
    {
        try{
            $order = Order::findOrFail($orderId);
            Mail::to("hieunguyen201103@gmail.com")->send(new IncvoiceOrderMail($order));
            return redirect('admin/orders/' . $orderId)->with('message', 'Send Mail Invoice Success To ' . $order->email);
        }
        catch(\Exception $e){
            return redirect('admin/orders/' . $orderId)->with('message', 'Wrong Send Email '.$order->email);
        }
    }
}