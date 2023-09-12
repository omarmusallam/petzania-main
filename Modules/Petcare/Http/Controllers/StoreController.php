<?php

namespace Modules\Petcare\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Petcare\Entities\SaleStore;
use Modules\Petcare\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function index()
    {
        $stores = SaleStore::orderby('sale_stores.created_at', 'desc')->paginate();

        return view('petcare::stores.index', compact('stores'));
    }

    public function create()
    {
        return view('petcare::stores.create');
    }

    public function store(StoreRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'image');
        $bannerPath = $this->uploadImage($request, 'banner');

        $store = SaleStore::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'location' => $request['location'],
            'address' => $request['address'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'image' => $imagePath,
            'banner' => $bannerPath,
            'status' => $request->input('status', '0'),
        ]);

        return redirect()->route('store.index')->with('success', 'Store created successfully');
    }

    public function edit($id)
    {
        $store = SaleStore::findOrFail($id);
        return view('petcare::stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $id)
    {
        $store = SaleStore::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($store->image) {
                Storage::disk('public')->delete($store->image);
            }
            $store->image = $this->uploadImage($request, 'image');
        }

        if ($request->hasFile('banner')) {
            if ($store->banner) {
                Storage::disk('public')->delete($store->banner);
            }
            $store->banner = $this->uploadImage($request, 'banner');
        }

        $store->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'location' => $request->input('location'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'status' => $request->has('status') ? '1' : '0',
        ]);

        return redirect()->route('store.index')->with('success', 'Store updated successfully');
    }

    public function destroy($id)
    {
        $store = SaleStore::findOrFail($id);

        $store->delete();

        if ($store->image) {
            Storage::disk('public')->delete($store->image);
        }
        if ($store->banner) {
            Storage::disk('public')->delete($store->banner);
        }
        return redirect()->route('store.index')->with('success', 'Store deleted successfully');
    }

    // function of uploading image
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
