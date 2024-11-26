<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Subscriber;
use App\Models\Address;
use App\Models\Payment;
use Exception;

class Subscriberform extends Component
{
    use WithFileUploads;

    public $currentStep = 1;
    public $personalDetails = [
        'name'  => '',
        'email' => '',
        'phone' => '',
    ];
    public $addressDetails = [
        'address_line1' => '',
        'address_line2' => '',
        'city'          => '',
        'state'         => '',
        'postal_code'   => '',
        'country'       => '',
    ];
    public $paymentDetails = [
        'card_number' => '',
        'expiry_date' => '',
        'cvv'         => '',
    ];
    public $isPremium = false;

    protected $rules = [
        'personalDetails.name'         => 'required|string|max:255',
        'personalDetails.email'        => 'required|email|unique:subscribers,email',
        'personalDetails.phone'        => 'required|numeric|digits:10',
        'addressDetails.address_line1' => 'required_if:isPremium,true|string|max:255',
        'addressDetails.city'          => 'required_if:isPremium,true|string|max:255',
        'addressDetails.state'         => 'required_if:isPremium,true|string|max:255',
        'addressDetails.postal_code'   => 'required_if:isPremium,true|string|max:10',
        'addressDetails.country'       => 'required_if:isPremium,true|string',
        'paymentDetails.card_number'   => 'required_if:isPremium,true|numeric|digits_between:13,19',
        'paymentDetails.expiry_date'   => 'required_if:isPremium,true|date_format:m/y|after_or_equal:now',
        'paymentDetails.cvv'           => 'required_if:isPremium,true|numeric|digits:3',
    ];

    public function render()
    {
        return view('livewire.subscriberform');
    }

    public function nextStep()
    {
        $this->validate($this->getValidationRulesForStep());

        if ($this->currentStep == 1 && !$this->isPremium) {
            $this->currentStep = 4;
        } elseif ($this->currentStep < 4) {
            $this->currentStep++;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
        }
    }

    public function submit()
    {
        try {
            $this->validate($this->getValidationRulesForStep());

            $subscriber = Subscriber::create([
                'name'              => $this->personalDetails['name'],
                'email'             => $this->personalDetails['email'],
                'phone'             => $this->personalDetails['phone'],
                'subscription_type' => $this->isPremium ? 'premium' : 'free',
            ]);

            if ($this->isPremium) {
                Address::create([
                    'subscriber_id' => $subscriber->id,
                    'address_line1' => $this->addressDetails['address_line1'],
                    'address_line2' => $this->addressDetails['address_line2'],
                    'city'          => $this->addressDetails['city'],
                    'state'         => $this->addressDetails['state'],
                    'postal_code'   => $this->addressDetails['postal_code'],
                    'country'       => $this->addressDetails['country'],
                ]);

                Payment::create([
                    'subscriber_id' => $subscriber->id,
                    'card_number'   => $this->paymentDetails['card_number'],
                    'expiry_date'   => $this->paymentDetails['expiry_date'],
                    'cvv'           => $this->paymentDetails['cvv'],
                ]);
            }

            session()->flash('message', 'Registration complete!');
            return redirect()->route('home');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    private function getValidationRulesForStep()
    {
        switch ($this->currentStep) {
            case 1:
                return array_filter($this->rules, fn($key) => str_starts_with($key, 'personalDetails'), ARRAY_FILTER_USE_KEY);
            case 2:
                return array_filter($this->rules, fn($key) => str_starts_with($key, 'addressDetails'), ARRAY_FILTER_USE_KEY);
            case 3:
                return array_filter($this->rules, fn($key) => str_starts_with($key, 'paymentDetails'), ARRAY_FILTER_USE_KEY);
            default:
                return [];
        }
    }
}
