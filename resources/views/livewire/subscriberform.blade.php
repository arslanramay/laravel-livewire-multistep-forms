<div>
    <!-- Steps Icons for Steps Wizard -->
    <div class="stepwizard">
        <div class="container mt-4">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-circle">
                        @if($currentStep > 1)
                            <i class="fa fa-check"></i>
                        @else
                            1
                        @endif
                    </a>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-circle">
                        @if($currentStep > 2)
                            <i class="fa fa-check"></i>
                        @else
                            2
                        @endif
                    </a>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-circle">3</a>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN STEP 1 Wrapper -->
    <div id="step-1" class="{{ $currentStep != 1? 'd-none' :'' }}" >
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            User Register
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for ="fname">First Name:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input type="text" name="fname" class="form-control" wire:model="fname" />
                                </div>
                                @error('fname')<span class="text text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="lname">Last Name:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="lname" class="form-control" wire:model="lname" />
                                </div>
                                @error('lname')<span class="text text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="dob">Date of Birth:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" name="dob" class="form-control" wire:model="dob" max="{{ date('Y-m-d') }}"  />
                                </div>
                                @error('dob')<span class="text text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="address">Address</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control" wire:model="address" />
                                </div>
                                @error('address')<span class="text text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col d-flex justify-content-end">
                                    <button class="btn btn-primary btn-sm" wire:click="firstsubmit">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END STEP 1 Wrapper -->

    <!-- BEGIN STEP 2 Wrapper -->
    <div id="step-2" class="{{ $currentStep != 2? 'd-none' :'' }}">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            User Register
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for ="email">Email:</label>
                                </div>
                                <div class="col-md-6 ">
                                    <input type="email" name="email" class="form-control" wire:model="email" />
                                </div>
                                @error('email')<span class="text text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="conatctno">Contact no:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="conatctno" class="form-control" wire:model="conatctno" />
                                </div>
                                @error('conatctno')<span class="text text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="photo">Photo:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="photo" class="form-control" wire:model="photo" />
                                </div>
                                @if($photo)
                                    <img src="{{ $photo->temporaryUrl() }}" alt="Preview" style="max-width: 100px; max-height: 100px; margin-top: 10px;">
                                @endif
                                @error('photo')<span class="text text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col d-flex justify-content-between">
                                    <button class="btn btn-success btn-sm" wire:click="back(1)">Back</button>
                                    <button class="btn btn-primary btn-sm" wire:click="secondsubmit">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END STEP 2 Wrapper -->

    <!-- BEGIN STEP 3 Wrapper(Review Details) -->
    <div id="step-3" class="{{ $currentStep != 3? 'd-none' :'' }}">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Review Details
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for ="fname">First Name:</label>
                                </div>
                                <div class="col-md-6 ">
                                    {{$fname}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="lname">Last Name:</label>
                                </div>
                                <div class="col-md-6">
                                    {{$lname}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="dob">Date of Birth:</label>
                                </div>
                                <div class="col-md-6">
                                    {{$dob}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="address">Address</label>
                                </div>
                                <div class="col-md-6">
                                    {{$address}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="email">email</label>
                                </div>
                                <div class="col-md-6">
                                    {{$email}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="address">conatct no</label>
                                </div>
                                <div class="col-md-6">
                                    {{$conatctno}}
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-md-6">
                                    <label for ="image">Image</label>
                                </div>
                                <div class="col-md-6">
                                @if($photoPreview)
                                    <img src="{{ $photoPreview }}" alt="Uploaded Photo" style="max-width: 100px; max-height: 100px;">
                                @else
                                    No photo uploaded
                                @endif
                                </div>
                            </div>

                            <button class="btn btn-success btn-sm" wire:click="back(2)">Back</button>
                            <button class="btn btn-primary btn-sm" wire:click="submitdetails">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END STEP 3 Wrapper -->

</div>
</div>