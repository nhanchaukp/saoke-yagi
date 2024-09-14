<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $title='Sao Kê VAR 🕵️‍♂️';
    public function render()
    {
        $title = $this->title;
        return view('livewire.home', compact('title'))->layout('layouts.guest');
    }
}
