<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Event extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $paginate = 12;

    public function attend(Ticket $id)
    {
       redirect("/");
    }
    
    public function render()
    {
        $events = Ticket::where('date', '>=', Carbon::now())->paginate($this->paginate);
        return view('livewire.event', compact(['events']))->layout('layouts.guest');
    }
}
