<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadCsv extends Component
{
    use WithFileUploads;
    public $csvFile;
    protected $rules = [
        'csvFile' => 'required|mimes:csv,txt'
    ];

    public function uploadCsv()
    {
        $this->validate();
        $this->csvFile->store('csv');
    }

    public function render()
    {
        return view('livewire.upload-csv');
    }
}
