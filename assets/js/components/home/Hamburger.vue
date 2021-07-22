<template lang="pug">
    div.hamburger(@click="toggle" :class="['hamburger-bg-' + hamburgerBg, 'hamburger-' + option, { 'open': isOpen }]")
        span
        span
        span
</template>

<script>
export default {
    name: "Hamburger",
    props: {
        hamburgerBg: {
            type: String,
            default: 'turquoise',
            validator: (value) => ['turquoise', 'white'].indexOf(value) > -1,
        },
        option: {
            type: String,
            default: 'option1',
            validator: (value) => ['option1', 'option4'].indexOf(value) > -1,
        },
    },
    data: function() {
        return {
            isOpen: false,

        };
    },
    methods: {
        toggle() {
            this.isOpen = !this.isOpen;
        }
    }
};
</script>

<style lang="scss" scoped>
@import '../../../css/variables/color.scss';
.hamburger {
    width: 52px;
    height: 40px;
    position: relative;
    margin: auto;
    transform: rotate(0deg);
    transition: .5s ease-in-out;
    cursor: pointer;
    &-bg-turquoise span{
        background-color: $turquoise;
    }
    &-bg-white span{
        background-color: $white;
    }
    span {
        
        display: block;
        position: absolute;
        height: 8px;
        width: 100%;
        border-radius: 9px;
        opacity: 1;
        left: 0;
        transform: rotate(0deg);
        transition: .25s ease-in-out;
    }
    &-option1 {
        span {
            &:nth-child(1) {
                top: 0px;
            }
            &:nth-child(2) {
                top: 15px;
            }
            &:nth-child(3) {
                top: 30px;
            }
        }
        &.open {
            span {
                &:nth-child(1) {
                    top: 15px;
                    transform: rotate(135deg);
                }
                &:nth-child(2) {
                    opacity: 0;
                    left: -60px;
                }
                &:nth-child(3) {
                    top: 15px;
                    transform: rotate(-135deg);
                }
            }
        }
    }
    &-option4 {
        span {
            &:nth-child(1) {
                top: 0px;
                transform-origin: left center;
            }

            &:nth-child(2) {
                top: 15px;
                transform-origin: left center;
            }

            &:nth-child(3) {
                top: 30px;
                transform-origin: left center;
            }
        }
        &.open {
            span {
                &:nth-child(1) {
                    transform: rotate(45deg);
                    top: -3px;
                    left: 8px;
                }

                &:nth-child(2) {
                    width: 0%;
                    opacity: 0;
                }

                &:nth-child(3) {
                    transform: rotate(-45deg);
                    top: 33px;
                    left: 8px;
                }
            }
        }
    }
}


// /* Icon 2 */
// #nav-icon2 span {
//   display: block;
//   position: absolute;
//   height: 9px;
//   width: 50%;
//   background: $turquoise;
//   opacity: 1;
//   transform: rotate(0deg);
//   transition: .25s ease-in-out;
// }

// #nav-icon2 span:nth-child(even) {
//   left: 50%;
//   border-radius: 0 9px 9px 0;
// }

// #nav-icon2 span:nth-child(odd) {
//   left:0px;
//   border-radius: 9px 0 0 9px;
// }

// #nav-icon2 span:nth-child(1), #nav-icon2 span:nth-child(2) {
//   top: 0px;
// }

// #nav-icon2 span:nth-child(3), #nav-icon2 span:nth-child(4) {
//   top: 18px;
// }

// #nav-icon2 span:nth-child(5), #nav-icon2 span:nth-child(6) {
//   top: 36px;
// }

// #nav-icon2.open span:nth-child(1),#nav-icon2.open span:nth-child(6) {
//   transform: rotate(45deg);
// }

// #nav-icon2.open span:nth-child(2),#nav-icon2.open span:nth-child(5) {
//   transform: rotate(-45deg);
// }

// #nav-icon2.open span:nth-child(1) {
//   left: 5px;
//   top: 7px;
// }

// #nav-icon2.open span:nth-child(2) {
//   left: calc(50% - 5px);
//   top: 7px;
// }

// #nav-icon2.open span:nth-child(3) {
//   left: -50%;
//   opacity: 0;
// }

// #nav-icon2.open span:nth-child(4) {
//   left: 100%;
//   opacity: 0;
// }

// #nav-icon2.open span:nth-child(5) {
//   left: 5px;
//   top: 29px;
// }

// #nav-icon2.open span:nth-child(6) {
//   left: calc(50% - 5px);
//   top: 29px;
// }

// /* Icon 3 */
// #nav-icon3 span:nth-child(1) {
//   top: 0px;
// }

// #nav-icon3 span:nth-child(2),#nav-icon3 span:nth-child(3) {
//   top: 18px;
// }

// #nav-icon3 span:nth-child(4) {
//   top: 36px;
// }

// #nav-icon3.open span:nth-child(1) {
//   top: 18px;
//   width: 0%;
//   left: 50%;
// }

// #nav-icon3.open span:nth-child(2) {
//   transform: rotate(45deg);
// }

// #nav-icon3.open span:nth-child(3) {
//   transform: rotate(-45deg);
// }

// #nav-icon3.open span:nth-child(4) {
//   top: 18px;
//   width: 0%;
//   left: 50%;
// }


</style>
