<template>

    <!-- Annual Overview Panel-->
    <div class="col-md-6">
        <div class="panel panel-default text-center">
            <div class="panel-heading">Annual Overview: {{ this.year }}</div>

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
                year: '----',
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
                                this.chart_data.encounters_monthly.jan, 
                                this.chart_data.encounters_monthly.feb, 
                                this.chart_data.encounters_monthly.mar, 
                                this.chart_data.encounters_monthly.apr, 
                                this.chart_data.encounters_monthly.may, 
                                this.chart_data.encounters_monthly.jun, 
                                this.chart_data.encounters_monthly.jul, 
                                this.chart_data.encounters_monthly.aug, 
                                this.chart_data.encounters_monthly.sep, 
                                this.chart_data.encounters_monthly.oct, 
                                this.chart_data.encounters_monthly.nov, 
                                this.chart_data.encounters_monthly.dec
                            ]
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
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
                        this.chart_data = response.data;
                        this.year = this.chart_data.request_parameters.year;
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

    @keyframes chartfix {
        
        0% {
            transform: scale(1.0);
            -webkit-transform: scale(1.0);
        }
        50% {
            transform: scale(1.01);
            -webkit-transform: scale(1.01);
        }
        100% {
            transform: scale(1.0);
            -webkit-transform: scale(1.0);
        }
    }

    .panel {
        animation-delay: 3s;
        -webkit-animation-delay: 3s;
        animation: chartfix 5s;
        -webkit-animation: chartfix 5s;
    }

</style>