<template lang="pug">
button.btn.btn-turquoise.btn-pill.btn-lg(ref="ripple" @click="animateRipple")
    | {{text}}
    transition-group
        span.ripple(
            :ref="'ripple-' + i"
            :key="'ripple' + i"
            v-for="(val, i) in ripples"
            v-if="val.show === true"
            :style="{'top': val.y + 'px', 'left': val.x + 'px'}"
            @animationend="rippleEnd(i)")
</template>

<script>
export default {
    name: "Clock",
    props: {
        text: {
            type: String,
            default: null
        }
    },
    data: function() {
        return {
            ripples: []
        };
    },
    methods: {
        animateRipple: function(e) {
            let el  = this.$refs.ripple;
            let pos = el.getBoundingClientRect();
            
            this.ripples.push({
                x: e.clientX - pos.left,
                y: e.clientY - pos.top,
                show: true
            });
        },
        rippleEnd: function(i) {
            this.ripples[i].show = false;
        }        
    }
};
</script>

<style lang="scss" scoped>
.btn {
    position: relative;
    overflow: hidden;
    border-color: transparent;
}
.ripple {
    position: absolute;
    background: #fff;
    transform: translate(-50%, -50%);
    pointer-events: none;
    border-radius: 50%;
    animation: ripples 0.6s linear forwards;
}
@keyframes ripples {
    0% {
        width: 0;
        height: 0;
        opacity: 0.5;
    }
    100% {
        width: 500px;
        height: 500px;
        opacity: 0;
    }
}

// $shocking-pink: #ff1ead;
// .ripple {
//     background-color: $shocking-pink;
//     width: 1rem;
//     height: 1rem;
//     position: absolute;
//     border-radius: 50%;
//     transform: translateX(-100%) translateY(-100%);
//     mix-blend-mode: screen;
//     animation: ripple 1250ms ease-out forwards, fade 1500ms ease-out forwards;
// }

// @keyframes ripple {
//     0%   { transform: translate(-100%, -100%); }
//     80%  { transform: translate(-100%, -100%) scale(50); }
//     100% { transform: translate(-100%, -100%) scale(50); opacity: 0; }
// }

// @keyframes fade {
//     0%   { opacity: 1; }
//     100% { opacity: 0; }
// }
</style>
