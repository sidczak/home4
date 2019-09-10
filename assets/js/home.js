import Vue from 'vue'

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

import Vuetify from 'vuetify'
// Vue.use(Vuetify)
Vue.use(Vuetify, {
  iconfont: 'md'
})
new Vue({ el: '#app' });
import VueRouter from 'vue-router';
import vueCustomElement from 'vue-custom-element';

import '../css/home.scss';

// vuetify style
// import 'vuetify/dist/vuetify.min.css'
// import 'material-design-icons-iconfont/dist/material-design-icons.css'

import ExampleComponent from './components/ExampleComponent.vue';
import EduCounter from './components/EduCounter.vue';
import WebinarFlywheel from './cm-components/landing/webinar-flywheel/WebinarFlywheel.vue';
import Homepage from './cm-components/landing/homepage/Homepage.vue';

// Vue.config.ignoredElements = [
//   'example-component'
//   'edu-counter'
// ];

Vue.use(vueCustomElement);

Vue.customElement('example-component', ExampleComponent);
Vue.customElement('edu-counter', EduCounter);
Vue.customElement('cm-webinar-flywheel', WebinarFlywheel);
Vue.customElement('cm-homepage', Homepage);

const $ = require('jquery');
require('bootstrap');
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

import svg4everybody from 'svg4everybody';
svg4everybody();

//import main from './main';