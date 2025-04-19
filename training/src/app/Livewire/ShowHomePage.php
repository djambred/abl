<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Seo;

class ShowHomePage extends Component
{

    public $seo;

    public function mount()
    {
        $this->seo = Seo::first(); // Or based on logic, like route name
    }
    public function render()
    {
        return view('livewire.show-home-page');
            //->layout('components.layouts.app');
    }
}
