import Vue from 'vue';
import Vuetify from 'vuetify'
Vue.use(Vuetify)
new Vue({ el: '#app' });
import VueRouter from 'vue-router';
import vueCustomElement from 'vue-custom-element';

import '../css/home.scss';

// vuetify style
import 'vuetify/dist/vuetify.min.css'

import ExampleComponent from './components/ExampleComponent.vue';
import EduCounter from './components/EduCounter.vue';

// Vue.config.ignoredElements = [
//   'example-component'
//   'edu-counter'
// ];

Vue.use(vueCustomElement);

Vue.customElement('example-component', ExampleComponent);
Vue.customElement('edu-counter', EduCounter);

const $ = require('jquery');
require('bootstrap');
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

import svg4everybody from 'svg4everybody';
svg4everybody();

//import main from './main';