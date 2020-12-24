<?php


namespace Modules\Contact\Http\Traits;


use Illuminate\Http\JsonResponse;
use Modules\Contact\Entities\Ticket;
use Modules\Contact\Http\Requests\TicketRequest;

trait Tickets
{

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return try_catch(null, 'not found', '404', function () {
            return Ticket::select('id', 'status', 'priority_id', 'department_id', 'created_at', 'updated_at')
                ->with('priority:id,name')
                ->with('department:id,name')->get();
        });
    }

    /**
     * @param Ticket $ticket
     * @return JsonResponse
     */
    public function show(Ticket $ticket): JsonResponse
    {
        return try_catch(null, 'notfound', '404', function () use ($ticket) {
            return $ticket->with('priority:id,name')
                ->with('department:id,name')->first();
        });
    }

    /**
     * @param TicketRequest $request
     * @return JsonResponse
     */
    public function store(TicketRequest $request): JsonResponse
    {
        // TODO : Definition on this line and how is work
        return try_catch(null, 'notfound', '404', function () use ($request) {
            return $request->user('api')->tickets()->create($request->validated());
        });

    }

    /**
     * @param TicketRequest $request
     * @param Ticket $ticket
     * @return JsonResponse
     */
    public function update(TicketRequest $request, Ticket $ticket): JsonResponse
    {
        return try_catch('ticket updated', 'notfound', '404', function () use ($ticket,$request) {
            return $ticket->update($request->validated());
        });

    }

    /**
     * @param Ticket $ticket
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(Ticket $ticket): JsonResponse
    {

        return try_catch('ticket deleted', 'notfound', '404', function () use ($ticket) {
            return $ticket->delete();
        });

    }


}
