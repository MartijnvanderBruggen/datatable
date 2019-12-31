/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('select-category', {
    data: function(){
        return {
            categories: axios.get('/categories').then(({data}) => {
                this.categories = data;
            }),
            selected: '',
        }
    },
    methods: {
        blah: function(event){
            console.log(event.target.value);
        }

    },
    template:
        '<select v-model="selected" @change="blah($event)">' +
            '<option :value="category.id" v-for="category in categories">{{category.name}}</option>' +
        '</select>'
});
Vue.component('message', {
    data: function(){
        return {
            message: null,
            id: '',
        }
    },
    mounted() {
       this.init();
    },
    methods:{
        init: function() {
            Echo.channel('auctions')
                .listen( '.App\\Events\\AuctionCreatedEvent',(message) => {

                    this.message = message;
                    this.id = message.auction.id;
                });
        }
    },



    template:
        '<div>' +
            '<p v-if="message">Auction #{{id}} created!</p>' +
            '<p v-else>No recent changes...</p>' +
        '</div>'
});
app = new Vue({ el: '#app' });

