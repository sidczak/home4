<template lang="pug">
    .resize-x.section-min-h-100.flex-shrink-0
        .resize.section-py-80.section-min-h-100
            b-container
                b-row.text-center.text-white(v-for="n in 5" :key="n.id")
                    b-col
                        h1.mb-0 Screen 1 
                            | - https://mycolor.space
                b-row.text-center.text-white
                    b-col
                        #element.box
                            | Box {{ box.width }} x {{ box.height }}
        .resize2.section-min-h-100
            b-container
                b-row.text-center.text-white
                    b-col
                        h1.mb-0 Screen 2
        .orange.section-min-h-100
            h2.xxx(:class="{'bounceInLeft': scrolled}" class="animated") {{scrolled}}
        .purple.section-min-h-100(:class="{boom: scrolled}")
            h2(:class="{'bounceInLeft': scrolled}" class="animated") {{scrolled}}
</template>
<script>
    export default {
        name: "Scroll",
        data () {
            return {
                scrolled: false,
                box: {
                    width: 0,
                    height: 0
                }
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
                let obj = document.querySelector('.xxx');
                let {top,bottom} = obj.getBoundingClientRect();
                let height = document.documentElement.clientHeight;
                this.scrolled = top < height && bottom > 0;
                // console.log(this.scrolled + '=' + top + '<' + height + '&&' + bottom + '>' + 0);

                // const box = document.querySelector('.xxx');
                // const scrollStart = box.offsetTop
                // console.log(window.scrollY + ' - ' + box.offsetTop)


              
                // this.scrolled = window.scrollY > 100;

                // const box = this.$el
                // const scrollStart = box.offsetTop
                // this.scrolled = window.scrollY - scrollStart

                // const box = this.$el
                // const scrollStart = box.offsetTop - 200
                // if (scrollStart <= window.scrollY) {
                //     this.$refs.countStatistics.forEach((cnt) => cnt.start())
                //     window.removeEventListener('scroll', this.handleScroll)
                // }
                
                // let el = document.getElementById('element');
                // let el = document.querySelector('.box');
                // this.box.width = el.offsetWidth;
                // this.box.height = el.offsetHeight;

                let el = document.querySelector('.box');
                this.box.width = el.clientWidth;
                this.box.height = el.clientHeight;
            }
        }
    };
</script>
<style lang="scss" scoped>
.resize {
    background-image: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
    border: 1px solid red;
}
.resize2 {
    background-image: linear-gradient(to right bottom, #051937, #004d7a, #008793, #00bf72, #a8eb12);
}
.orange {
  background: orange;
}
.purple {
  background: purple;
}
.boom {
  background-color: red;
}
.box {
    background: red;
    border: 10px solid blue;
    margin: 20px;
    padding: 30px;
}
</style>