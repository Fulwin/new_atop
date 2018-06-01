
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

// Vue.component('layout', require('./components/layout.vue'));

import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

import router from './router';
import store from './store';

// 超时时间
axios.defaults.timeout = 10000;

var loadinginstace;

router.beforeEach((to, from, next) => {
    let token = localStorage.token;
    if (token) {
        // 页面跳转前重新抓取用户数据到 vuex
        store.dispatch('profile');
    }

    next();
});

// http请求拦截器
axios.interceptors.request.use(config => {
    let token = localStorage.token;

    // 如果 token 不存在则跳转到登录页面，存在则将 token 附加在 header 中
    if (!token) {
        router.push('/login');
    } else {
        config.headers.Authorization = token;
    }

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
axios.interceptors.response.use((response) => {
    // 响应成功关闭loading
    loadinginstace.close();

    // 判断一下响应中是否有 token，如果有就直接使用此 token 替换掉本地的 token。你可以根据你的业务需求自己编写更新 token 的逻辑
    var token = response.headers.Authorization;
    if (token) {
        // 如果 header 中存在 token，那么触发 refreshToken 方法，替换本地的 token
        store.dispatch('refreshToken', token);
    }

    return response;
}, (err) => {
    loadinginstace.close();

    switch (err.response.status) {
        // 如果响应中的 http code 为 401，那么则此用户可能 token 失效了之类的，我会触发 logout 方法，清除本地的数据并将用户重定向至登录页面
        case 401:
            return store.dispatch('logout');
            break;
        // 如果响应中的 http code 为 400，那么就弹出一条错误提示给用户
        case 400:
            return ElementUI.Message.error(err.response.data.error);
            break;
    }

    return Promise.reject(err);
});

Vue.use(ElementUI);

const app = new Vue({
    el: '#app',
    router,
    store
});
