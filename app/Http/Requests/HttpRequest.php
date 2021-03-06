<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class HttpRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();
}
