<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Fees extends Component
{
    public function render()
    {
        $user = auth()->user();
        $payments = auth()->user()->payments;
        return view('livewire.fees', compact(['user', 'payments']));
    }
}
