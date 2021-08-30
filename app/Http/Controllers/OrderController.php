<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderEmail;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'foreign_currency_purchased' => 'required',
            'exchange_rate' => 'required',
            'surcharge_amount' => 'required',
            'foreign_amount' => 'required_if:zar_amount,null',
            'zar_amount' => 'required_if:foreign_amount,null',
            'payment' => 'required'
        ]);

        if ($request['foreign_amount'] === null) {
            $amount = $request['zar_amount'];
        } else {
            $amount = $request['foreign_amount'];
        }

        $order = new Order;

        $order->currency_purchased = $request['currency_selected'];
        $order->exchange_rate = $request['exchange_rate'];
        $order->surcharge = $request['surcharge_percentage'];
        $order->amount_purchased = $request['foreign_currency_purchased'];
        $order->zar_amount_paid = $request['payment'];
        $order->surcharge_amount = $request['surcharge_amount'];
        $order->save();

        if ($request['currency_selected'] === 'GBP') {
            $email = 'junadeduplessis@gmail.com';

            $mailData = [
                'currency_purchased' => $request['currency_selected'],
                'exchange_rate' => $request['exchange_rate'],
                'surcharge' => $request['surcharge_percentage'],
                'amount_purchased' => $request['foreign_currency_purchased'],
                'zar_amount_paid' => $request['payment'],
                'surcharge_amount' => $request['surcharge_amount']
            ];

            Mail::to($email)->send(new OrderEmail($mailData));
        }

        return redirect()->back()->with('message', 'Order placed successfully!');
    }
}
