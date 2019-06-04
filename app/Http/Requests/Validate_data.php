<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Validate_data extends FormRequest
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


    

       /* return [
           
                'hobby'=>[
                
                          'required',

                        Rule::notIn(['kabadi', 'tennis']),
                         ],   
          
            //'check_value'=>'integer|between:1,10'

           //'check_value'=>'after:"2018-10-28 10:48:11"'
            //'city'=>'required|not_in:Select City'
           // 'photo' => 'required|mimes:jpeg,bmp,png'

        ];*/
    }
    
   /* public function messages()
    {


        return [

            'hobby.required'=>'Please Select At least One',
            'hobby.notIn'=>'Not allowed kabadi and tennis'
           //'check_value.between'=>'number should be 1  to 10'

            //'check_value.after'=>"only after date is allowed"
        
           // 'photo.required'=>"please upload photo",
          // 'photo.mimes'=>'Please Upload only jpeg,bmp,png'
           //'city.not_in'=>'Please Select City'
           
        ];
    }
*/
}
