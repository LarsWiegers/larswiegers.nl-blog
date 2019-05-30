require('bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));
import AddModal from './AddModal';
import Graph from './Graph';
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#graph-container',
  components: {
    'add-model': AddModal,
    'graph': Graph,
  },
  methods: {
    showAddModal(data) {
      if(data) {
        this.$refs.addModel.show(data.data);
      }else {
        this.$refs.addModel.show();
      }

    },
    save(data) {
      console.log(data);
      this.$refs.graph.addPerson(data);
    }
  }
});

