<template>
    <div id="app">
        <div class="heading">
            <h1>Houses</h1>
        </div>
        <house-component
                v-for="house in houses"
                v-bind="house"
                :key="house.id"
                @update="update"
                @delete="del"
        ></house-component>
        <div>
            <button @click="create">Add</button>
        </div>
    </div>
</template>

<script>
  function House({ id, color, name}) {
    this.id = id;
    this.color = color;
    this.name = name;
  }

  import houseComponent from './components/Houses';

  export default {
    data() {
      return {
        houses: [],
        mute: false
      }
    },
    methods: {
      async create() {
        this.mute = true;
        const { data } = await window.axios.get('/api/houses/create');
        this.houses.push(new House(data));
        this.mute = false;
      },
      async read() {
        this.mute = true;
        const { data } = await window.axios.get('/api/houses');
        data.forEach(house => this.houses.push(new House(house)));
        this.mute = false;
      },
      async update(id, color) {
        this.mute = true;
        await window.axios.put(`/api/houses/${id}`, { color });
        this.houses.find(house => house.id === id).color = color;
        this.mute = false;
      },
      async del(id) {
        this.mute = true;
        await window.axios.delete(`/api/houses/${id}`);
        let index = this.houses.findIndex(house => house.id === id);
        this.houses.splice(index, 1);
        this.mute = false;
      }
    },
    watch: {
      mute(val) {
        document.getElementById('mute').className = val ? "on" : "";
      }
    },
    components: {
      houseComponent
    },
    created() {
      this.read();
    }
  }
</script>
<style>
    #app {
        margin-left: 1em;
    }

    .heading h1 {
        margin-bottom: 0;
    }
</style>
