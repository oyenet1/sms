<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Students;
use Livewire\WithPagination;

class Student extends Component
{
    use WithPagination;

    public $delete = null;
    public $show = false;

    public $update = false;
    public $name, $email, $level, $cid, $faculty, $department, $phone, $reg_no;
    protected $listeners = [
        'deleteConfirm' => 'delete',
    ];
    public $search, $perPage = 10;
    // refreshinputs after saved
    function refreshInputs()
    {
        $this->name = '';
        $this->email = '';
        $this->level = '';
        $this->faculty = '';
        $this->department = '';
        $this->phone = '';
        $this->reg_no = '';
    }

    public function closeModal()
    {
        $this->show = false;
    }

    protected $rules = [
        'email' => ['required', 'unique:students'],
        'reg_no' => ['required', 'unique:students'],
        'phone' => ['required', 'digits:10'],
        'level' => ['required', 'digits:3'],
        'faculty' => ['required'],
        'department' => ['required'],
        'name' => ['required'],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function save()
    {
        $data = $this->validate();
        $saved = Students::create($data);
        $this->show = false;

        if ($saved) {
            
            $this->refreshInputs();
            $this->dispatchBrowserEvent('closeModal');
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Student Added Successfully',
                'title' => 'Created',
                'timer' => 3000,
            ]);
        }

        $this->resetPage();
    }

    public function edit($id)
    {

        $Student = Students::findOrFail($id);

        $this->show = true;

        $this->cid = $Student->id;
        $this->name = $Student->name;
        $this->faculty = $Student->faculty;
        $this->level = $Student->level;
        $this->department = $Student->department;
        $this->reg_no = $Student->reg_no;
        $this->email = $Student->email;
        $this->phone = $Student->phone;
        $this->update = true;
        $this->dispatchBrowserEvent('showModal');
    }

    function update()
    {

        $cid = $this->cid;
        $Student = $this->validate([
            'email' => ['required'],
            'reg_no' => ['required'],
            'phone' => ['required', 'digits:10'],
            'level' => ['required', 'digits:3'],
            'faculty' => ['required'],
            'department' => ['required'],
            'name' => ['required'],
        ]);
        $true = Students::find($cid)->update($Student);

        $this->update = false;
        $this->refreshInputs();

        $this->closeModal();
        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Student Updated Successfully',
                'title' => 'Updated',
                'timer' => 2000,
            ]);
        }
    }
    public function confirmDelete($id)
    {

        $Student = Students::findOrFail($id);

        $this->delete = $id;

        $this->dispatchBrowserEvent('swal:confirm');
    }

    public function delete()
    {
        $Student = Students::findOrFail($this->delete);
        $true = $Student->delete();

        if ($true) {
            $this->dispatchBrowserEvent('swal:success', [
                'icon' => 'success',
                'text' => 'Student deleted Successfully',
                'title' => 'Deleted',
                'timer' => 2000,
            ]);
        }
    }

    public function render()
    {
        $departments = ['Computer Science', 'Mathematics', 'Physics', 'Biology', 'Chemistry', 'Statistics', 'Micro-biology'];
        $faculties = ['Science', 'Engineering', 'Education', 'Management Science'];
        $search = '%' . $this->search . '%';
        $students = Students::where('name', 'LIKE', $search)->orWhere('level', 'LIKE', $search)->orWhere('department', 'LIKE', $search)->orderBy('created_at', 'desc')->paginate($this->perPage);
        return view('livewire.student', compact(['students', 'departments', 'faculties']));
    }
}
