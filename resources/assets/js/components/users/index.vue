<template>
    <div class="users-index-page">
        <el-breadcrumb class="mb-3" separator-class="el-icon-arrow-right">
            <el-breadcrumb-item>用户列表</el-breadcrumb-item>
        </el-breadcrumb>
        <div class="card">
            <div class="card-body">
                <el-row class="mb-3">
                    <div class="clearfix">
                        <div class="float-left">
                            <el-button plain v-on:click="createUser">创建用户</el-button>
                        </div>
                        <div class="float-right">
                            <el-input
                                    placeholder="搜索用户"
                                    prefix-icon="el-icon-search"
                                    @keyup.enter.native="searchUser"
                                    v-model="search">
                            </el-input>
                        </div>
                    </div>
                </el-row>
                <el-table :data="users" style="width: 100%" stripe>
                    <el-table-column label="头像" width="100">
                        <template slot-scope="scope">
                            <img class="rounded" :src="scope.row.avatar" height="30" width="30" alt="">
                        </template>
                    </el-table-column>
                    <el-table-column prop="name" label="姓名">
                    </el-table-column>
                    <el-table-column prop="email" label="邮箱" :show-overflow-tooltip="true">
                    </el-table-column>
                    <el-table-column prop="department.name" label="部门">
                    </el-table-column>
                    <el-table-column prop="level.name" label="级别">
                    </el-table-column>
                    <el-table-column label="操作">
                        <template slot-scope="scope">
                            <el-button type="text" size="small">查看</el-button>
                            <el-button type="text" size="small">编辑</el-button>
                            <el-button type="text" size="small">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>

                <el-pagination
                    background
                    class="mt-3"
                    :page-size="15"
                    layout="prev, pager, next"
                    @prev-click="prevPage"
                    @next-click="nextPage"
                    @current-change="currentPageChange"
                    :total="total">
                </el-pagination>
            </div>
        </div>
    </div>
</template>

<style lang="stylus" scope>
</style>


<script>
export default {
    created() {
        this.getUsers();
    },
    data() {
        return {
            users: [],
            search: '',
            total: 0,
            prev_page_url: '',
            next_page_url: ''
        };
    },
    methods: {
        createUser() {
            this.$router.push("/users/create");
        },
        getUsers() {
            axios.get("/api/users").then(res => {
                this.updateData(res.data);
            });
        },
        searchUser() {
            // 在axios中，get请求遵从一下格式 {params: data}
            axios.get("/api/users", {
                params: { search: this.search }
            }).then((res) => {
                this.updateData(res.data);
            });
        },
        updateData(data) {
            this.users = data.data;
            this.total = data.total;
            this.prev_page_url = data.prev_page_url;
            this.next_page_url = data.next_page_url;
        },
        paginate(type, currentPage = 1) {
            let url = '';
            switch(type) {
                case 'prev':
                    url = this.prev_page_url;
                    break;
                case 'next':
                    url = this.next_page_url;
                    break;
                default:
                    url = '/api/users?page=' + currentPage;
            }
            axios.get(url, {
                params: { search: this.search }
            }).then((res) => {
                this.updateData(res.data);
            });
        },
        prevPage() {
            this.paginate('prev');
        },
        nextPage() {
            this.paginate('next');
        },
        currentPageChange(currentPage) {
            this.paginate('current', currentPage);
        }
    }
};
</script>

