<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\EditRequest;
use App\Http\Requests\Setting\IndexRequest;
use App\Http\Requests\Setting\ShowRequest;
use App\Http\Resources\Setting\SettingCollection;
use App\Http\Resources\Setting\SettingResource;
use Kotus\Settings\Facades\Settings;

/**
 * @group Settings
 *
 * APIs for managing all application settings
 */
class SettingController extends Controller
{
    /**
     * Create a new SettingController instance.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * GET settings
     *
     * Get all information of all setting.
     *
     * @responseFile 200 responses/setting/index.json
     * @responseFile 401 responses/setting/401.unauthorized.json
     *
     * @authenticated
     *
     * @param IndexRequest $request
     *
     * @return SettingCollection
     */
    public function index(IndexRequest $request): SettingCollection
    {
        Settings::flushCache(); // TODO: Fix this shit ...
        $settings = Settings::get();
        return new SettingCollection($settings);
    }

    /**
     * GET settings/{key}
     *
     * Get the information about a specific setting by his key.
     *
     * @responseFile 200 responses/setting/show.json
     * @responseFile 401 responses/setting/401.unauthorized.json
     * @responseFile 404 responses/setting/404.not_found.json
     *
     * @authenticated
     *
     * @param ShowRequest $request
     * @param string $key The key of the setting.
     *
     * @return SettingResource
     */
    public function show(ShowRequest $request, string $key): SettingResource
    {
        Settings::flushCache(); // TODO: Fix this shit ...
        return new SettingResource([
            'key' => $key,
            'value' => Settings::get($key),
        ]);
    }

    /**
     * PATCH settings/{key}
     *
     * Update the value of an application's setting.
     *
     * @responseFile 200 responses/setting/edit.json
     * @responseFile 401 responses/setting/401.unauthorized.json
     * @responseFile 404 responses/setting/404.not_found.json
     *
     * @authenticated
     *
     * @param EditRequest $request
     * @param string $key The key of the setting.
     *
     * @return SettingResource
     */
    public function edit(EditRequest $request, string $key): SettingResource
    {
        $validated = $request->validated();

        Settings::set($key, $validated['value']);

        return new SettingResource([
            'key' => $key,
            'value' => Settings::get($key),
        ]);
    }
}
