<?php

namespace App\Http\Livewire\Csv;

use Livewire\Component;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Show extends Component
{
    protected $listeners = ['saved'];

    use WithPagination;

    public function render()
    {
        if (Auth::id() != 1) {
            $list = File::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(8);
        } else {
            $list = File::orderBy('id', 'desc')->paginate(8);
        }

        return view('livewire.csv.show', [ 'list' => $list ]);
    }

    public function saved()
    {
        $this->render();
    }

    public function deleteItem(File $item)
    {
        $item->delete();
    }
}
