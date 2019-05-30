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
  import edgehandles from 'cytoscape-edgehandles';
  cytoscape.use( edgehandles );

  // the default values of each option are outlined below:
  let defaults = {
    preview: true, // whether to show added edges preview before releasing selection
    hoverDelay: 150, // time spent hovering over a target node before it is considered selected
    handleNodes: 'node', // selector/filter function for whether edges can be made from a given node
    snap: false, // when enabled, the edge can be drawn by just moving close to a target node (can be confusing on compound graphs)
    snapThreshold: 50, // the target node must be less than or equal to this many pixels away from the cursor/finger
    snapFrequency: 15, // the number of times per second (Hz) that snap checks done (lower is less expensive)
    noEdgeEventsInDraw: false, // set events:no to edges during draws, prevents mouseouts on compounds
    disableBrowserGestures: true, // during an edge drawing gesture, disable browser gestures such as two-finger trackpad swipe and pinch-to-zoom
    handlePosition: function( node ){
      return 'middle top'; // sets the position of the handle in the format of "X-AXIS Y-AXIS" such as "left top", "middle top"
    },
    handleInDrawMode: false, // whether to show the handle in draw mode
    edgeType: function( sourceNode, targetNode ){
      // can return 'flat' for flat edges between nodes or 'node' for intermediate node between them
      // returning null/undefined means an edge can't be added between the two nodes
      return 'flat';
    },
    loopAllowed: function( node ){
      // for the specified node, return whether edges from itself to itself are allowed
      return false;
    },
    nodeLoopOffset: -50, // offset for edgeType: 'node' loops
    nodeParams: function( sourceNode, targetNode ){
      // for edges between the specified source and target
      // return element object to be passed to cy.add() for intermediary node
      return {};
    },
    edgeParams: function( sourceNode, targetNode, i ){
      // for edges between the specified source and target
      // return element object to be passed to cy.add() for edge
      // NB: i indicates edge index in case of edgeType: 'node'
      return {};
    },
    ghostEdgeParams: function(){
      // return element object to be passed to cy.add() for the ghost edge
      // (default classes are always added for you)
      return {};
    },
    show: function( sourceNode ){
      // fired when handle is shown
    },
    hide: function( sourceNode ){
      // fired when the handle is hidden
    },
    start: function( sourceNode ){
      // fired when edgehandles interaction starts (drag on handle)
    },
    complete: function( sourceNode, targetNode, addedEles ){
      // fired when edgehandles is done and elements are added
    },
    stop: function( sourceNode ){
      // fired when edgehandles interaction is stopped (either complete with added edges or incomplete)
    },
    cancel: function( sourceNode, cancelledTargets ){
      // fired when edgehandles are cancelled (incomplete gesture)
    },
    hoverover: function( sourceNode, targetNode ){
      // fired when a target is hovered
    },
    hoverout: function( sourceNode, targetNode ){
      // fired when a target isn't hovered anymore
    },
    previewon: function( sourceNode, targetNode, previewEles ){
      // fired when preview is shown
    },
    previewoff: function( sourceNode, targetNode, previewEles ){
      // fired when preview is hidden
    },
    drawon: function(){
      // fired when draw mode enabled
    },
    drawoff: function(){
      // fired when draw mode disabled
    }
  };

  let graph;
  export default {
    props: ['people'],
    data() {
      return {
        lastClickedNode: null,
        elements: [],
        csrfToken: null
      }
    },
    mounted() {

      this.elements = JSON.parse(this.people);
      for (let i = 0; i < this.elements.length; i++) {
        this.elements[i] = {data: this.elements[i]};
      }


      this.csrfToken = document.querySelector('meta[name="csrf-token"]').content;
      graph = cytoscape({
        container: document.getElementById('cy'), // container to render in
        elements: {
          nodes: this.elements,
        },
        style: [
          {
            selector: 'node',
            style: {
              'content': 'data(name)',
              'label': 'data(name)',
              'background-color': '#fff',
              'color': '#fff',
            }
          },

          {
            selector: 'edge',
            style: {
              'curve-style': 'bezier',
              'target-arrow-shape': 'triangle'
            }
          },

          // some style for the extension

          {
            selector: '.eh-handle',
            style: {
              'background-color': '#65a0ef',
              'width': 12,
              'height': 12,
              'shape': 'ellipse',
              'overlay-opacity': 0,
              'border-width': 12, // makes the handle easier to hit
              'border-opacity': 0
            }
          },

          {
            selector: '.eh-hover',
            style: {
              'background-color': '#65a0ef'
            }
          },

          {
            selector: '.eh-source',
            style: {
              'border-width': 2,
              'border-color': '#65a0ef'
            }
          },

          {
            selector: '.eh-target',
            style: {
              'border-width': 2,
              'border-color': '#65a0ef'
            }
          },

          {
            selector: '.eh-preview, .eh-ghost-edge',
            style: {
              'background-color': '#65a0ef',
              'line-color': '#65a0ef',
              'target-arrow-color': '#65a0ef',
              'source-arrow-color': '#65a0ef'
            }
          },

          {
            selector: '.eh-ghost-edge.eh-preview-active',
            style: {
              'opacity': 0
            }
          }
        ],
        layout: {
          name: 'circle',
        },
        zoom: 2
      });
      graph.edgehandles( defaults );
      console.log(this.elements);
      graph.on('tap', 'node', this.onNodeClick);
    },
    methods: {
      onNodeClick(event) {
        this.$emit('show-add-model', {
          data: this.getElementById(event.target._private.data.id),
        });
      },
      addPerson(data) {
        let id = this.addElement(data);
        graph.add({
          data: {
            id: id,
            name: data.name,
            birthday: data.birthday
          }
        })
      },
      addNode() {
        this.$emit('show-add-model');
      },
      addElement(data) {
        data._token = this.csrfToken;
        let savedData = fetch("/backend/people/", {
          method: 'POST', // *GET, POST, PUT, DELETE, etc.
          mode: 'cors', // no-cors, cors, *same-origin
          cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
          credentials: 'same-origin', // include, *same-origin, omit
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': data._token
            // 'Content-Type': 'application/x-www-form-urlencoded',
          },
          redirect: 'follow', // manual, *follow, error
          referrer: 'no-referrer', // no-referrer, *client
          body: JSON.stringify(data), // body data type must match "Content-Type" header
        })
            .then(response => response.json()); // parses JSON response into native Javascript objects
        this.elements.push(savedData);
        return savedData.id;
      },
      getElementById(id) {
        for (let i = 0; i < this.elements.length; i++) {
          if(this.elements[i].id === id) {
            return this.elements[i];
          }
        }
      }
    }

  }
</script>
