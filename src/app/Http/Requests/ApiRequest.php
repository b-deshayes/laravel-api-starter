<?php


namespace App\Http\Requests;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class ApiRequest extends FormRequest
{
    /**
     * Get the validator instance for the request and
     * add attach callbacks to be run after validation
     * is completed.
     *
     * @return Validator
     */
    protected function getValidatorInstance(): Validator
    {
        return parent::getValidatorInstance()->after(function($validator){
            $this->after($validator);
        });
    }

    /**
     * Execute code after the validation passed.
     *
     * @param Validator $validator
     *
     * @return void
     */
    protected function after(Validator $validator): void
    {
    }
}
