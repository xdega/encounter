<template>

    <!-- Monthly Statistics Panel-->
    <div class="col-md-6">
        <div class="panel panel-default text-center">
            <div class="panel-heading">Monthly Statistics</div>

            <i v-show="loading" id="preloader" class="fa fa-spinner fa-pulse"></i>

            <div v-show="!loading" class="panel-body text-left">
                <p><span class="big-number"><i v-show="loading" style="font-size: 40px;" class="fa fa-spinner fa-pulse"></i>{{ meta.encounters_current_month }}</span> Encounters</p>
                <p><span class="big-number"><i v-show="loading" style="font-size: 40px;" class="fa fa-spinner fa-pulse"></i>{{ meta.actions_current_month }}</span> Actions</p>
                <p><span class="big-number"><i v-show="loading" style="font-size: 40px;" class="fa fa-spinner fa-pulse"></i>{{ meta.duration_current_month }}</span> Minutes Served</p>
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