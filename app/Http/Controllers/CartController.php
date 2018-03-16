<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update()
    {
    	$cart = auth()->user()->cart;
    	$cart->status = 'pendiente';
    	$cart->save();

    	$notification = 'Tu pedido ya se ha registrado';
    	return back()->with(compact('notification'));
    }
}
