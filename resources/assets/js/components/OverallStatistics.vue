<template>

    <!-- Overall Statistics Panel-->
    <div class="col-md-6">
        <div class="panel panel-default text-center">
            <div class="panel-heading">Overall Statistics</div>

            <i v-show="loading" id="preloader" class="fa fa-spinner fa-pulse"></i>

            <div v-show="!loading" class="panel-body text-left">
                
                <div>
                    <span class="big-number"><i v-show="loading" style="font-size: 40px;" class="fa fa-spinner fa-pulse"></i>{{ meta.encounters_total }}</span> 
                    <span class="stat-label">Encounters</span>
                </div>

                <div>
                    <span class="big-number"><i v-show="loading" style="font-size: 40px;" class="fa fa-spinner fa-pulse"></i>{{ meta.actions_total }}</span> 
                    <span class="stat-label">Actions</span>
                </div>

                <div>
                    <span class="big-number"><i v-show="loading" style="font-size: 40px;" class="fa fa-spinner fa-pulse"></i>{{ meta.clients_total }}</span> 
                    <span class="stat-label">Unique Clients</span>
                </div>
                
                <div>
                    <span class="big-number"><i v-show="loading" style="font-size: 40px;" class="fa fa-spinner fa-pulse"></i>{{ meta.duration_total }}</span>
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
                loading: false
            };
        },

        mounted() {

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