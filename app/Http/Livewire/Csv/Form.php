<?php

namespace App\Http\Livewire\Csv;

use App\Models\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Form extends Component
{
    use WithFileUploads;

    public $file;
    public $path;

    protected $rules = [
        'file' => 'required|mimes:csv,txt|max:2048'
    ];

    public function render()
    {
        return view('livewire.csv.form');
    }

    public function save()
    {
        $this->validate();

        $path = $this->file->store('files');

        $item = new File();
        $item->name = str_replace('files/', '', $path);
        $item->path = $path;
        $item->user_id = Auth::id();
        $item->save();

        $this->emit('saved');
    }
}
