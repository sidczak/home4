<template>
    <div class="e-book">
        <div class="container">
            <div class="e-book__ring">
                <div class="col text-center">
                    <h4 class="e-book__title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h4>
                    <p class="e-book__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus. Donec venenatis, turpis vel hendrerit interdum, dui ligula ultricies purus, sed posuere libero dui id orci. Nam congue, pede vitae dapibus aliquet, elit magna vulputate arcu, vel tempus metus leo non est. </p>
                    <button class="btn btn-primary text-uppercase">Download e-book</button>
                </div>
                <div class="e-book__book" :style="{ color: activeColor, bottom: (scrolled*.15) + 'px' }"></div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            activeColor: 'red',
            scrolled: 0
        }
    },
    methods: {
        handleScroll () {
            this.scrolled = -1500 + window.scrollY;
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
.e-book {
    border: 1px solid red;
    padding: 80px 0;

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
        background: url('http://lorempixel.com/g/1500/1000/nature/10/');
        background-attachment: fixed;
        background-size: cover;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        border: 1px solid red;
        width: 700px;
        height: 700px;
        margin: auto;
        padding: 50px 100px;
        border-radius: 50%;
        position: relative;
        overflow: hidden;
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
}
</style>
