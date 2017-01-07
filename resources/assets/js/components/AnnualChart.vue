<template>

    <!-- Annual Overview Panel-->
    <div class="col-md-6">
        <div class="panel panel-default text-center">
            <div class="panel-heading">Annual Overview</div>

            <i v-show="loading" id="preloader" class="fa fa-spinner fa-pulse"></i>

            <div v-show="!loading" class="panel-body">

                <canvas id="AnnualOverviewChart"></canvas>

            </div>
        </div>
            
            </div>

        </div>
    </div>

</template>

<script>
    export default {

        data() {

            return {
                chart_data: [],
                loading: false
            };
        },

        mounted() {

            this.loading = true
            this.getMetaData();

        },

        methods: {

            createChart: function(){

                // Annual Overview Chart
                var ctx = document.getElementById("AnnualOverviewChart").getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                        data: {
                            labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
                        datasets: [{
                            label: 'Encounters',
                            data: [
                                this.chart_data.jan, 
                                this.chart_data.feb, 
                                this.chart_data.mar, 
                                this.chart_data.apr, 
                                this.chart_data.may, 
                                this.chart_data.jun, 
                                this.chart_data.jul, 
                                this.chart_data.aug, 
                                this.chart_data.sep, 
                                this.chart_data.oct, 
                                this.chart_data.nov, 
                                this.chart_data.dec
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });

            },

            //Get Meta Data
            getMetaData: function(){
                axios.get('/api/meta-data')
                    .then(response => {
                        this.loading = false;
                        this.chart_data = response.data.encounters_monthly;
                        this.createChart();
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