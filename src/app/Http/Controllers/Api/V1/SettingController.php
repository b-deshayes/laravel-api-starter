<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\EditRequest;
use App\Http\Requests\Setting\ShowRequest;
use App\Http\Resources\Setting\SettingResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * TODO: Improve this method with a ResourceCollection
     *
     * @return mixed
     */
    public function index()
    {
        $settings = Settings::all();
        return $settings;
    }

    /**
     * TODO: Write the documentation
     *
     * @param ShowRequest $request
     * @param string $key
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
     * TODO: Write the documentation
     *
     * @param EditRequest $request
     * @param string $key
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
