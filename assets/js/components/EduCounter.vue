<template>
    <div>
        <form action="#">
            <div class="form-group row">
                <div class="col-2">
                    <label class="form-label">Wybierz wartość startową:</label>
                </div>
                <div class="col">
                    <select class="form-control" v-model="initValue" :disabled="inProgress">
                        <option v-for="i in 10" :value="i">{{ i }}</option>
                    </select>
                </div>
            </div>
        </form>
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <div class="alert alert-primary" v-show="!inProgress">Naciśnij <strong>Start</strong> aby rozpocząć odliczanie.</div>
                <h4>{{ counter }}</h4>
                <button class="btn btn-primary btn-counter" @click="start" :disabled="inProgress">
                    <svg title="Camera" role="img" class="svg-fill align-baseline">
                        <use xlink:href="../../static/svg/icon.svg#camera"></use>
                    </svg>
                    Start
                </button>
            </div>
        </div>
        <div class="row justify-content-center"></div>
    </div>
</template>
<script>
    export default {
        name: "EduCounter",
        //props: ["initValue"],
        props: {
            initValue: {
                type: Number,
                default: 10
            }
        },
        data: function() {
            return {
                counter: this.initValue,
                inProgress: false
            };
        },
        watch: {
            initValue: function(newValue) {
                this.counter = newValue;
            }
        },
        methods: {
            start: function() {
                this.inProgress = true;
                this.countdown();
            },
            countdown: function() {

                this.counter--;

                if(this.counter > 0) {
                    setTimeout(this.countdown, 1000);
                } else {
                    setTimeout(() => {
                        this.counter = this.initValue;
                        this.inProgress = false;
                    }, 1000);
                }

            }
        }
    };
</script>
<style lang="scss" scoped>
    @import "~sass-rem";
    $rem-fallback: true;
    .btn {
        &-counter {
            font-size: 24px;
            //padding: rem(6px 30px);
            @include rem(padding, 6px 30px);

            svg {
                width: 20px;
                height: 20px;
            }
        }
    }
</style>