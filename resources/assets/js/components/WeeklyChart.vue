<template>

    <!-- Weekly Overview Panel-->
    <div class="col-md-6">
        <div class="panel panel-default text-center">
            <div class="panel-heading">Weekly Overview</div>

            <i v-show="loading" id="preloader" class="fa fa-spinner fa-pulse"></i>

            <div v-show="!loading" class="panel-body">

                <canvas id="WeeklyOverviewChart"></canvas>
            
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
                
                // Weekly Overview Chart (Dummy Data)
                var ctx = document.getElementById("WeeklyOverviewChart").getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                        data: {
                            labels: ["6 Days Ago", "5 Days Ago", "4 Days Ago", "3 Days Ago", "2 Days Ago", "Yesterday", "Today"],
                        datasets: [{
                            label: 'Encounters',
                            data: [
                                this.chart_data.encounters_days_ago.six,
                                this.chart_data.encounters_days_ago.five, 
                                this.chart_data.encounters_days_ago.four, 
                                this.chart_data.encounters_days_ago.three, 
                                this.chart_data.encounters_days_ago.two, 
                                this.chart_data.encounters_days_ago.one, 
                                this.chart_data.encounters_days_ago.zero
                            ]
                        }],
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
                //
            },

            //Get Meta Data
            getMetaData: function(){
                axios.get('/api/meta-data')
                    .then(response => {
                        this.loading = false;
                        this.chart_data = response.data;
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