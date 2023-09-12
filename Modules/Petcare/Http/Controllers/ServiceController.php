<?php

namespace Modules\Petcare\Http\Controllers;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Petcare\Enums\ServicesType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Petcare\Entities\Service;
use Modules\Petcare\Interfaces\ServiceRepositoryInterface;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    private ServiceRepositoryInterface $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }
    public function index(Request $request)
    {

        try {
            $data['title'] = __('common.Services_List');
            DB::beginTransaction();

            $data['services'] = $this->serviceRepository->getAllServices();
            DB::commit();

            return view('petcare::service.index', compact('data'));
        } catch (Exception $e) {
            DB::rollback();
            // return $this->sendError(__('auth.some_error'), $this->exMessage($e));
        }
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {


        $data['title'] =  __('common.Create_Service');
        //Must Manage taxes
        $data['tax_list'] = array();

        /**
         * Services Type 
         * @retun SERVICETYPE From Enums Class
         */
        $data['services_type'] =  ServicesType::SERVICETYPE;
        $data['additional_service'] = $this->serviceRepository->getAllServices(1);
        return view('petcare::service.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->except('image', 'file');


        $data['name'] = preg_replace('/[\n\r]/', "<br>", htmlspecialchars(trim($data['name'])));

        $data['service_details'] = str_replace('"', '@', $data['service_details']);


        $data['is_active'] = true;
        $images = $request->image;
        $image_names = [];
        if ($images) {
            foreach ($images as $key => $image) {
                $imageName = $image->getClientOriginalName();
                $image->move('public/images/services', $imageName);
                $image_names[] = $imageName;
            }
            $data['image'] = implode(",", $image_names);
        } else {
            $data['image'] = 'blank_small.png';
        }
        if ($data['tax_id'] == null) {
            $data['tax_id'] = 0;
        }
        $data['slug'] = Str::slug($data['name']);
        $file = $request->file;
        if ($file) {
            $ext = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
            $fileName = strtotime(date('Y-m-d H:i:s'));
            $fileName = $fileName . '.' . $ext;
            $file->move('public/service/files', $fileName);
            $data['file'] = $fileName;
        }
        //return $data;

        $data['created_by'] = Auth::user()->id;
        $service = Service::create($data);

        Toastr::success(__('response.Service created successfully'), 'Success');
        return redirect()->route('service.index');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('petcare::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('petcare::edit');
    }


    public function additionalServices()
    {
        try {
            DB::beginTransaction();
            $additional_service = 1;
            $data['services'] = $this->serviceRepository->getAllServices($additional_service);
            DB::commit();

            return view('petcare::service.service.additional-service', compact('data'));
        } catch (Exception $e) {
            DB::rollback();
            // return $this->sendError(__('auth.some_error'), $this->exMessage($e));
        }
    }


    public function storeAdditionalServices(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['services'] = $this->serviceRepository->createService($data);
            DB::commit();

            return response()->json(['success' => 'Add Success']);;
        } catch (Exception $e) {
            DB::rollback();
            // return $this->sendError(__('auth.some_error'), $this->exMessage($e));
        }
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
