<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Userdetails;

class Contactform extends Component
{
    use WithFileUploads;
    public $fname, $lname, $dob, $address, $email, $conatctno, $photo;
    public $currentStep = 1;
    public $photoPreview;

    public function render()
    {
        return view('livewire.contactform');
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function steponevalidation()
    {
        $rules = [
            'fname'   => 'required|string|max:255',
            'lname'   => 'required|string|max:255',
            'dob'     => 'required|date',
            'address' => 'required|string|max:255',
        ];
        $this->validate($rules);
    }

    public function firstsubmit()
    {
        $this->steponevalidation();
        $this->currentStep = 2;
    }

    public function steptwovalidation()
    {
        $rules = [
            'email'     => 'required|email|unique:userdetails',
            'conatctno' => 'required',
            'photo'     => 'required',
        ];
        $this->validate($rules);
    }

    public function secondsubmit()
    {
        $this->steptwovalidation();
        $this->photoPreview = $this->photo->temporaryUrl();
        $this->currentStep  = 3;
    }

    public function submitdetails()
    {

        Userdetails::create([
            'first_name'    => $this->fname,
            'last_name'     => $this->lname,
            'email'         => $this->email,
            'contact_no'    => $this->conatctno,
            'date_of_birth' => $this->dob,
            'address'       => $this->address,
            'image'         => $this->photo->store('images', 'public'),
        ]);

        $this->currentStep = 1;

        session()->flash('message', 'User details saved successfully');
        $this->clearform();
    }

    public function clearform()
    {
        $this->fname        = '';
        $this->lname        = '';
        $this->email        = '';
        $this->conatctno    = '';
        $this->dob          = '';
        $this->address      = '';
        $this->photo        = '';
        $this->photoPreview = null;
    }
}