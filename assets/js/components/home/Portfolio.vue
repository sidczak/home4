<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100.bg-clouds
        b-container
            b-row
                b-col
                    ul.nav.justify-content-center.align-items-center.mb-5
                        li.nav-item.m-1
                            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="#" @click="shuffle") Shuffle
                        li.nav-item.m-1
                            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="#" @click="filter('all')") All
                        li.nav-item.m-1
                            a.btn.btn-pill.btn-sm.px-3.btn-white(href="#" @click="filter('Photography')") Photography
                        li.nav-item.m-1
                            a.btn.btn-pill.btn-sm.px-3.btn-white(href="#" @click="filter('Identity')") Identity
                        li.nav-item.m-1
                            a.btn.btn-pill.btn-sm.px-3.btn-white(href="#" @click="filter('Webdesign')") Webdesign
                        li.nav-item.m-1
                            a.btn.btn-pill.btn-sm.px-3.btn-white(href="#" @click="filter('Marketing')") Marketing
            b-row
                b-col.col-lg-12
                    transition-group.card-columns(name="list-slide" tag="div")
                        b-card(v-for="(item, index) in filteredItems" :key="item" no-body :img-src="require('../../../images/covers/'+ item.id +'.jpg')")
                            //- | {{ item.id }}
                            //- b-img(:src="require('../../../images/covers/'+ item.id +'.jpg')" fluid rounded)
</template>

<script>
var _ = require('lodash');
export default {
    name: "TransitionsGroup",
    data () {
        return {
            items: [
                { id: 1, tags: ['all', 'Photography', 'Marketing'] },
                { id: 2, tags: ['all', 'Identity'] },
                { id: 3, tags: ['all', 'Identity'] },
                { id: 4, tags: ['all', 'Photography', 'Identity', 'Marketing', 'Webdesign'] },
                { id: 5, tags: ['all', 'Photography'] },
                { id: 6, tags: ['all', 'Identity'] },
                { id: 7, tags: ['all', 'Marketing'] },
                { id: 8, tags: ['all', 'Webdesign'] },
                { id: 9, tags: ['all', 'Webdesign'] }
            ],
            currentTag: 'all',
        }
    },
    computed: {
        filteredItems: function() {
            var filter = this.currentTag;
            return this.items.filter(function(item) {
                return item.tags.indexOf(filter) !== -1;
            });
        }
    },
    methods: {
        shuffle: function () {
            this.items = _.shuffle(this.items)
        },
        filter: function(tag) {
            this.currentTag = tag;
        }
    }
};
</script>

<style lang="scss" scoped>
@import '../../../css/variables/color.scss';
.card {
    transition: all 1s;
}
.list-slide {
    &-enter,
    &-leave-to {
        opacity: 0;
    }
    &-enter {
        transform: translateY(-30px);
    }
    &-leave-to {
        transform: translate(calc(-50% - 10px), 30px);
    }
    &-leave-active {
        position: absolute;
    }
}
</style>
