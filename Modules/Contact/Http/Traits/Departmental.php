<?php


namespace Modules\Contact\Http\Traits;


use Modules\Contact\Entities\Department;
use Modules\Contact\Http\Requests\DepartmentRequest;

trait Departmental
{

    public function department_index()
    {
        return Department::select('name')->get();
    }

    public function department_store(DepartmentRequest $request)
    {
        return Department::create($request->validated());
    }

    public function department_show(Department $department)
    {

        return $department;
    }

    /**
     * @param DepartmentRequest $request
     * @param Department $department
     * @return bool
     */
    public function department_update(DepartmentRequest $request, Department $department)
    {
        return $department->update($request->validated());
    }

    public function department_destroy(Department $department)
    {

        return $department->delete();
    }

}
