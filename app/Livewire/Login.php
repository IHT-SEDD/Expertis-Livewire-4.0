<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Page Login')]
#[\Livewire\Attributes\Layout('components.layouts.guest')]

class Login extends Component
{
  #[\Livewire\Attributes\Rule('required')]
  public string $email = '';
  #[\Livewire\Attributes\Rule('required')]
  public string $password;


  public function render()
  {
    // sleep(1);
    return view('livewire.login');
  }

  public function login()
  {
    if (Auth::attempt($this->validate())) {
      session()->regenerate();
      return redirect()->route('dashboard');
    }

    throw \Illuminate\Validation\ValidationException::withMessages([
      'email' => 'The Provided credentials do not match our records.'
    ]);
  }
}
