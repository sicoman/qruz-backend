<?php

namespace App\GraphQL\Validators;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

class UpdateAdminInputValidator extends Validator
{
  /**
   * @return mixed[]
   */
  public function rules(): array
  {
    return [
      'id' => ['required'],
      'phone' => ['sometimes', Rule::unique('admins', 'phone')->ignore($this->arg('id'), 'id')],
      'email' => ['sometimes', Rule::unique('admins', 'email')->ignore($this->arg('id'), 'id')],
    ];
  }

  /**
   * @return string[]
   */
  public function messages(): array
  {
    return [
      'phone.unique' => __('lang.not_available_phone'),
      'email.unique' => __('lang.not_available_email'),
    ];
  }

}