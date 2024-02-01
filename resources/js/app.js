import './bootstrap';
import '../css/app.css';
import { createApp } from 'vue';
import Tweet from './components/tweet.vue';
import User from './components/user.vue';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//createApp(Tweet).mount('#app');
const app = createApp({});
app.component('tweet', Tweet);
app.component('user', User);
app.mount('#app');
//createApp({}).component('tweet', Tweet).mount('#app');
//createApp({}).component('user', User).mount('#app');
