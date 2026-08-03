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

Broadcast::channel('gallery', function () {
    return true; // public channel for gallery updates
});

Broadcast::channel('activities', function () {
    return true; // public channel for activity updates
});

Broadcast::channel('partners', function () {
    return true; // public channel for partner updates
});

Broadcast::channel('beneficiaries', function () {
    return true; // public channel for beneficiary updates
});

Broadcast::channel('why-us', function () {
    return true; // public channel for why-us updates
});

Broadcast::channel('featured-articles', function () {
    return true; // public channel for featured article updates
});

Broadcast::channel('resource_items', function () {
    return true; // public channel for resource updates
});

Broadcast::channel('articles', function () {
    return true; // public channel for about/article updates
});

Broadcast::channel('gallery.{id}', function ($user, $id) {
    return true; // public channel for gallery updates
});
