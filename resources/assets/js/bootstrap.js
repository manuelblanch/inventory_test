
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

window.$ = window.jQuery = require('jquery');

require('bootstrap-less');

require('admin-lte');
window.toastr = require('toastr');
require('icheck');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');

window.events = new Vue();

window.showNotification = function(message, type = 'alert-primary') {
    window.events.$emit('showNotification', message, type);
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');
Vue.prototype.$http = axios;

window.axios.defaults.headers.common = {
    'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'Accept': 'application/json',
    'X-Requested-With': 'XMLHttpRequest'
}


// Laravel AdminLTE vue components
Vue.component('register-form', require('./components/auth/RegisterForm.vue'))
Vue.component('login-form', require('./components/auth/LoginForm.vue'))
Vue.component('email-reset-password-form', require('./components/auth/EmailResetPasswordForm.vue'))
Vue.component('reset-password-form', require('./components/auth/ResetPasswordForm.vue'))

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from "laravel-echo"

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
