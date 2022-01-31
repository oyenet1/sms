<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;

class Query extends Component
{


    function query($id)
    {
        $payment = Payment::findOrFail($id);
        // dd($payment);
        $true = $payment->reversals()->create();

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'If the reversal request is succesful, kindly checking the status of the request',
                'title' => 'Reversal Submitted',
                'timer' => 5000,
            ]);
        }

        return redirect()->back();
    }

    public function render()
    {
        $user = Auth()->user();
        $payments = Payment::where('user_id', auth()->user()->id)->get();
        return view('livewire.query', compact(['payments', 'user']));
    }
}
