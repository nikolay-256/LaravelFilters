<template>
    <div class="house">
        <div class="col-1">
        </div>
        <div class="col-2">
            <h3>{{ name | properCase }}</h3>
            <div>price: {{price}}</div>
            <div>bedrooms: {{bedrooms}}</div>
            <div>bathrooms: {{bathrooms}}</div>
            <div>storeys: {{storeys}}</div>
            <div>garages: {{garages}}</div>

        </div>
    </div>
</template>
<script>
  export default {
    computed: {
    },
    methods: {
    },
    props: ['name', 'price', 'bedrooms', 'bathrooms', 'storeys', 'garages'],
    filters: {

      properCase(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
      }
    }
  }
</script>
<style>
    .house {
        margin: 1em 1em 1em 0;
        border: 1px solid #d1d1d1;
        padding: 1em;
        max-width: 350px;
        background-color: white;
        display: inline-block;
    }

    .house img {
        height: 70px;
    }

    .col-2 {
        margin-left: 1em;
    }

    .col-2 > h3 {
        margin: 0.5em 0;
    }
</style>
