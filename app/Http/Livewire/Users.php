<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use App\Models\User;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

// use Illuminate\Database\Query\Builder;

class Users extends Component
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
        $student = User::findOrFail($id);

        $this->delete = $id;

        $this->dispatchBrowserEvent('swal:confirm');
    }

    public function delete()
    {

        $student = User::findOrFail($this->delete);

        $true = $student->delete();
        $this->resetPage();

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Student has deleted Successfully from the school',
                'title' => 'Student Deleted',
                'timer' => 4000,
            ]);
        }
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $payments = auth()->user()->payments;
        $students = User::whereHas('roles', function (Builder $query) {
            $query->where('name', 'students');
        })->with(['roles'])->where('reg_no', 'LIKE', $search)->paginate($this->perPage);
        return view('livewire.users', compact(['students', 'payments']));
    }
}
