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

}
