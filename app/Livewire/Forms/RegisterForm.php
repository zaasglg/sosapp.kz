<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate('required', message: "Толтыруға міндетті!")]
    public $name;

    #[Validate('required', message: "Толтыруға міндетті!")]
    public $surname;

    #[Validate('required', message: "Толтыруға міндетті!")]
    public $birthday;

    #[Validate('required', message: "Толтыруға міндетті!")]
    public $phone;

    #[Validate('required', message: "Толтыруға міндетті!")]
    public $address;

    #[Validate('required', message: "Толтыруға міндетті!")]
    public $gender;

    #[Validate('required', message: "Толтыруға міндетті!")]
    public $weight;

    #[Validate('required', message: "Толтыруға міндетті!")]
    public $height;

    #[Validate('required', message: "Толтыруға міндетті!")]
    public $email;

    #[Validate('required', message: "Толтыруға міндетті!")]
    public $password;

    public function register() {

        $this->validate();

        User::create(attributes: [
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'address' => $this->address,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'weight' => $this->weight,
            'height' => $this->height
        ]);

        session()->flash('register_status', 'Сіз сәтті тіркелдіңіз!');

    }


}
