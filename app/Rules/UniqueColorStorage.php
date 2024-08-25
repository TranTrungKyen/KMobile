<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueColorStorage implements Rule
{
    public function passes($attribute, $value)
    {
        // Assume $value is an associative array with 'colors' and 'storages'
        $colors = request('color_id');
        $storages = request('storage_id');

        $combinations = [];

        // Loop through colors and storages to check for duplicates
        for ($i = 0; $i < count($colors); $i++) {
            $combination = $colors[$i] . '-' . $storages[$i];

            if (in_array($combination, $combinations)) {
                // If combination already exists, validation fails
                return false;
            }

            $combinations[] = $combination;
        }

        return true;
    }

    public function message()
    {
        return __(VALIDATE_MESSAGE_URL['BACKEND'] . 'create_product_detail_form.unique_color_storage.unique');
    }
}
