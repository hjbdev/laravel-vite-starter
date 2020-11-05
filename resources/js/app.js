// require('./bootstrap');
import '../css/app.css';

import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';

const app = createApp({
    components: {
        ExampleComponent
    }
}).mount('#app');

console.log('app.js loaded');