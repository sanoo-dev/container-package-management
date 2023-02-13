<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContainerPackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'container_no' => ['required'],
            'vendor' => ['required'],
            'measurement_system' => ['required'],
            'receiving' => ['required'],
            'datetime' => ['required'],
            'style_noes.*' => ['required'],
            'uoms.*' => ['required'],
            'prefixes.*' => ['required'],
            'suffixes.*' => ['required'],
            'heights.*' => ['required'],
            'widths.*' => ['required'],
            'lengths.*' => ['required'],
            'weights.*' => ['required'],
            'upcs.*' => ['required'],
            'size1s.*' => ['required'],
            'color1s.*' => ['required'],
            'size2s.*' => ['required'],
            'color2s.*' => ['required'],
            'size3s.*' => ['required'],
            'color3s.*' => ['required'],
            'cartons.*' => ['required'],
        ];
    }
}
