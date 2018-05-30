import Vue from 'vue';
import VueRouter from 'vue-router';

// 首页
import home from './components/home/home';
// 用户管理
import users from './components/users/index';
import userCreate from './components/users/create';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        component: home
    },
    {
        path: '/users',
        component: users
    },
    {
        path: '/users/create',
        component: userCreate
    }
];

var router = new VueRouter({
    routes
});

export default router;