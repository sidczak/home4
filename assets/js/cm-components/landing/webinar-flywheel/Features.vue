<template>
    <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ heading }}</h2>
                    <div class="row">
                        <div class="col-md-3" v-for="(item, index) in items">
                            <div class="feature">
                                <div class="feature-tile" @click="open(item)">
                                    {{ item.title }}
                                </div>
                                <div class="feature--info" :class="{ 'show': item.isOpen }">
                                    {{ item.desc }}
                                    <div class="btn-close" @click='close(item)'>Close</div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Features",
        data () {
            return {
                heading: "Features",
                items: [{
                    title: 'Competition law',
                    desc: 'Schärer Attorneys at Schärer Attorneys at Schärer Attorneys at Schärer Attorneys at Schärer Attorneys at',
                    isOpen: false
                }, {
                    title: 'Constitutional, community and administrative law',
                    desc: 'Civil law reg',
                    isOpen: false
                },
                {
                    title: 'Construction, planning and environmental law',
                    desc: 'Our speci',
                    isOpen: false
                }]
            }
        },
        methods:{
            open: function(item){
                this.closeAll();
                item.isOpen = true
            },
            close: function(item){
                item.isOpen = false
            },
            closeAll: function() {
                for(var item in this.items) {
                    this.items[item].isOpen = false
                }
            }
        }
    };
</script>

<style lang="scss" scoped>
.features {
    border: 1px solid red;
}
.feature {
    border: 1px solid orange;
    width: 100%;
    height: 300px;
    display: inline-block;
    position: relative;
    &-tile {
        border: 1px solid red;
        width: 100%;
        height: 100%;
    }
    &--info {
        height: 0;
        width: 0;
        background-color: orange;
        transition: all 0.5s ease;
        position: absolute;
        top: 0;
        left: 0;
        overflow: hidden;
        z-index: 1;
        &.show {
            width: 150%;
            height: 150%;
        }
        .btn-close {
            border: 1px solid red;
            &:hover {
                background: red;
            }
        }
    }
}
</style>