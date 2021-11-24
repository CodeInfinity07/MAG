<?php

namespace App\Http\Livewire;

use App\Models\genre;
use App\Models\primaryGenre;
use Livewire\Component;

class Dropdowns extends Component
{
    public $selectedClass = null;
    public $selectedSection = null;
    public $sections = null;

    public function render()
    {
        return view('livewire.dropdowns', [
            'classes' => genre::all(),
        ]);
    }

    public function updatedSelectedClass($class_id)
    {
        $this->sections = primaryGenre::where('genre_id', $class_id)->get();
    }

}
