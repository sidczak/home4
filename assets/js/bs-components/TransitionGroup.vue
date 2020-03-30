<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            b-row.section-min-h-100
                b-col.col-lg-12.d-flex.justify-content-center.align-items-center
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
                                    b-button(v-if="fade" size="lg" variant="emerald" class="mx-2" pill key="save" @click="fade = !fade")
                                        | Fade
                                    b-button(v-else size="lg" variant="turquoise" class="mx-2" pill key="edit" @click="fade = !fade")
                                        | Edit
                        b-row
                            b-col.text-center
                                h3 Transition Group
                                b-button(size="lg" variant="emerald" class="mx-2" pill @click="add")
                                    | Add
                                b-button(size="lg" variant="turquoise" class="mx-2" pill @click="remove")
                                    | Remove
                                transition-group(name="list" tag="ul" class="pagination")
                                    li.page-link(v-for="item in items" :key="item")
                                        | {{ item }} 
</template>

<script>
export default {
    name: "TransitionsGroup",
    data () {
        return {
            fade: true,
            items: [1,2,3],
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
        }
    }
};
</script>

<style lang="scss">
@import '../../css/variables/color.scss';
.btn {
    width: 200px;
}
.list {
    &-enter-active,
    &-leave-active {
        transition: all 1s;
    }
    &-enter, 
    &-leave-to {
      opacity: 0;
      transform: translateY(30px);
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
    &-leave-active {
        transform: translateX(-200px);
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
        position: absolute;
    }
    &-leave-active {
        transform: translateX(-200px);
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
}
</style>
