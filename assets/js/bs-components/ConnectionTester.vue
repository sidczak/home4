<template lang="pug">
    .section-min-vh-100.flex-shrink-0.bg-light
        section.d-flex.align-items-center.section-py-80.section-min-vh-100
            b-container
                b-row.text-center(v-for="n in 1" :key="n.id")
                    b-col
                        h3 {{ osName }} {{ browserName }}:
                        h4.browser(:class="browserName")
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
.browser {
    font-size: 3rem;
    i {
        width: 50px;
        height: 50px;
        margin: 25px 10px;
        position: relative;
        &:after {
            content: '';
            position: absolute;
            width: 70%;
            height: 8px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            box-shadow: 0 35px 8px 0 rgba(34, 34, 34, 0.4);
        }
        // &.animated-arrow {
        //     animation: hover 1s linear infinite alternate;
        // }
        &.animated-arrow:after {
            animation: animatedShadow 1s linear infinite alternate;
            // animation-name: animatedShadow;
            // animation-duration: 1s;
            // animation-timing-function: linear;
            // animation-iteration-count: infinite;
            // animation-direction: alternate;
        }
    }
}
@keyframes animatedShadow {
    from {
        box-shadow: 0 35px 8px 0 rgba(34, 34, 34, 0.4);
        width: 70%;
        top: 50%;
    }
    to {
        box-shadow: 0 33px 8px 0 rgba(34, 34, 34, .2);
        width: 60%;
        top: 75%;
    }
}
// @keyframes hover {
//   from {
//     top: 0;
//     transform: scaleX(1) scaleY(1);
//   }
//   to {
//     top: -12px;
//     transform: scaleX(.9) scaleY(1.05);
//   }
// }
</style>