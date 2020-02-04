<template lang="pug">
    .resize.section-min-vh-100.flex-shrink-0
        section.d-flex.align-items-center.section-py-80.section-min-vh-100
            b-container
                b-row.text-center(v-for="n in 1" :key="n.id")
                    b-col
                        h1(:class="browserName") {{ osName }} {{ browserName }}: 
                            i.fab.fa-chrome(:class="{ 'animated-arrow': browserName === 'chrome' }")
                            i.fab.fa-safari(:class="{ 'animated-arrow': browserName === 'safari' }")
                            i.fab.fa-firefox-browser(:class="{ 'animated-arrow': browserName === 'firefox' }")
                            i.fab.fa-opera(:class="{ 'animated-arrow': browserName === 'opera' }")
                            i.fab.fa-internet-explorer(:class="{ 'animated-arrow': browserName === 'msie' }")
</template>
<script>
    export default {
        name: "Scroll",
        data () {
            return {
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
            this.operatingSystemName();
            this.browserSystemName();
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