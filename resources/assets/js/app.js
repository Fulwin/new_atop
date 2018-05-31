
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('layout', require('./components/layout.vue'));

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

import router from './router';
import store from './store';

// 超时时间
axios.defaults.timeout = 10000;

// http请求拦截器
var loadinginstace;
axios.interceptors.request.use(config => {
    loadinginstace = ElementUI.Loading.service({ fullscreen: true });
    return config;
}, error => {
    loadinginstace.close();
    ElementUI.Message.error({
        message: '加载超时'
    });
    return Promise.reject(error);
});

// http响应拦截器
axios.interceptors.response.use(data => {
    // 响应成功关闭loading
    loadinginstace.close();
    return data;
}, error => {
    loadinginstace.close();
    ElementUI.Message.error({
        message: '加载失败'
    });
    return Promise.reject(error);
});

Vue.use(ElementUI);

const app = new Vue({
    el: '#app',
    router,
    store
});
