<template>
    <section class="section-py-80 flex-shrink-0">
        <div class="card">
            <div class="progress-bar">
                <div class="filled-bar" :style="{ transform: `translate3d(-${(1 - progress) * 100}%, 0, 0)` }"></div>
                <span class="text">
                    Progress: {{ percentageText }}
                </span>
            </div>
            <div class="text-section" ref="text" @scroll="onScroll">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate architecto voluptatum, laboriosam quisquam quod minus molestias. Rem ut quidem, corrupti nihil molestiae deserunt, iusto velit unde atque mollitia, eum ad maiores exercitationem. Soluta harum sit cupiditate eos, commodi itaque nihil, beatae dolorem ducimus, repudiandae, vero quo corporis sed laborum at maxime dicta dolores perferendis! Possimus repellat velit iste quod recusandae suscipit vitae ex soluta nostrum animi saepe eius itaque, voluptas, sapiente minima quo culpa explicabo necessitatibus distinctio. Veritatis amet tempora, consectetur molestias optio eveniet laudantium, tenetur aspernatur nobis ratione sit hic in impedit quod deserunt recusandae atque, ipsam molestiae sequi!
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "ScrollProgress",
        data () {
            return {
                progress: 0
            }
        },
        computed: {
            percentageText () {
                return `${Math.round(this.progress * 100)}%`
            }
        },
        methods: {
            onScroll () {
                const progress = this.$refs.text.scrollTop / (this.$refs.text.scrollHeight - this.$refs.text.clientHeight)
                if (progress > 1) {
                    this.progress = 1
                } else if (progress < 0) {
                    this.progress = 0
                } else {
                    this.progress = progress
                }
            }
        }
    };
</script>

<style lang="scss" scoped>
section {
  background: #6B5CA5;
}

.card {
  border-radius: 3px;
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  line-height: 1.5;
  font-size: 18px;
  color: #444;
  width: 300px;
  margin: 10px auto;
  height: 150px;
  margin-top: 10px;
  display: flex;
  flex-direction: column;
  background: #FFFFFF;
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
}

.text-section {
  height: 100%;
  max-height: 100%;
  padding: 0 10px 10px;
  overflow: scroll;
  -webkit-overflow-scrolling: touch;
}

.progress-bar {
  height: 30px;
  width: 100%;
  border-bottom: 1px solid #f0f0f0;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  overflow: hidden;
  border-radius: 3px 3px 0 0;
}

.text {
  font-size: 14px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate3d(-50%, -50%, 0);
  z-index: 2;
}

.filled-bar {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  transform: translate3d(-100%, 0, 0);
  background: #eef0ff;
  z-index: 2;
}
</style>