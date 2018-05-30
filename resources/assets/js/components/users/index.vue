<template>
    <div class="users-index-page">
        <el-breadcrumb class="mb-3" separator-class="el-icon-arrow-right">
            <el-breadcrumb-item>用户列表</el-breadcrumb-item>
        </el-breadcrumb>
        <div class="card">
            <div class="card-body">
                <el-row>
                    <el-button plain v-on:click="createUser">创建用户</el-button>
                </el-row>
            </div>
        </div>
    </div>
</template>

<style lang="stylus" scope>

</style>


<script>
export default {
    data () {
        return {

        }
    },
    methods: {
        createUser () {
            this.$router.push('/users/create');
        }
    }
}
</script>

