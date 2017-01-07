
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('autocomplete-input', require('./components/AutocompleteInput.vue'));
Vue.component('overall-statistics-panel', require('./components/OverallStatistics.vue'));
Vue.component('monthly-statistics-panel', require('./components/MonthlyStatistics.vue'));
Vue.component('weekly-overview-chart', require('./components/WeeklyChart.vue'));
Vue.component('annual-overview-chart', require('./components/AnnualChart.vue'));

const app = new Vue({
    el: '#app'
});
