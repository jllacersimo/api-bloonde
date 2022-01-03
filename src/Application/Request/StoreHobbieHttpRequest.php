<?php

namespace Src\Application\Request;
use App\Http\Requests\HttpRequest;


class StoreHobbieHttpRequest extends HttpRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'hobbies.*.hobbie_id'  => 'required|integer|exists:hobbies,id',
        ];
    }
}
