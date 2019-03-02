import Vue from 'vue';
import VueRouter from 'vue-router';
import vueCustomElement from 'vue-custom-element';

import '../css/home.scss';

// import App from './App';

// new Vue({
//     el: '#app',
//     render: h => h(App)
// });

import ExampleComponent from './components/ExampleComponent.vue';
import EduCounter from './components/EduCounter.vue';

// Vue.config.ignoredElements = [
//   'example-component'
//   'edu-counter'
// ];

Vue.use(vueCustomElement);

Vue.customElement('example-component', ExampleComponent);
Vue.customElement('edu-counter', EduCounter);

