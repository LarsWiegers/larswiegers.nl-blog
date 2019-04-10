<template>
  <div id="search" class="search-wrapper" v-show="ifKeyComboPressed">
    <div class="background"></div>
    <div class="foreground">
      <div class="modal">
        <input ref="search" type="text" v-model="search" autofocus>
        <ul class="result-container">
          <li class="result" v-for="(item,index) in foundRoutes" v-if="index <= 5">
            <div class="route" v-if="item.type === 'route'">
              <a :href="item.url">{{item.url}}</a>
            </div>
        </li>
        </ul>
      </div>
    </div>
  </div>

</template>
<style lang="scss">
  .search-wrapper, .background, .foreground {
    position:fixed;
    top:0;
    right: 0;
    left: 0;
    bottom: 0;
    .background {
      background-color: rgba(0,0,0,0.9);
      height: 100%;
      z-index: 2;
    }
    .foreground {
      display: flex;
      justify-content:center;
      align-items: center;
      height: 100%;
      z-index: 3;
      input {
        background-color: transparent;
        border: none;
        border-bottom: 2px solid #65a0ef;
        min-width: 45vw;
        min-height: 2vw;
        color: white;
        width: 100%;
      }
      .fa {
        color: white;
        position: relative;
        left: -25px;
      }
    }
  }
  .result {
    color: black;
    background-color: white;
    a {
      width: 100%;
      display: block;
    }
  }
  .modal {
    position: relative;
  }
  .result-container {
    position: absolute;
    width: 100%;
    height: 100%;
  }
</style>
<script>
  export default {
    data() {
      return {
        search: null,
        firstStepDone: false,
        ifKeyComboPressed: false,
        foundRoutes: []
      }
    },
    methods: {
      show() {
        this.ifKeyComboPressed = true;
      }
    },
    mounted() {
      let self = this;
      document.addEventListener("keydown", function (event) {
        if (event.key === "Control") {
          self.firstStepDone = true;
        } else if (event.key === "Enter" && self.firstStepDone) {
          self.ifKeyComboPressed = true;

        } else if (event.key === "Escape") {
          self.firstStepDone = false;
          self.ifKeyComboPressed = false;
        }else if (event.key === "Space") {
          console.log(document.activeElement.click());
        }else if(event.key !== "Tab") {
          self.$refs.search.focus();
        }
      })
    },
    watch: {
      search: function (val, oldval) {
        this.foundRoutes = [];
        let self = this;
        if(this.search === '') {
          return;
        }
        fetch('/backend/search/' + this.search + '/').then((result) => {
          result.text().then((result) => {
            let jsonResult = JSON.parse(result);
            for (let i = 0; i < jsonResult.length; i++) {
              let obj = jsonResult[i];
              if (obj.type === 'route') {
                self.foundRoutes.push(obj);
              }
            }
          })
        })
      }
    }
  }
</script>
