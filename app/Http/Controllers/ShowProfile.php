<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\Reversal;
use Illuminate\Http\Request;

class ShowProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $user = User::findOrFail($id);
        $payments = Payment::where('user_id', $user->id)->get();
        // $reversals = Reversal::where('payment_id', $payments->id)->get();
        return view('profile', compact(['user', 'payments']));
    }
}
