<?php

namespace Modules\Petcare\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Petcare\Entities\AppSetting;
use Modules\Petcare\Http\Requests\AppSettingsRequest;

class AppSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $banners = AppSetting::where('type', 'banner')->get();
        $splashes = AppSetting::where('type', 'splash')->get();
        $all = AppSetting::get();

        return view('petcare::app_settings.index', compact('banners', 'splashes', 'all'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $setting = new AppSetting();
        return view('petcare::app_settings.create', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AppSettingsRequest $request)
    {
        $type = $request->input('type');

        $fieldsToStore = [
            'type' => $type,
            'image_path' => null,
            'text' => $type === 'banner' ? $request->input('banner_text') : $request->input('splash_text'),
        ];

        if ($type === 'banner') {
            $fieldsToStore += [
                'link_path' => $request->input('link_path'),
                'link_text' => $request->input('link_text'),
                'link_type' => $request->input('link_type'),
            ];

            if ($request->hasFile('banner_image')) {
                $fieldsToStore['image_path'] = $this->uploadImage($request, 'banner_image');
            }
        } elseif ($type === 'splash') {
            $fieldsToStore += [
                'description' => $request->input('description'),
            ];

            if ($request->hasFile('splash_image')) {
                $fieldsToStore['image_path'] = $this->uploadImage($request, 'splash_image');
            }
        }

        AppSetting::create($fieldsToStore);

        return redirect()->route('setting.index')->with('success', 'Setting created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $setting = AppSetting::findOrFail($id);

        return view('petcare::app_settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AppSettingsRequest $request, $id)
    {
        $setting = AppSetting::findOrFail($id);

        $type = $request->input('type');

        $fieldsToUpdate = [
            'type' => $type,
            'text' => $type === 'banner' ? $request->input('banner_text') : $request->input('splash_text'),
        ];

        if ($type === 'banner') {
            $fieldsToUpdate += [
                'link_path' => $request->input('link_path'),
                'link_text' => $request->input('link_text'),
                'link_type' => $request->input('link_type'),
            ];

            if ($request->hasFile('banner_image')) {
                $imagePath = $this->uploadImage($request, 'banner_image');

                if ($setting->image_path) {
                    Storage::disk('public')->delete($setting->image_path);
                }

                $fieldsToUpdate['image_path'] = $imagePath;
            }
        } elseif ($type === 'splash') {
            $fieldsToUpdate += [
                'description' => $request->input('description'),
            ];

            if ($request->hasFile('splash_image')) {
                $imagePath = $this->uploadImage($request, 'splash_image');

                if ($setting->image_path) {
                    Storage::disk('public')->delete($setting->image_path);
                }

                $fieldsToUpdate['image_path'] = $imagePath;
            }
        }

        $setting->update($fieldsToUpdate);

        return redirect()->route('setting.index')->with('success', 'Setting updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $app_setting = AppSetting::findOrFail($id);
        $app_setting->delete();

        if ($app_setting->image_path) {
            Storage::disk('public')->delete($app_setting->image_path);
        }

        return redirect()->route('setting.index')->with('success', 'deleted successfully');
    }

    protected function uploadImage(Request $request, $fieldName)
    {
        if (!$request->hasFile($fieldName)) {
            return null;
        }

        $file = $request->file($fieldName);
        $filePath = $file->store('uploads', 'public');

        return $filePath;
    }
}
