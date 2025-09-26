<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $packages = Catalogue::orderBy('package_name')->get();
        $selected = $request->query('package_id'); // dari tombol "Pesan Sekarang"
        return view('public.orders.create', compact('packages','selected'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'package_id'     => ['required','integer','exists:catalogues,id'],
            'customer_name'  => ['required','string','max:50'],
            'customer_email' => ['required','email','max:191'],
            'customer_phone' => ['nullable','string','max:20'],
            'payment_method' => ['required', Rule::in(['bank_transfer','e_wallet','cod'])],
        ]);

        $pkg = Catalogue::findOrFail($data['package_id']);

        // generate kode (unik) JWP-YYYY-xxxxx
        $code = 'JWP-'.date('Y').'-'.str_pad((string)random_int(1,99999),5,'0',STR_PAD_LEFT);
        while (Order::where('order_code',$code)->exists()) {
            $code = 'JWP-'.date('Y').'-'.str_pad((string)random_int(1,99999),5,'0',STR_PAD_LEFT);
        }

        $order = Order::create([
            'order_code'     => $code,
            'package_id'     => $pkg->id,
            'customer_name'  => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_phone' => $data['customer_phone'] ?? null,
            'payment_method' => $data['payment_method'],
            'status'         => 'requested',
            'total_price'    => $pkg->package_price,
        ]);

        return redirect()->route('orders.success')->with([
            'order_code'     => $order->order_code,
            'package_name'   => $pkg->package_name,
            'total_price'    => $pkg->package_price,
            'payment_method' => $order->payment_method,
        ]);
    }

    public function success()
    {
        if (!session('order_code')) return redirect()->route('home');

        return view('public.orders.success', [
            'orderCode'     => session('order_code'),
            'packageName'   => session('package_name'),
            'totalPrice'    => session('total_price'),
            'paymentMethod' => session('payment_method'),
        ]);
    }
}
