<template>
    <div id="app">
        <div class="green"></div>
        <div class="orange">
            <h2 :class="{'bounceInLeft': scrolled}"  v-on="handleScroll" class="animated">{{scrolled}}</h2>
        </div>
        <div class="purple" :class="{boom: scrolled}">
        <h2 :class="{'bounceInLeft': scrolled}"  v-on="handleScroll" class="animated">{{scrolled}}</h2></div>
    </div>
</template>
<script>
    export default {
        name: "Scroll",
        props: {
            myprop: String, 
            index: {
                type: Number,
                default: 0
            }
        },
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
* {
  box-sizing: border-box;
}

#app div {
/*   padding-top: 50vh;
  border: 10px solid black; */
  width: 100%;
  height: 100vh;
  transition: all 1s;
}

.green {
  background: green;
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

h2 {
  display: inline-block;
}
</style>