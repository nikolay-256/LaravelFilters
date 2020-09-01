<template>
    <div id="app">
        <div class="heading">
            <h1>Houses</h1>
        </div>


        <div id="filters">
            <div class="filter_row" v-for="item in filter_select_items">
                {{item}}
                <select @change="read" v-model="filter[item]">
                    <option
                            v-for="item in select_1_10"
                            :value="item"
                            :key="item"
                    >{{item}}
                    </option>
                </select>
            </div>
            <div class="filter_row">
                price >=<input v-model="filter.price_gt" type="text" class="price_input" @keypress="isNumber($event)" @keyup="read()">
            </div>
            <div class="filter_row">
                price <=<input v-model="filter.price_lt" type="text" class="price_input" @keypress="isNumber($event)" @keyup="read()">
            </div>
        </div>
        <h3 v-if="!houses.length&&!mute">Empty result!</h3>

        <house-component
                v-for="house in houses"
                v-bind="house"
                :key="house.id"
        ></house-component>

    </div>
</template>

<script>
    function House({id, name, price, bedrooms, bathrooms, storeys, garages}) {
        this.id = id;
        this.name = name;
        this.price = price;
        this.bedrooms = bedrooms;
        this.bathrooms = bathrooms;
        this.storeys = storeys;
        this.garages = garages;
    }

    import houseComponent from './components/Houses';

    export default {
        data() {
            var select_1_10 = [''];
            for(var i=1;i<=10;i++){
                select_1_10.push(i);
            }
            return {
                filter_select_items: ['bedrooms', 'bathrooms', 'storeys','garages'],
                select_1_10: select_1_10,
                filter: {},
                houses: [],
                mute: false
            }
        },
        methods: {
            async read() {
                this.mute = true;
                const {data} = await window.axios.get('/api/houses?'+new URLSearchParams(this.filter));
                this.houses = [];
                data.forEach(house => this.houses.push(new House(house)));
                this.mute = false;
            },
            isNumber: function(evt) {
                evt = (evt) ? evt : window.event;
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                    evt.preventDefault();
                } else {
                    return true;
                }
            },
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
    .filter_row{
        display: inline-table;
        margin-right: 10px;
    }
    .price_input{
        width: 80px;
    }
</style>
