<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required', message: "Толтыруға міндетті!")]
    public $email;

    #[Validate('required', message: "Толтыруға міндетті!")]
    public $password;

    public function login() {
        $this->validate();
    
        if (Auth::attempt($this->all())) {
            return redirect()->to('/profile');
        } else {
            session()->flash('login_status', 'Email немесе құпия сөзде қате бар!');
        }
    }
    

}
