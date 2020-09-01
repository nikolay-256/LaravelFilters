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
        </div>

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
                filter_select_items: ['bedrooms', 'bathrooms'],
                select_1_10: select_1_10,
                filter: {},
                houses: [],
                mute: false
            }
        },
        methods: {
            async read() {
                this.mute = true;
                this.houses = [];
                const {data} = await window.axios.get('/api/houses?'+new URLSearchParams(this.filter));
                data.forEach(house => this.houses.push(new House(house)));
                this.mute = false;
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
</style>
