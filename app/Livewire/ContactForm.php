<?php

namespace App\Livewire;

use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $subject = '';
    public string $message = '';

    public bool $submitted = false;

    protected array $rules = [
        'name' => 'required|min:2',
        'email' => 'required|email',
        'subject' => 'required|min:3',
        'message' => 'required|min:10',
    ];

    public function submit(): void
    {
        $this->validate();

        // In a production app, you can send an email or dispatch an event here.
        $this->submitted = true;

        $this->reset(['name', 'email', 'subject', 'message']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
