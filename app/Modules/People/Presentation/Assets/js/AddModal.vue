<template>
  <div id="container" v-show="shouldShow">
    <div class="content">
        <label>
          Name: <input type="text" v-model="name">
        </label>
        <label>
          Birthday: <datepicker v-model="birthDate" placeholder="Select Date"></datepicker>
        </label>
      <label>
        Email: <input type="text" v-model="email">
      </label>
        <button v-on:click="save">Save</button>
        <button id="delete" v-on:click="deletePerson">delete</button>
    </div>
  </div>
</template>
<style scoped lang="scss">
  div#container {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    label {
      color: black;
    }
    .vdp-datepicker {
      display: inline-block;
      width: 100%;
    }
    .content {
      background-color: #65a0ef;
      padding: 20px;
      min-width: 25vw;
      display: grid;
      grid-template-rows: 71px 85px ;
      grid-template-columns: 200px 200px 200px;
    }
    input {
      margin-bottom: 8px;
    }
  }
  button {
    border: none;
    text-transform: uppercase;
    color: white;
    background-color:  #27293d;
    padding: 8px 16px;
    border-radius: 5px;
    grid-row: 3;
    grid-column: span 2;
  }
</style>
<script>
  import Datepicker from 'vuejs-datepicker';
  export default {
    name: "add-model",
    data() {
      return {
        shouldShow: false,
        name: "",
        email: "",
        birthDate: "",
        id: null,
      }
    },
    components: {
      'datepicker': Datepicker
    },
    methods: {
      show(data) {
        console.log(data);
        if(data) {
          this.name = data.name;
          this.birthDate = data.birthDate;
          this.email = data.email;
          this.id = data.id;
        }else {
          this.name = "";
          this.birthDate = "";
          this.email = "";
          this.id = null;
        }
        this.shouldShow = true;
      },
      save(event) {
        event.preventDefault();
        event.stopPropagation();
        if(this.id) {
          this.$emit('update', {
            'name': this.name,
            'birthday': this.birthDate.getFullYear() + "-" + this.birthDate.getMonth() + "-" + this.birthDate.getDay() + " 00:00:00",
            'email': this.email
          })
        }
        this.$emit('save', {
          'name': this.name,
          'birthday': this.birthDate.getFullYear() + "-" + this.birthDate.getMonth() + "-" + this.birthDate.getDay() + " 00:00:00",
          'email': this.email
        })
        this.shouldShow = false;
      },
      deletePerson(event) {
        event.preventDefault();
        event.stopPropagation();
        if(this.id) {
          this.$emit('update', {
            'name': this.name,
            'birthday': this.birthDate.getFullYear() + "-" + this.birthDate.getMonth() + "-" + this.birthDate.getDay() + " 00:00:00",
            'email': this.email
          })
        }
        this.$emit('save', {
          'name': this.name,
          'birthday': this.birthDate.getFullYear() + "-" + this.birthDate.getMonth() + "-" + this.birthDate.getDay() + " 00:00:00",
          'email': this.email
        })
        this.shouldShow = false;
      }
    },
  }
</script>
