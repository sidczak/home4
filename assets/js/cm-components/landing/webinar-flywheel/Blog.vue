<template>
    <div class="container">
        <swiper :options="swiperOptionC" ref="mySwiperC">
            <swiper-slide>Slide 1</swiper-slide>
            <swiper-slide>Slide 2</swiper-slide>
            <swiper-slide>Slide 3</swiper-slide>
            <div class="swiper-pagination" slot="pagination"></div>
        </swiper>
    </div>
</template>

<script>
import 'swiper/dist/css/swiper.css'
import { swiper, swiperSlide } from 'vue-awesome-swiper'

export default {
    name: "Blog",
    data () {
        return {
            swiperOptionC: {
                slidesPerView: 'auto',
                centeredSlides: true,
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                }
            }
        }
    },
    components: {
        swiper,
        swiperSlide
    },
    computed: {
        // swiperC() {
        //     // return this.$refs.mySwiperC.swiper
        // }
    },
    mounted() {
        // this.swiperC.slideTo(1, 1000, false)
    }
};
</script>
<style>
.swiper-container {
    /*height: 300px;*/
    width: 100%;
    border: 1px solid red;
}
.swiper-slide {
    border: 1px solid orange;
    text-align: center;
    font-size: 38px;
    font-weight: 700;
    background-color: #eee;
    display: flex;
    justify-content: center;
    align-items: center;
}
.swiper-slide {
    width: 80%;
}
</style>