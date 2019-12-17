import Vue from 'vue'

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

// import Vuetify from 'vuetify'
// Vue.use(Vuetify)
// Vue.use(Vuetify, {
//   iconfont: 'md'
// })
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
import Album from './bs-components/examples/album/Album.vue';
import Resize from './bs-components/Resize.vue';
import Scroll from './bs-components/Scroll.vue';
import ScrollProgress from './bs-components/ScrollProgress.vue';

// Vue.config.ignoredElements = [
//   'example-component'
//   'edu-counter'
// ];

Vue.use(vueCustomElement);

Vue.customElement('example-component', ExampleComponent);
Vue.customElement('edu-counter', EduCounter);
Vue.customElement('cm-webinar-flywheel', WebinarFlywheel);
Vue.customElement('cm-homepage', Homepage);
Vue.customElement('bs-album', Album);
Vue.customElement('bs-resize', Resize);
Vue.customElement('bs-scroll', Scroll);
Vue.customElement('bs-scroll-progress', ScrollProgress);

const $ = require('jquery');
require('bootstrap');
import 'jquery.easing';
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

import svg4everybody from 'svg4everybody';
svg4everybody();

// import holderjs from 'holderjs';
import VueHolder from 'vue-holderjs';
Vue.use(VueHolder);

import main from './main';
