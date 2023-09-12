<?php

namespace Modules\Petcare\Repositories;

use Illuminate\Support\Facades\Request;
use Modules\Petcare\Entities\Setting;
use Modules\Petcare\Interfaces\SettingRepositoryInterface;

class SettingRepository implements SettingRepositoryInterface
{
    public function getSettings()
    {
        return Setting::first();
    }

    public function updateSettings(array $data)
    {
        $settings = Setting::first();

        if (!$settings) {
            $settings = new Setting();
        }

        $settings->name = $data['name'];
        $settings->email = $data['email'];
        $settings->copy_right = $data['copy_right'];
        $settings->phone = $data['phone'];
        $settings->telepoh = $data['telepoh'];
        $settings->facebook = $data['facebook'];
        $settings->tnstagram = $data['tnstagram'];
        $settings->tnapchat = $data['tnapchat'];
        $settings->twitter = $data['twitter'];

        if (request()->hasFile('logo_image')) {
            $logoPath = $this->uploadImage(request(), 'logo_image');
            $settings->logo_image = $logoPath;
        }

        if (request()->hasFile('icon')) {
            $iconPath = $this->uploadImage(request(), 'icon');
            $settings->icon = $iconPath;
        }

        $settings->save();

        return $settings;
    }

    protected function uploadImage($request, $fieldName)
    {
        if (!$request->hasFile($fieldName)) {
            return null;
        }

        $file = $request->file($fieldName);
        $filePath = $file->store('uploads', 'public');

        return $filePath;
    }
}
