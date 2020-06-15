<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            b-row.section-min-h-100
                b-col.col-lg-12.d-flex.justify-content-center.align-items-center
                    #map
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";

export default {
    name: "LeafletMap",
    data() {
        return {
            map: null
        };
    },
    mounted() {
        this.map = L.map('map',{
            dragging: !L.Browser.mobile,
            tap: !L.Browser.mobile
        }).setView([54.4056323, 18.5765012], 15);

        //Defauly
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(this.map);

        // Free layer
        // L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png', {
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // }).addTo(this.map);

        //Streets api.maptiler
        // L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=ZyTc09CjiOWhg45asVV3', {
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // }).addTo(this.map);

        var myIcon = L.icon({
            iconUrl: require('../../images/browsers/chrome.png'),
            iconSize: [28, 28],
            iconAnchor: [14, 0]
        });
        
        var customPopup = 
            '<div class="cloud-map">'+
                '<h3>ClickMeeting</h3>'+
                '<p class="mt-0">ul. Arkońska 6/A4<br/>'+
                '80-387 Gdańsk<br/>'+
                'Poland</p>'+
            '</div>';

        var customOptions = {
            'maxWidth': '540'
        }

        L.marker([54.4056323, 18.5765012], {icon: myIcon}).addTo(this.map)
            .bindPopup(customPopup, customOptions)
            .closePopup();
            
        this.map.scrollWheelZoom.disable();
    },
    beforeDestroy() {
        if (this.map) {
            this.map.remove();
        }
    }
};
</script>

<style lang="scss" scoped>
#map {
    width: 100%;
    height: 600px;
}
</style>

// Instalation
// ➜  home4 git:(master) ✗ yarn add leaflet

// Inspiration
// https://www.npmjs.com/package/vue2-leaflet
// https://stackoverflow.com/questions/42816517/cant-load-leaflet-inside-vue-component/56114797
// https://github.com/vue-leaflet/Vue2Leaflet/issues/157
// https://codepen.io/travishorn/pen/rYeeMw
// https://cloud.maptiler.com/maps/streets/leaflet-gl