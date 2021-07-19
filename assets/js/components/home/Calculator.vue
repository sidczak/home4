<template lang="pug">
    .calculator
        .display {{ display }}
        h1.brand {{ appTitle }}
        .keyboard 
          .panel-a
            .top-buttons
              button(class="btn primary" @click="clear") 
                span C  
              button.btn(@click="setNumber('.')")
                span .
            .numbers
              - for(var i = 9; i >= 0; i--)
                button.btn(@click="setNumber('" + i + "')")
                  span= i
          .panel-b
            button.btn(@click="operator= '+'") 
              span +
            button.btn(@click="operator= '-'") 
              span -
            button.btn(@click="operator= '*'") 
              span *
            button.btn(@click="operator= '/'") 
              span /

            button(class="btn primary" @click="calculate") 
              span =
</template>

<script>
export default {
    name: "Calculator",
    data: function() {
        return {
            appTitle: 'Vue Calculator',
            a: '',
            b: '',
            tot: 0,
            display: 0,
            operator: null
        };
    },
    methods: {
        setNumber(num) {
            if (this.operator === null) {
                this.a += num;
                this.display = this.a;
            } else {
                this.b += num;
                this.display = this.b;
            }
        },
        calculate() {
            switch (this.operator) {
                case '+':
                    this.tot = parseFloat(this.a) + parseFloat(this.b);
                    break;
                case '-':
                    this.tot = parseFloat(this.a) - parseFloat(this.b);
                    break;
                case '*':
                    this.tot = parseFloat(this.a) * parseFloat(this.b);
                    break;
                case '/':
                    this.tot = parseFloat(this.a) / parseFloat(this.b);
                    break;
            }

            this.display = this.tot;
            this.a = '' + this.tot + ''; 
            this.b = '';
            this.operator = null;
        },
        clear() {
            this.a = '';
            this.b = '';
            this.tot = 0;
            this.display = 0;
            this.operator = null;
        }
    }
};
</script>

<style lang="scss" scoped>
$white: #fff;
$black: #000;
$calc-col: #eee;
$btn-col: #333;
$primary-btn: dodgerblue;

.calculator {
  background: $black;
  width: 30rem;
  max-width: 100%;
  margin: 3rem auto;
  padding: .3rem;
  .display{
    height: 4rem;
    line-height: 4rem;
    margin: 0 .3rem;
    padding: 0 0;
    text-align: right;
    font-size: 1.5em;
    color: $white;
    border-bottom: 1px solid rgba($white, .15);
  }
  .brand{
    margin: .6rem 0 0.3rem;
    padding: 0 .3rem;
    text-align: right;
    font-size: .65em;
    color: rgba($white, .85);
  }
  .keyboard{
    display: flex;
    flex-wrap: wrap;
    .btn{
      margin: 0;
      padding: 0;
      height: 4.6rem;
      line-height: 4rem;
      text-align: center;
      font-family: inherit;
      font-size: 1.25em;
      border: none;
      background: transparent;
      outline: none;
      &:hover{
        span{
          background: lighten($btn-col, 10%);
        }
      }
      span{
        display: block;
        margin: .3rem;
        color: $white;
        background: $btn-col;
        border-radius: 3px;
        transition: background-color .4s;
      }
      &.primary{
        &:hover {
          span{
            background: lighten($primary-btn, 15%);
          }
        }
        span{
          background: $primary-btn;
        }
      }
    }
    .panel-a{ 
      width: 75%;
      .top-buttons{
        .btn{
          width: 33.3%;
          &:last-of-type{
            float: right;
          }
          span{
            font-weight: bold;
          }
        }
      }
      .numbers{
        display: flex;
        flex-wrap: wrap;
        flex-direction: row-reverse;
        align-items: flex-end;
        align-content: flex-end;
        .btn{
          width: 33.3%;
          &:nth-child(10){
            width: 100%;
          }
        }
      }
    }
    .panel-b{
      display: flex;
      flex-direction: column;
      width: 25%;
      .btn{
        width: 100%;
        span{
          font-weight: bold;
        }
      }
    }
  }
}
</style>
