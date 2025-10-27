<?php

namespace App\Events;

use App\Models\ContactInfo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Queue\SerializesModels;

class ContactInfoUpdated implements ShouldBroadcastNow
{
    use InteractsWithSockets, SerializesModels;

    /**
     * The updated contact info.
     */
    public ContactInfo $contact;

    /**
     * Create a new event instance.
     */
    public function __construct(ContactInfo $contact)
    {
        // We send only fresh model data (no relationships needed here)
        $this->contact = $contact->fresh();
    }

    /**
     * The channel this event broadcasts on.
     */
    public function broadcastOn(): Channel
    {
        // Public channel (you can switch to Private if needed)
        return new Channel('contact-info');
    }

    /**
     * The event name clients will listen for.
     */
    public function broadcastAs(): string
    {
        return 'contact.updated';
    }
}
