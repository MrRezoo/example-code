<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Department;
use Modules\Contact\Http\Requests\DepartmentRequest;
use Modules\Contact\Http\Traits\Departmental;

class DepartmentController extends Controller
{
    use Departmental;
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index()
    {
       return try_catch(null,null,'404',function (){
           return $this->department_index();
        });
    }


    /**
     * Store a newly created resource in storage.
     * @param DepartmentRequest $request
     * @return JsonResponse
     */
    public function store(DepartmentRequest $request)
    {
        return try_catch(null,null,'404',function () use ($request){
            return $this->department_store($request);
        });
    }

    /**
     * Show the specified resource.
     * @param Department $department
     * @return JsonResponse
     */
    public function show(Department $department)
    {
        return try_catch(null,null,'404',function () use ($department){
           return $this->department_show($department);
        });
    }


    /**
     * Update the specified resource in storage.
     * @param DepartmentRequest $request
     * @param Department $department
     * @return JsonResponse
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        return try_catch('department updated',null,'404',function () use ($department,$request){
             $this->department_update($request,$department);
        });
    }

    /**
     * Remove the specified resource from storage.
     * @param Department $department
     * @return JsonResponse
     */
    public function destroy(Department $department)
    {
        // TODO : how to change catch message ?
        return try_catch('department deleted',null,'404',function () use ($department){
            $this->department_destroy($department);
        });
    }
}
