import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_SERVER_HOST ? ? window.location.hostname,
    wsPort: import.meta.env.VITE_REVERB_SERVER_PORT ? ? 8080,
    wssPort: import.meta.env.VITE_REVERB_SERVER_PORT ? ? 8080,
    forceTLS: false,
    enabledTransports: ['ws', 'wss'],
});



