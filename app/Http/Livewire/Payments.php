<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class Payments extends Component
{
    use WithPagination;

    public $name, $search, $perPage = 50;

    protected $listeners = [
        'deleteConfirm' => 'delete',
    ];

    function add()
    {
        $this->update = false;
    }

    public function confirmDelete($id)
    {
        $student = Payment::findOrFail($id);

        $this->delete = $id;

        $this->dispatchBrowserEvent('swal:confirm');
    }

    public function delete()
    {

        $student = Payment::findOrFail($this->delete);

        $true = $student->delete();
        $this->resetPage();

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Student has deleted Successfully from the records',
                'title' => 'Student Deleted',
                'timer' => 4000,
            ]);
        }
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $payments = Payment::whereHas('user', function (Builder $query) {
            $query->where('name', 'LIKE', $this->search);
        })->with(['user'])->where('reference', 'LIKE', $search)->orWhere('amount', 'LIKE', $search)->orWhere('purpose', 'LIKE', $search)->paginate($this->perPage);
        return view('livewire.payments', compact(['payments']));
    }
}
