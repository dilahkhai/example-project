<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskRequest extends FormRequest
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
        $rule_task_unique = Rule::unique('task', 'task');
        // mendeklarasikan apa yang mau dibuat unique
        if($this->method() !== 'POST'){
            // !== jika method bukan POST
            $rule_task_unique->ignore($this->route()->parameter('id'));
            // maka dia akan menolak
            // jika post, maka rule unique berlaku
        }



        return [
            'task' => ['required', $rule_task_unique],
            'user' => ['required']
        ];
    }

    public function messages()
    {
        return[
            'required' => 'isian :attribute harus di isi',
            'user.required' => 'nama pengguna harus di isi'
        ];
    }
}
