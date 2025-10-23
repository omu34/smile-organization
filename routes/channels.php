<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Session;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
| These define the authorization rules for private channels.
| Cleaned up to remove duplicates and align with CartUpdated event.
|--------------------------------------------------------------------------
*/

Broadcast::channel('footer', function () {
    return true; // public channel, no auth needed
});
