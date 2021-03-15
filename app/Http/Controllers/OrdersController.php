<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\CreateOrder;

use App\Contact;
use App\Order;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')->paginate(20);

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $contacts = Contact::all(); // Temp

        return view('orders.create', [
            'contacts' => $contacts, // I prefer array over compact()
        ]);
    }

    public function store(CreateOrder $request): RedirectResponse
    {
        $order = Order::create($request->only(['contact_id', 'uuid']));
        $items = $order->items()->create($request->only(['item', 'price']));

        // In a real use case, you would use a queue here
        // Could also make use of job or events here
        Mail::to('noreply@example.com')->send(new OrderConfirmation($order));

        return redirect('orders')->with('alert', 'Order created!');
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }
}
