<?php

namespace App\Livewire;

use App\Models\MenuItem;
use App\Models\Service;
use Livewire\Component;

class ShowHomePage extends Component
{
    public $services;


    public function mount()
    {
        $this->services = Service::latest()->get();
    }



    public function render()
    {
        $menuItems = MenuItem::with('services')
            ->where('visible', true)
            ->orderBy('order')
            ->get();

        return view('livewire.show-home-page', compact('menuItems'));
    }
}
