<div>
    <!-- Steps Icons for Steps Wizard -->
    <div class="stepwizard">
        <div class="container mt-4">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step" wire:ignore>
                    <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep >= 1 ? 'btn-primary' : 'btn-light' }}">
                        @if($currentStep > 1)
                            <i class="fa fa-check"></i>
                        @else
                            1
                        @endif
                    </a>
                </div>
                <div class="stepwizard-step" wire:ignore>
                    <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep >= 2 ? 'btn-primary' : 'btn-light' }}">
                        @if($currentStep > 2)
                            <i class="fa fa-check"></i>
                        @else
                            2
                        @endif
                    </a>
                </div>
                @if($isPremium)
                    <div class="stepwizard-step" wire:ignore>
                        <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep >= 3 ? 'btn-primary' : 'btn-light' }}">
                            @if($currentStep > 3)
                                <i class="fa fa-check"></i>
                            @else
                                3
                            @endif
                        </a>
                    </div>
                @endif
                <div class="stepwizard-step" wire:ignore>
                    <a href="#step-4" type="button" class="btn btn-circle {{ $currentStep == 4 ? 'btn-primary' : 'btn-light' }}">4</a>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN STEP 1: Personal Details -->
    <div id="step-1" class="{{ $currentStep != 1 ? 'd-none' : '' }}">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Personal Details
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-md-4">Name:</label>
                                <div class="col-md-8">
                                    <input type="text" id="name" class="form-control" wire:model="personalDetails.name" />
                                </div>
                                @error('personalDetails.name')<span class="text-danger">{{ __('Name is required') }}</span>@enderror
                            </div>
                            <div class="form-group row mt-4">
                                <label for="email" class="col-md-4">Email:</label>
                                <div class="col-md-8">
                                    <input type="email" id="email" class="form-control" wire:model="personalDetails.email" />
                                </div>
                                @error('personalDetails.email')<span class="text-danger">{{ __('Email is required') }}</span>@enderror
                            </div>
                            <div class="form-group row mt-4">
                                <label for="phone" class="col-md-4">Phone:</label>
                                <div class="col-md-8">
                                    <input type="text" id="phone" class="form-control" wire:model="personalDetails.phone" />
                                </div>
                                @error('personalDetails.phone')<span class="text-danger">{{ __('Phone is required') }}</span>@enderror
                            </div>
                            <div class="form-group row mt-4">
                                <label class="col-md-4">Subscription Type:</label>
                                <div class="col-md-8">
                                    {{-- <select class="form-control" wire:model="isPremium" wire:change="updatedIsPremium($event.target.value)"> --}}
                                    <select class="form-control" wire:model="isPremium" wire:change="handleSubscriptionChange">
                                        <option value="0">Free</option>
                                        <option value="1">Premium</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary btn-sm" wire:click="nextStep">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END STEP 1 -->

    <!-- BEGIN STEP 2: Address Details -->
    <div id="step-2" class="{{ $currentStep != 2 ? 'd-none' : '' }}">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Address Details
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="address_line1" class="col-md-4">Address Line 1:</label>
                                <div class="col-md-8">
                                    <input type="text" id="address_line1" class="form-control" wire:model="addressDetails.address_line1" />
                                </div>
                                @error('addressDetails.address_line1')<span class="text-danger">{{ __('Address Line 1 is required') }}</span>@enderror
                            </div>
                            <div class="form-group row mt-4">
                                <label for="address_line2" class="col-md-4">Address Line 2:</label>
                                <div class="col-md-8">
                                    <input type="text" id="address_line2" class="form-control" wire:model="addressDetails.address_line2" />
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="city" class="col-md-4">City:</label>
                                <div class="col-md-8">
                                    <input type="text" id="city" class="form-control" wire:model="addressDetails.city" />
                                </div>
                                {{-- @error('addressDetails.city')<span class="text-danger">{{ $message }}</span>@enderror --}}
                                @error('addressDetails.city')<span class="text-danger">{{ __('City is required') }}</span>@enderror
                            </div>
                            <div class="form-group row mt-4">
                                <label for="state" class="col-md-4">State:</label>
                                <div class="col-md-8">
                                    <input type="text" id="state" class="form-control" wire:model="addressDetails.state" />
                                </div>
                                {{-- @error('addressDetails.state')<span class="text-danger">{{ $message }}</span>@enderror --}}
                                @error('addressDetails.state')<span class="text-danger">{{ __('State is required') }}</span>@enderror
                            </div>
                            <div class="form-group row mt-4">
                                <label for="postal_code" class="col-md-4">Postal Code:</label>
                                <div class="col-md-8">
                                    <input type="text" id="postal_code" class="form-control" wire:model="addressDetails.postal_code" />
                                </div>
                                {{-- @error('addressDetails.postal_code')<span class="text-danger">{{ $message }}</span>@enderror --}}
                                @error('addressDetails.postal_code')<span class="text-danger">{{ __('Postal code is required') }}</span>@enderror
                            </div>
                            <div class="form-group row mt-4">
                                <label for="country" class="col-md-4">Country:</label>
                                <div class="col-md-8">
                                    <select id="country" class="form-control" wire:model="addressDetails.country">
                                        <option value="">Select</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="US">United States</option>
                                        <option value="CA">Canada</option>
                                        <option value="UK">United Kingdom</option>
                                    </select>
                                </div>
                                {{-- @error('addressDetails.country')<span class="text-danger">{{ $message }}</span>@enderror --}}
                                @error('addressDetails.country')<span class="text-danger">{{ __('Country is required') }}</span>@enderror
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button class="btn btn-success btn-sm" wire:click="previousStep">Back</button>
                                <button class="btn btn-primary btn-sm" wire:click="nextStep">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END STEP 2 -->

    <!-- BEGIN STEP 3: Payment Details -->
    @if($isPremium)
    <div id="step-3" class="{{ $currentStep != 3 ? 'd-none' : '' }}">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Payment Details
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="card_number" class="col-md-4">Card Number:</label>
                                <div class="col-md-8">
                                    <input type="text" id="card_number" class="form-control" wire:model="paymentDetails.card_number" />
                                </div>
                                {{-- @error('paymentDetails.card_number')<span class="text-danger">{{ $message }}</span>@enderror --}}
                                @error('paymentDetails.card_number')<span class="text-danger">{{ __('Card number is required') }}</span>@enderror
                            </div>
                            <div class="form-group row mt-4">
                                <label for="expiry_date" class="col-md-4">Expiry Date (MM/YY):</label>
                                <div class="col-md-8">
                                    <input type="text" id="expiry_date" class="form-control" wire:model="paymentDetails.expiry_date" />
                                </div>
                                {{-- @error('paymentDetails.expiry_date')<span class="text-danger">{{ $message }}</span>@enderror --}}
                                @error('paymentDetails.expiry_date')<span class="text-danger">{{ __('Expiry date is required') }}</span>@enderror
                            </div>
                            <div class="form-group row mt-4">
                                <label for="cvv" class="col-md-4">CVV:</label>
                                <div class="col-md-8">
                                    <input type="text" id="cvv" class="form-control" wire:model="paymentDetails.cvv" />
                                </div>
                                {{-- @error('paymentDetails.cvv')<span class="text-danger">{{ $message }}</span>@enderror --}}
                                @error('paymentDetails.cvv')<span class="text-danger">{{ __('CVV code is required') }}</span>@enderror
                            </div>
                            <div class="d-flex justify-content-between mt-4">
                                <button class="btn btn-success btn-sm" wire:click="previousStep">Back</button>
                                <button class="btn btn-primary btn-sm" wire:click="nextStep">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- END STEP 3 -->

    <!-- BEGIN STEP 4: Confirmation -->
    <div id="step-4" class="{{ $currentStep != 4 ? 'd-none' : '' }}">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Confirmation
                        </div>
                        <div class="card-body">
                            <button class="btn btn-success btn-sm" wire:click="previousStep">Back</button>
                            <button class="btn btn-primary btn-sm" wire:click="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END STEP 4 -->
</div>
