<?php

namespace App\Http\Requests;

use App\Models\Vendor;
use Clue\Redis\Protocol\Model\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VendorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $vendorId = $this->input('id');
        // dd($vendorId);
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'nullable',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(Vendor::class)->ignore($vendorId),
            ],
            'company_name' => ['required','string' ,'max:225'],
            'gst_number' => ['nullable' , 'max:50'],
            'address' => ['nullable'],
            'city' => ['nullable' ,'max:225'],
            'state' => ['nullable' ,'max:225'],
            'pincode' => ['nullable' ,'max:10'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }
}
