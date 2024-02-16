<?php

namespace App\Livewire;

use Livewire\Component;

class Register extends Component
{
    public $role = 'patient';
    public $specialite;
    
    public function render()
    {
        return view('livewire.register');
    }
}
