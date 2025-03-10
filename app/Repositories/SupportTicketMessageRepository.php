<?php

namespace App\Repositories;

use Abedin\Maker\Repositories\Repository;
use App\Http\Requests\SupportTicketMessageRequest;
use App\Models\SupportTicket;
use App\Models\SupportTicketMessage;

class SupportTicketMessageRepository extends Repository
{
    /**
     * base method
     *
     * @method model()
     */
    public static function model()
    {
        return SupportTicketMessage::class;
    }

    /**
     * store new banner
     *
     * @param  $support_ticket_id
     * @return supportTicket model
     * */
    public static function storeByRequest(SupportTicketMessageRequest $request, SupportTicket $supportTicket): SupportTicketMessage
    {
        return self::create([
            'support_ticket_id' => $supportTicket->id,
            'sender_id' => auth()->id(),
            'message' => $request->message,
        ]);

    }
}
