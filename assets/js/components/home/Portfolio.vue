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
                        li.nav-item.m-1
                            a.btn.btn-pill.btn-sm.px-3.btn-white(href="#" @click="filter('Vue')") Vue
            b-row
                b-col.col-lg-12
                    transition-group.justify-content-center(name="list-slide" tag="b-row")
                        b-col.list-slide-item(v-for="(item, index) in filteredItems" :key="item.id" lg="3" md="4" sm="6")
                            b-card.shadow-clouds-sm.border-0.mb-4(no-body :img-src="require('../../../images/covers/'+ item.id +'.jpg')")
                            //- b-card.shadow-clouds-sm.border-0.mb-4(no-body :img-src="require('../../../../public/images/portfolio/'+ item.id +'.jpg')")
                            //- b-card.text-center.shadow-clouds-sm.border-0.mb-4(:class="item.bg ? 'bg-'+ item.bg +'-concave-145 text-white' : 'bg-clouds-concave-145'")
                                i.fab.fa-fw.fa-2x(:class="'fa-' + icon(item.bg)")
</template>

<script>
var _ = require('lodash');
export default {
    name: "TransitionsGroup",
    data () {
        return {
            items: [
                { id: 1, bg: 'turquoise', tags: ['all', 'Photography', 'Marketing', 'Vue'] },
                { id: 2, bg: 'turquoise', tags: ['all', 'Identity', 'Vue'] },
                { id: 3, tags: ['all', 'Identity'] },
                { id: 4, bg: 'wet-asphalt', tags: ['all', 'Photography', 'Identity', 'Marketing', 'Webdesign'] },
                { id: 5, tags: ['all', 'Photography'] },
                { id: 6, tags: ['all', 'Identity'] },
                { id: 7, tags: ['all', 'Marketing'] },
                { id: 8, bg: 'amethyst', tags: ['all', 'Webdesign'] },
                // { id: 9, tags: ['all', 'Webdesign'] },
                // { id: 10, tags: ['all', 'Webdesign'] },
                // { id: 11, tags: ['all', 'Webdesign'] },
                // { id: 12, tags: ['all', 'Webdesign'] }
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
        },
        icon: function(bg) {
            switch (bg) {
                case 'turquoise': return 'vuejs'
                case 'wet-asphalt': return 'symfony'
                case 'amethyst': return 'bootstrap'
                default: return 'telegram-plane'
            }
        }
    }
};
</script>

<style lang="scss" scoped>
@import '../../../css/variables/color.scss';

.list-slide {
    &-item {
        transition: all 1s;
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
    &-enter {
        transform: translateY(-30px);
    }
    &-leave-to {
        transform: translateY(30px);
    }
    &-leave-active {
        position: absolute;
    }
}
</style>
