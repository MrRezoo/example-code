<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Ticket;
use Modules\Contact\Http\Requests\TicketRequest;
use Modules\Contact\Http\Traits\Tickets;

class TicketController extends Controller
{
    use Tickets;

}
