<template lang="pug">
    .resize.section-min-vh-100.flex-shrink-0
        section.d-flex.align-items-center.section-py-80.section-min-vh-100.your-window
            b-container
                b-row.text-center(v-for="n in 1" :key="n.id")
                    b-col
                        h1.mb-0 Your Window:<br/> Width: {{ window.width }}, Height: {{ window.height }}
                        .box.text-center
                            | boxOffset: {{ boxOffset.width }} x {{ boxOffset.height }}
                            br
                            | boxOffsetTop: {{ boxOffset.top }}
                            br
                            | boxOffsetLeft: {{ boxOffset.left }}
                            br
                            | boxClient: {{ boxClient.width }} x {{ boxClient.height }}
                            br
                            | boxClientTop: {{ boxClient.top }}
                            br
                            | boxClientLeft: {{ boxClient.left }}
                            br
                            | boxScroll: {{ boxScroll.width }} x {{ boxScroll.height }}
                            br
                            | boxScrollTop: {{ boxScroll.top }}
                            br
                            | boxScrollLeft: {{ boxScroll.left }}
        section.d-flex.align-items-center.section-py-80.section-min-vh-100.player
            b-container
                b-row.text-center(v-for="n in 1" :key="n.id")
                    b-col
                        .box.text-center
                            h1.mb-0 Play Sound
        section.d-flex.align-items-center.section-py-80.section-min-vh-100
            b-container
                b-row.text-center(v-for="n in 1" :key="n.id")
                    b-col
                        h1.mb-0 Your Window:<br/> Width: {{ window.width }}, Height: {{ window.height }}
                            br
                            | https://codepen.io/tahazsh/pen/ZwxeGx
</template>
<script>
    export default {
        name: "Scroll",
        data () {
            return {
                window: {
                    width: 0,
                    height: 0
                },
                boxOffset: {
                    width: 0,
                    height: 0,
                    top: 0,
                    left: 0
                },
                boxClient: {
                    width: 0,
                    height: 0,
                    top: 0,
                    left: 0
                },
                boxScroll: {
                    width: 0,
                    height: 0,
                    top: 0,
                    left: 0
                }
            }
        },
        mounted() {
            window.addEventListener('resize', this.handleResize)
            this.handleResize();
        },
        destroyed() {
            window.removeEventListener('resize', this.handleResize)
        },
        methods: {
            handleResize() {
                this.window.width = window.innerWidth;
                this.window.height = window.innerHeight;

                // const element = document.getElementById('#box');
                const element = document.querySelector('.box');

                this.boxOffset.width = element.offsetWidth;
                this.boxOffset.height = element.offsetHeight;
                this.boxOffset.top = element.offsetTop;
                this.boxOffset.left = element.offsetLeft;

                this.boxClient.width = element.clientWidth;
                this.boxClient.height = element.clientHeight;
                this.boxClient.top = element.clientTop;
                this.boxClient.left = element.clientLeft;

                this.boxScroll.width = element.scrollWidth;
                this.boxScroll.height = element.scrollHeight;
                this.boxScroll.top = element.scrollTop;
                this.boxScroll.left = element.scrollLeft;
            }
        }
    };
</script>
<style lang="scss" scoped>
@import '../../css/variables/color.scss';
.your-window {
    background-color: $wet-asphalt-100;
    .box {
        background-color: $wet-asphalt-50;
        margin: 20px;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 15px 35px -5px rgba($wet-asphalt-500, 0.3);
    }
}

.player {
    background-color: $silver-100;
    .box {
        background-color: $silver-50;
        margin: 20px;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0px 15px 35px -5px rgba($silver-500, 0.3);
    }
}
</style>