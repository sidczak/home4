<template lang="pug">
    div.hamburger(@click="toggle" :class="[hamburgerBg ? 'hamburger-bg-' + hamburgerBg : '', 'hamburger-' + option, { 'open': isOpen }]")
        span
        span
        span
        span(v-if="['option2', 'option3'].includes(option)")
        span(v-if="option === 'option2'")
        span(v-if="option === 'option2'")
</template>

<script>
export default {
    name: "Hamburger",
    props: {
        hamburgerBg: {
            type: String,
            default: '',
            validator: (value) => ['turquoise', 'white'].indexOf(value) > -1,
        },
        option: {
            type: String,
            default: 'option3',
            validator: (value) => ['option1', 'option2','option3', 'option4'].indexOf(value) > -1,
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
.navbar-dark {
    .hamburger {
        span {
            background-color: #7c7c7c;
        }
        &:hover span {
            background-color: #dddddd;
        }
    }
}
.navbar-light {
    .hamburger {
        span {
            background-color: #8e8e8e;
        }
        &:hover span {
            background-color: #424242;
        }
    }
}
@media (min-width: 992px) {
    .navbar-expand-lg .hamburger {
        display: none;
    }
}
.hamburger {
    width: 52px;
    height: 40px;
    position: relative;
    margin: auto;
    transform: rotate(0deg);
    transition: .5s ease-in-out;
    cursor: pointer;
    &-bg-turquoise span{
        background-color: $turquoise !important;
    }
    &-bg-white span{
        background-color: $white !important;
    }
    span {
        background-color: $turquoise;
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
    &-option2 {
        span {
            width: 50%;
            &:nth-child(even) {
                left: 50%;
                border-radius: 0 9px 9px 0;
            }
            &:nth-child(odd) {
                left:0px;
                border-radius: 9px 0 0 9px;
            }
            &:nth-child(1),
            &:nth-child(2) {top: 0px;}
            &:nth-child(3),
            &:nth-child(4) {top: 15px;}
            &:nth-child(5),
            &:nth-child(6) {top: 30px;}
        }
        &.open {
            span {
                &:nth-child(1),
                &:nth-child(6) {
                    transform: rotate(45deg);
                }
                &:nth-child(2),
                &:nth-child(5) {
                    transform: rotate(-45deg);
                }
                &:nth-child(1) {
                    left: 5px;
                    top: 7px;
                }
                &:nth-child(2) {
                    left: calc(50% - 5px);
                    top: 7px;
                }
                &:nth-child(3) {
                    left: -50%;
                    opacity: 0;
                }
                &:nth-child(4) {
                    left: 100%;
                    opacity: 0;
                }
                &:nth-child(5) {
                    left: 5px;
                    top: 24px;
                }
                &:nth-child(6) {
                    left: calc(50% - 5px);
                    top: 24px;
                }
            }
        }
    }
    &-option3 {
        span {
            &:nth-child(1) {
                top: 0px;
            }
            &:nth-child(2),
            &:nth-child(3) {
                top: 15px;
            }
            &:nth-child(4) {
                top: 30px;
            }
        }
        &.open {
            span {
                &:nth-child(1) {
                    top: 18px;
                    width: 0%;
                    left: 50%;
                }
                &:nth-child(2) {
                    transform: rotate(45deg);
                }
                &:nth-child(3) {
                    transform: rotate(-45deg);
                }
                &:nth-child(4) {
                    top: 18px;
                    width: 0%;
                    left: 50%;
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
</style>
