import Vue from 'vue'

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue)

// import holderjs from 'holderjs';
import VueHolder from 'vue-holderjs'
Vue.use(VueHolder)

import VueTypedJs from 'vue-typed-js'
Vue.use(VueTypedJs)

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
import HomeAboutMe from './components/home/about/AboutMe.vue';
import HomeSkill from './components/home/about/Skill.vue';
import HomeTimeline from './components/home/about/Timeline.vue';
import SoundCard from './components/home/SoundCard.vue';
import WebinarFlywheel from './cm-components/landing/webinar-flywheel/WebinarFlywheel.vue';
import Homepage from './cm-components/landing/homepage/Homepage.vue';
import Album from './bs-components/examples/album/Album.vue';
import Resize from './bs-components/Resize.vue';
import Scroll from './bs-components/Scroll.vue';
import ScrollProgress from './bs-components/ScrollProgress.vue';
import ConnectionTester from './bs-components/ConnectionTester.vue';
import Modal from './bs-components/Modal.vue';
import Zoom from './bs-components/Zoom.vue';
import Waves from './bs-components/Waves.vue';
import Transition from './bs-components/Transition.vue';
import TransitionGroup from './bs-components/TransitionGroup.vue';
import Rotate from './bs-components/Rotate.vue';
import Map from './bs-components/Map.vue';
import Clock from './components/home/Clock.vue';
import Calculator from './components/home/Calculator.vue';

// Vue.config.ignoredElements = [
//   'example-component'
//   'edu-counter'
// ];

Vue.use(vueCustomElement);

Vue.customElement('example-component', ExampleComponent);
Vue.customElement('edu-counter', EduCounter);
Vue.customElement('home-about-me', HomeAboutMe);
Vue.customElement('home-skill', HomeSkill);
Vue.customElement('home-timeline', HomeTimeline);
Vue.customElement('home-sound-card', SoundCard);
Vue.customElement('home-clock', Clock);
Vue.customElement('home-calculator', Calculator);
Vue.customElement('cm-webinar-flywheel', WebinarFlywheel);
Vue.customElement('cm-homepage', Homepage);
Vue.customElement('bs-album', Album);
Vue.customElement('bs-resize', Resize);
Vue.customElement('bs-scroll', Scroll);
Vue.customElement('bs-scroll-progress', ScrollProgress);
Vue.customElement('bs-connection-tester', ConnectionTester);
Vue.customElement('bs-modal', Modal);
Vue.customElement('bs-zoom', Zoom);
Vue.customElement('bs-waves', Waves);
Vue.customElement('bs-transition', Transition);
Vue.customElement('bs-transition-group', TransitionGroup);
Vue.customElement('bs-rotate', Rotate);
Vue.customElement('bs-map', Map);


const $ = require('jquery');
require('bootstrap');
import 'jquery.easing';
$(document).ready(function() {
    $('[data-toggle="popover"]').popover();
});

import svg4everybody from 'svg4everybody';
svg4everybody();

import main from './main';

import hljs from 'highlight.js/lib/highlight';
import php from 'highlight.js/lib/languages/php';
import twig from 'highlight.js/lib/languages/twig';
import javascript from 'highlight.js/lib/languages/javascript';

hljs.registerLanguage('php', php);
hljs.registerLanguage('twig', twig);
hljs.registerLanguage('javascript', twig);

hljs.initHighlightingOnLoad();
