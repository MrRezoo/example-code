<?php


namespace Modules\Contact\Http\Traits;


use Illuminate\Http\JsonResponse;
use Modules\Contact\Entities\Department;
use Modules\Contact\Http\Requests\DepartmentRequest;

trait Departmental
{


    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return try_catch(null, null, '404', function () {
            return Department::select('name')->get();
        });
    }


    /**
     * @param DepartmentRequest $request
     * @return JsonResponse
     */
    public function store(DepartmentRequest $request): JsonResponse
    {
        return try_catch(null, null, '404', function () use ($request) {
            return Department::create($request->validated());
        });

    }


    /**a
     * @param Department $department
     * @return JsonResponse
     */
    public function show(Department $department): JsonResponse
    {
        return try_catch(null, null, '404', function () use ($department) {
            return $department;
        });

    }


    /**
     * @param DepartmentRequest $request
     * @param Department $department
     * @return JsonResponse
     */
    public function update(DepartmentRequest $request, Department $department): JsonResponse
    {
        return try_catch('department updated',null,'404',function () use ($department,$request){
            return $department->update($request->validated());
        });

    }

    /**
     * @param Department $department
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Department $department): JsonResponse
    {
        return try_catch('department deleted',null,'404',function () use ($department){
             $department->delete();
        });

    }

}
