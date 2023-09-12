<?php

namespace Modules\Petcare\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Petcare\Entities\Setting;
use Modules\Petcare\Http\Requests\GeneralSettingsRequest;
use Modules\Petcare\Interfaces\SettingRepositoryInterface;

class SettingController extends Controller
{
    protected $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function edit()
    {
        $settings = $this->settingRepository->getSettings();

        if (!$settings) {
            $settings = new Setting();
        }

        return view('petcare::general_settings.edit', compact('settings'));
    }

    public function update(GeneralSettingsRequest $request)
    {
        $data = $request->validated();

        $settings = $this->settingRepository->updateSettings($data);

        if ($settings) {
            return response()->json(['success' => 'Settings updated successfully']);
        }

        return response()->json(['errors' => ['An unexpected error occurred.']]);
    }
}
