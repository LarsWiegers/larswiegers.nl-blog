<template>
  <div class="graph-container">
    <div class="top">
      <ul>
        <li>
          <button v-on:click="addNode">Add</button>
        </li>
      </ul>
    </div>
    <div id="cy"></div>
  </div>

</template>
<style lang="scss">
  #cy {
    width: 1000px;
    max-width: 100%;
    height: 700px;
    display: block;
  }
  .top {
    li {
      list-style: none;
    }
    button {
      padding: 8px;
      border: 1px solid #fff;
      border-radius: 5px;
      background-color: transparent;
      color: white;
      text-transform: uppercase;
      cursor: pointer;
    }
  }
</style>
<script>
  import cytoscape from 'cytoscape';
  let graph;
  export default {
    data() {
      return {
      }
    },
    mounted() {
      graph = cytoscape({
        container: document.getElementById('cy'), // container to render in
        elements: [ // list of graph elements to start with
          { // node a
            data: { id: 'a' }
          },
          { // node b
            data: { id: 'b' }
          },
          { // edge ab
            data: { id: 'ab', source: 'a', target: 'b' }
          }
        ],
        style: [ // the stylesheet for the graph
          {
            selector: 'node',
            style: {
              'background-color': '#fff',
              'color': '#fff',
              'label': 'data(id)'
            }
          }, {
            selector: 'edge',
            style: {
              'width': 1,
              'line-color': '#ccc',
              'target-arrow-color': '#ccc',
              'target-arrow-shape': 'triangle'
            }
          }
        ],
        layout: {
          name: 'grid',
          rows: 1
        },
        zoom: 2
      });
      graph.on('tap', 'node', this.onNodeClick);
    },
    methods: {
      onNodeClick(event) {
        this.$emit('onNodeClick', event.target.id)
      },
      addNode() {
        graph.add({
          id: '3'
        })
      }
    }
  }
</script>
