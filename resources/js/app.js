import './bootstrap';

import {createApp} from "vue";
import Echo from 'laravel-echo/dist/echo'; // Adjust the path based on your project structure
import Pusher from 'pusher-js';
import ListRoom from "./component/ListRoom.vue";
import Chat from "./component/Chat.vue";

const app = createApp();
Pusher.logToConsole = true;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
});


// app.config.globalProperties.$echo = $echo;



// app.config.globalProperties.$echo  = new Pusher(`${import.meta.env.VITE_PUSHER_APP_KEY}`, {
//     cluster: `${import.meta.env.VITE_PUSHER_APP_CLUSTER}`
// });

// var channel = pusher.subscribe('chat');
// channel.bind('send-message', function(data) {
//     app.messages.push(JSON.stringify(data));
// });
// console.log(import.meta.env.VITE_PUSHER_APP_KEY);
// app.config.globalProperties.$echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT || 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT || 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME || 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
//     authEndpoint: '/broadcasting/auth', // Set the appropriate auth endpoint
// });
app.component("ListRoom" , ListRoom);
app.component("chat" , Chat);
// export { $echo }; // Export the echo instance explicitly

app.mount("#app");