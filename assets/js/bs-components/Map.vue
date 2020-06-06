<template lang="pug">
    #mapContainer
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
        this.map = L.map("mapContainer").setView([51.959, -8.623], 12);
        L.tileLayer(
            // 'http://{s}.tile.osm.org/{z}/{x}/{y}.png', 
            'https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=ZyTc09CjiOWhg45asVV3',
            {
                // tileSize: 512,
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                // attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>'
            }
        ).addTo(this.map);
    },
    beforeDestroy() {
        if (this.map) {
            this.map.remove();
        }
    }
};
</script>

<style lang="scss" scoped>
#mapContainer {
    width: 800px;
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