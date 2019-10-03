<template lang="pug">
    .resize-x.section-min-h-100.flex-shrink-0
        .resize.section-py-80.section-min-h-100
            b-container
                b-row.text-center(v-for="n in 5" :key="n.id")
                    b-col
                        h1.mb-0 Your Window:<br/> Width: 
        .resize.section-min-h-100
        //- .d-flex.section-py-80.section-min-h-100(style="border: 2px solid orange;")
        //- .green
        //- .orange
        //-     h2(:class="{'bounceInLeft': scrolled}"  v-on="handleScroll" class="animated") {{scrolled}}
        //- .purple(:class="{boom: scrolled}")
        //-     h2(:class="{'bounceInLeft': scrolled}"  v-on="handleScroll" class="animated") {{scrolled}}
</template>
<script>
    export default {
        name: "Scroll",
        data () {
            return {
                scrolled: false
            }
        },
        created() {
            window.addEventListener('scroll', this.handleScroll);
        },
        destroyed() {
            window.removeEventListener('scroll', this.handleScroll);
        },
        methods: {
            handleScroll() {
              let obj = document.querySelector('h2');
              let {top,bottom} = obj.getBoundingClientRect();
              let height = document.documentElement.clientHeight;
              this.scrolled = top < height && bottom >0;
              
              // this.scrolled = window.scrollY > 100;
            }
        }
    };
</script>
<style lang="scss" scoped>
.resize {
    border: 1px solid red;
}
// div {
//   // width: 100%;
//   // height: 100%;
//   transition: all 1s;
// }

// .green {
//   background: green;
// }
// .orange {
//   background: orange;
// }
// .purple {
//   background: purple;
// }

// .boom {
//   background-color: red;
// }

// h2 {
//   display: inline-block;
// }
</style>