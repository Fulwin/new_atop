import Vue from 'vue';
import VueRouter from 'vue-router';

// 登录
import login from './components/auth/login';
// 布局
import layout from './components/layout';
// 首页
import home from './components/home/home';
// 用户管理
import users from './components/users/index';
import userCreate from './components/users/create';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        component: layout,
        children: [
            {
                path: 'users',
                component: users
            },
            {
                path: 'users/create',
                component: userCreate
            }
        ]
    },
    {
        path: '/login',
        component: login
    },
];

var router = new VueRouter({
    routes
});

export default router;