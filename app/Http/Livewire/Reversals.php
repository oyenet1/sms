<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reversal;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class Reversals extends Component
{
    use WithPagination;

    public $name, $search, $perPage = 50;

    protected $listeners = [
        'deleteConfirm' => 'delete',
        'approve' => 'approve',
        'deny' => 'deny',
    ];

    function add()
    {
        $this->update = false;
    }

    public function confirmDelete($id)
    {
        $student = Reversal::findOrFail($id);

        $this->delete = $id;

        $this->dispatchBrowserEvent('swal:confirm');
    }

    public function confirmApprove($id)
    {
        $student = Reversal::findOrFail($id);

        $this->delete = $id;

        $this->dispatchBrowserEvent('swal:approve');
    }

    public function confirmDeny($id)
    {
        $student = Reversal::findOrFail($id);

        $this->delete = $id;

        $this->dispatchBrowserEvent('swal:deny');
    }

    public function delete()
    {

        $student = Reversal::findOrFail($this->delete);

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
    public function approve()
    {

        $student = Reversal::findOrFail($this->delete);

        $true = $student->update([
            'status' => 'approved'
        ]);
        $this->resetPage();

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Payment Reversal Request has been Approved',
                'title' => 'Reversal Request Approved',
                'timer' => 4000,
            ]);
        }
    }
    public function deny()
    {

        $student = Reversal::findOrFail($this->delete);

        $true = $student->update([
            'status' => 'denied'
        ]);
        $this->resetPage();

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Payment Reversal Request has been denied Successfully',
                'title' => 'Reversal Denied',
                'timer' => 4000,
            ]);
        }
    }

    public function render()
    {
        // $search = '%' . $this->search . '%';
        $reversals = Reversal::with(['payment'])->where('status', 'processing')->orderBy('created_at', 'desc')->paginate($this->perPage);
        return view('livewire.reversals', compact(['reversals']));
    }
}
