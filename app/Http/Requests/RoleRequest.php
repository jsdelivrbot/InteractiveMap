<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoleRequest extends Request
{
/*    
     * Determine if the user is authorized to make this request.
     *
     * @return bool
 
    public function authorize()
    {
        return false;
    }
*/
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'admin' => 'required|alpha|max:50',
            'redac' => 'required|alpha|max:50',
            'user'  => 'required|alpha|max:50'
        ];
    }
}
