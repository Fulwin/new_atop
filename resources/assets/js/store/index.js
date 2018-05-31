import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
import userStore from './user';

const store = new Vuex.Store({
    modules: {
        user: userStore
    }
});

export default store;