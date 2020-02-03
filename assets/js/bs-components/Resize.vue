<template lang="pug">
    .resize.section-min-vh-100.flex-shrink-0
        section.d-flex.align-items-center.section-py-80.section-min-vh-100
            b-container
                b-row.text-center(v-for="n in 1" :key="n.id")
                    b-col
                        h1.mb-0 Your Window:<br/> Width: {{ window.width }}, Height: {{ window.height }}
                        h1 {{ osName }} {{ browserName }}
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
                },
                osName: {
                    type: String,
                    default: null
                },
                browserName: {
                    type: String,
                    default: null
                }
            }
        },
        mounted() {
            window.addEventListener('resize', this.handleResize)
            this.handleResize();
            this.operatingSystemName();
            this.browserSystemName();
        },
        destroyed() {
            window.removeEventListener('resize', this.handleResize)
        },
        methods: {
            browserSystemName() {
                var ua = navigator.userAgent.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
                var browser;
                if (navigator.userAgent.match(/Edge/i) || navigator.userAgent.match(/Trident.*rv[ :]*11\./i)) {
                    browser = "msie"
                } else {
                    browser = ua[1].toLowerCase();
                }
                // $('div.icon.' + browser).addClass("active");
                this.browserName = browser
            },
            operatingSystemName() {
                // if (navigator.appVersion.indexOf("Win")!=-1) this.osName="Windows";
                // if (navigator.appVersion.indexOf("Mac")!=-1) this.osName="MacOS";
                // if (navigator.appVersion.indexOf("X11")!=-1) this.osName="UNIX";
                // if (navigator.appVersion.indexOf("Linux")!=-1) this.osName="Linux";
                if (navigator.appVersion.indexOf("Win")!=-1) {
                    this.osName="Windows"
                } else if (navigator.appVersion.indexOf("Mac")!=-1) {
                    this.osName="MacOS"
                } else if (navigator.appVersion.indexOf("X11")!=-1) {
                    this.osName="UNIX"
                } else if (navigator.appVersion.indexOf("Linux")!=-1) {
                    this.osName="Linux"
                } else {
                    this.osName="Unknown OS"
                }
            },
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
.resize {}
.box {
    background: red;
    border: 10px solid blue;
    margin: 20px;
    padding: 30px;
}
</style>