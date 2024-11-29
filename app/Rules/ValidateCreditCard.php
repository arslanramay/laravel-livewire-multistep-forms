<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidateCreditCard implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Remove non-numeric characters
        $value = preg_replace('/\D/', '', $value);

        // Validate using Luhn algorithm
        $sum = 0;
        $alternate = false;

        for ($i = strlen($value) - 1; $i >= 0; $i--) {
            $n = (int) $value[$i];

            if ($alternate) {
                $n *= 2;
                if ($n > 9) {
                    $n -= 9;
                }
            }

            $sum += $n;
            $alternate = !$alternate;
        }

        return ($sum % 10) === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid credit card number.';
    }
}
