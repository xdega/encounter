
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

//Front Page
Vue.component('client-lookup', require('./components/ClientLookup.vue'));
Vue.component('overall-statistics-panel', require('./components/OverallStatistics.vue'));
Vue.component('monthly-statistics-panel', require('./components/MonthlyStatistics.vue'));
Vue.component('weekly-overview-chart', require('./components/WeeklyChart.vue'));
Vue.component('annual-overview-chart', require('./components/AnnualChart.vue'));

//Tools
Vue.component('create-client', require('./components/tools/CreateClient.vue'));
Vue.component('create-action-type', require('./components/tools/CreateActionType.vue'));
Vue.component('create-encounter-type', require('./components/tools/CreateEncounterType.vue'));

//Intake Form
Vue.component('intake-form', require('./components/IntakeForm.vue'));

//Child Components
Vue.component('client-autocomplete-input', require('./components/ClientAutocompleteInput.vue'));

//Instantiate Vue
const app = new Vue({
    el: '#app'
});
