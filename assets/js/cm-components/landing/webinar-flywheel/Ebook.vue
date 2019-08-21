<template>
    <section class="e-book">
        <div class="container">
            <div class="e-book__ring">
                <div class="e-book__waves-6"></div>
                <div class="e-book__waves-5"></div>
                <div class="e-book__waves-4"></div>
                <div class="e-book__waves-3"></div>
                <div class="e-book__waves-2"></div>
                <div class="e-book__waves-1"></div>
                <div class="col text-center">
                    <h4 class="e-book__title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
                    <p class="e-book__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est.</p>
                </div>
                <div class="e-book__book" :style="[scrolled*.15 < 0 ? {bottom: (scrolled*.15) + 'px'} : {bottom: 0}]"></div>
            </div>
            <div class="row text-center mt-5">
                <div class="col-12">
                    <button class="btn btn-e-book text-uppercase">Download e-book</button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

export default {
    data() {
        return {
            scrolled: 0
        }
    },
    methods: {
        handleScroll() {
            const box = this.$el
            const scrollStart = box.offsetTop
            this.scrolled = -1000 + window.scrollY - scrollStart
        }
    },
    created: function () {
        window.addEventListener('scroll', this.handleScroll);
    },
    destroyed: function () {
        window.removeEventListener('scroll', this.handleScroll);
    }

}
</script>

<style lang="scss" scoped>
$wavesBg: rgba(207, 210, 221, .2);
.e-book {
    padding: 320px 0 80px;

    &__title {
        margin-bottom: 60px;
        font-weight: 700;
        font-size: 2.625rem;
        color: #fff;
    }
    &__desc {
        margin-bottom: 40px;
        font-size: 1.125rem;
        color: #fff;
    }
    &__ring {
        background-color: #0e4495;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        width: 700px;
        height: 700px;
        margin: auto;
        padding: 50px 100px;
        border-radius: 50%;
        position: relative;
        overflow: hidden;
        box-shadow: 0px 0px 100px 10px rgba(0,0,0,0.75);
    }
    &__book {
        background: red;
        width: 200px;
        height: 200px;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    &__waves-1,
    &__waves-2,
    &__waves-3,
    &__waves-4,
    &__waves-5,
    &__waves-6 {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 50%;
    }
    &__waves-1 {
        background-color: $wavesBg;
        width: 200px;
        height: 200px;
        bottom: -100px;
    }
    &__waves-2 {
        background-color: lighten($wavesBg, 2%);
        width: 300px;
        height: 300px;
        bottom: -150px;
    }
    &__waves-3 {
        background-color: lighten($wavesBg, 4%);
        width: 400px;
        height: 400px;
        bottom: -200px;
    }
    &__waves-4 {
        background-color: lighten($wavesBg, 6%);
        width: 500px;
        height: 500px;
        bottom: -250px;
    }
    &__waves-5 {
        background-color: lighten($wavesBg, 8%);
        width: 600px;
        height: 600px;
        bottom: -300px;
    }
    &__waves-6 {
        background-color: lighten($wavesBg, 10%);
        width: 700px;
        height: 700px;
        bottom: -350px;
    }
}
</style>
