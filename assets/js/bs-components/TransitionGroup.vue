<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            b-row.section-min-h-100
                b-col.col-lg-12.d-flex.justify-content-center
                    div
                        b-row
                            b-col.text-center
                                h3 Fade
                                transition(name="fade")
                                    b-button(v-if="fade" size="lg" variant="emerald" class="mx-2" pill key="save" @click="fade = !fade")
                                        | Fade
                                    b-button(v-else size="lg" variant="turquoise" class="mx-2" pill key="edit" @click="fade = !fade")
                                        | Edit
                        b-row
                            b-col.text-center
                                h3 Fade
                                transition(name="fadex" mode="in-out")
                                    b-button(v-if="fade" size="lg" variant="emerald" pill key="save" @click="fade = !fade")
                                        | Fade
                                    b-button(v-else size="lg" variant="turquoise" pill key="edit" @click="fade = !fade")
                                        | Edit
                        b-row
                            b-col.text-center
                                h3 Transition Group
                                b-button(size="lg" variant="emerald" class="mx-2" pill @click="add")
                                    | Add
                                b-button(size="lg" variant="turquoise" class="mx-2" pill @click="remove")
                                    | Remove
                                b-button(size="lg" variant="turquoise" class="mx-2" pill @click="shuffle")
                                    | Shuffle
                                transition-group(name="list-slide" tag="p")
                                    span.list-slide-item(v-for="item in items" :key="item")
                                        | {{ item }}
                        b-row
                            b-col.text-center
                                h3 Transition Group
                                b-button(size="lg" variant="emerald" class="mx-2" pill @click="add")
                                    | Add
                                b-button(size="lg" variant="turquoise" class="mx-2" pill @click="remove")
                                    | Remove
                                b-button(size="lg" variant="turquoise" class="mx-2" pill @click="shuffle")
                                    | Shuffle
                                transition-group(name="list-fade" tag="ul")
                                    li.list-fade-item(v-for="item in items" :key="item")
                                        | {{ item }}
</template>

<script>
var _ = require('lodash');
export default {
    name: "TransitionsGroup",
    data () {
        return {
            fade: true,
            items: [1,2,3,4,5,6,7,8,9],
            nextNum: 10
        }
    },
    methods: {
        randomIndex: function () {
            return Math.floor(Math.random() * this.items.length)
        },
        add: function () {
            this.items.splice(this.randomIndex(), 0, this.nextNum++)
        },
        remove: function () {
            this.items.splice(this.randomIndex(), 1)
        },
        shuffle: function () {
            this.items = _.shuffle(this.items)
        }
    }
};
</script>

<style lang="scss" scoped>
@import '../../css/variables/color.scss';
.btn {
    width: 200px;
}
.list-slide {
    &-item {
        transition: all 1s;
        display: inline-block;
        background-color: $midnight-blue;
        border-radius: 5px;
        padding: 2px 5px;
        min-width: 40px;
        margin: 10px;
        color: #fff;
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
    &-enter {
        transform: translateY(-30px);
    }
    &-leave-to {
        // transform: translateY(30px);
        transform: translate(calc(-50% - 10px), 30px);
    }
    &-leave-active {
        position: absolute;
        // transform: translate(-50%, 30px);
    }
}
.list-fade {
    &-item {
        border: 1px solid red;
        width: 30px;
    }
    &-enter-active,
    &-leave-active {
        transition: opacity 1s;
    }
    &-leave-active {
        position: absolute;
    }
    &-move {
        transition: transform 1s;
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
}
.fade {
    &-leave-active,
    &-enter-active {
        transition: all .5s ease-in-out;
    }
    &-enter {
        transform: translateX(200px);
    }
    &-leave-to {
        // transform: translateX(-200px); // nie będzie przerwy
    }
    &-leave-active {
        transform: translateX(-200px); // będzie parę px przerwy
        position: absolute;
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
}
.fadex {
    &-leave-active,
    &-enter-active {
        transition: all .5s ease-in-out;
        position: absolute;
    }
    &-enter {
        transform: translateX(200px);
    }
    &-enter-active {
        left: 50%;
        margin-left: -100px;
    }
    &-leave-active {
        z-index: -1;
    }
    &-leave-to {
        transform: translateX(-200px);
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
}
</style>
