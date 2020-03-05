<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100.justify-content-center.align-items-center
        b-container
            b-row
                b-col(md="3" :style="{overflow: ['hidden']}")
                    img(class="img-fluid rounded" :src="require('../../images/covers/1.jpg')" @wheel.prevent="zoom" :style="imgStyle")
                b-col(md="3" :style="{overflow: ['hidden']}")
                    img(class="img-fluid rounded" src="../../images/covers/2.jpg" @wheel.prevent="zoom" :style="imgStyle")
                b-col(md="3" :style="{overflow: ['hidden']}")
                    img(class="img-fluid rounded" :src="require('../../images/covers/3.jpg')" @wheel.prevent="zoom" :style="imgStyle")
                b-col(md="3" :style="{overflow: ['hidden']}")
                    b-img(:src="require('../../images/covers/4.jpg')" @wheel.prevent="zoom" :style="imgStyle" fluid rounded)
            //- b-row.my-5
            //-     b-col
            //-         pre
            //-             code(class="twig rounded")
            //-                 | ➜  home4 git:(master) ✗ yarn add highlight.js
</template>

<script>
    export default {
        name: "Zoom",
        data () {
            return {
                level: 1
            }
        },
        computed: {
            imgStyle: function() {
                return {
                    transform: `scale(${this.level})`
                }
            }
        },
        methods: {
            zoom: function(e) {
                if(e.deltaY > 0) {
                    this.level +=0.1;
                } else {
                    if(this.level > 1) {
                        this.level -=0.1;
                    }
                }
            }
        }
    };
</script>