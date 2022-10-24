//require('./bootstrap');
import './bootstrap';

//import window.swal = require('sweetalert2');

// Import modules...
import {
    createApp,
    h
} from 'vue';
import {
    createInertiaApp
} from '@inertiajs/inertia-vue3';
import {
    InertiaProgress
} from '@inertiajs/progress';

import {
    resolvePageComponent
} from 'laravel-vite-plugin/inertia-helpers';
import {
    ZiggyVue
} from '../../vendor/tightenco/ziggy/dist/vue.m';

/*const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({ render: () => h(app, props) })
            .use(plugin)
            .mixin({ methods: { route } })
            .mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });*/
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    //resolve: (name) => require(`./Pages/**/*.${name}.vue`),
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`,import.meta.glob('./Pages/**/*.vue')),
    setup({
        el,
        app,
        props,
        plugin
    }) {
        return createApp({
                render: () => h(app, props)
            })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
});

InertiaProgress.init({
    color: '#4B5563'
});
