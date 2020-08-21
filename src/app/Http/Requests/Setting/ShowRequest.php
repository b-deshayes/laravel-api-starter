<?php

namespace App\Http\Requests\Setting;

use App\Enums\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Kotus\Settings\Facades\Settings;

/**
 * @bodyParam key string required
 * @bodyParam value string required
 */
class ShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        abort_if(
            !Settings::has($this->route('key')),
            Response::HTTP_NOT_FOUND,
            __('api.v1.setting.edit.key_not_found')
        );

        return $this->user()->can(Permission::VIEW_SETTING);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
}
