<template>

    <!-- Monthly Statistics Panel-->
    <div class="col-md-6">
        <div class="panel panel-default text-center">
            <div class="panel-heading">Monthly Statistics: {{month}}, {{year}}</div>

            <i v-show="loading" id="preloader" class="fa fa-spinner fa-pulse"></i>

            <div v-show="!loading" class="panel-body text-left">

                <div>
                    <span class="big-number"><i v-show="loading" style="font-size: 40px;" class="fa fa-spinner fa-pulse"></i>{{ meta.encounters_current_month }}</span> 
                    <span class="stat-label">Encounters</span>
                </div>

                <div>
                    <span class="big-number"><i v-show="loading" style="font-size: 40px;" class="fa fa-spinner fa-pulse"></i>{{ meta.actions_current_month }}</span> 
                    <span class="stat-label">Actions</span>
                </div>

                
                <div>
                    <span class="big-number"><i v-show="loading" style="font-size: 40px;" class="fa fa-spinner fa-pulse"></i>{{ meta.duration_current_month }}</span> 
                    <span class="stat-label">Minutes Served</span>
                </div>

            </div>
        </div>
    </div>

</template>

<script>
    export default {

        data() {

            return {
                meta: [],
                month: '----',
                year: '----',
                loading: false
            };
        },

        mounted() {

            let date = new Date();
            var monthName = [ 
                "January", 
                "February", 
                "March", 
                "April", 
                "May", 
                "June",   
                "July", 
                "August", 
                "September", 
                "October", 
                "November", 
                "December"
            ];

            this.month = monthName[ date.getMonth() ];
            this.year  = date.getFullYear();

            this.loading = true
            this.getMetaData();

        },

        methods: {

            //Get Meta Data
            getMetaData: function(){
                axios.get('/api/meta-data')
                    .then(response => {
                        this.loading = false;
                        this.meta = response.data;
                    });
            }
        }

    }
        
</script>

<style scoped>

    #preloader {
        font-size: 35px;
        padding: 10px;
    }

</style>