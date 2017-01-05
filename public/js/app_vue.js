new Vue({

    el: '#app',

    data: {

        name: '',
        query:'',
        clients: []

    },

    computed: {

        computedList: function () {
            var vm = this
            
            return this.clients.filter(function (item) {
                return item.name.toLowerCase().indexOf(vm.query.toLowerCase()) !== -1
            })
        }
    },

    methods: {

        getClients: function(){
            this.$http.get('/api/clients')
                .then(response => {
                    this.clients = response.data;
                });
        },

        clearClients: function(){
            this.clients = [];
        }
    }

});