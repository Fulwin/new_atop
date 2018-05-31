<template>
    <div class="users-create-page">
        <el-breadcrumb class="mb-3" separator-class="el-icon-arrow-right">
            <el-breadcrumb-item :to="{ path: '/users' }">用户列表</el-breadcrumb-item>
            <el-breadcrumb-item>创建用户</el-breadcrumb-item>
        </el-breadcrumb>
        <div class="card">
            <div class="card-body">
                <el-row>
                    <el-col :span="14">
                        <el-form ref="form" :model="form" :rules="rules" label-width="150px">
                            <el-form-item label="姓名" prop="name">
                                <el-input v-model="form.name" placeholder="请输入真实姓名"></el-input>
                            </el-form-item>
                            <el-form-item label="邮箱" prop="email">
                                <el-input v-model="form.email" placeholder="请输入工作邮箱"></el-input>
                            </el-form-item>
                            <el-form-item label="部门" prop="department_id">
                                <el-select v-model="form.department_id" placeholder="请选择部门">
                                    <el-option v-for="(department, index) in departments" :key="index" :label="department.name" :value="department.id"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="级别" prop="level_id">
                                <el-select v-model="form.level_id" placeholder="请选择级别">
                                    <el-option v-for="(level, index) in levels" :key="index" :label="level.name" :value="level.id"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="职位" prop="posts">
                                <el-select v-model="form.posts" multiple placeholder="请选择职位" style="width: 100%;">
                                    <el-option v-for="(post, index) in posts" :key="index" :label="post.name" :value="post.id"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item label="汇报关系" prop="report">
                                <el-select v-model="form.report" placeholder="请选择汇报关系">
                                    <el-option v-for="(user, index) in users" :key="index" :label="user.name" :value="user.id"></el-option>
                                </el-select>
                            </el-form-item>
                            <el-form-item>
                                <el-button type="primary" @click="onSubmit('form')">立即创建</el-button>
                                <el-button @click="resetForm('form')">重置</el-button>
                            </el-form-item>
                        </el-form>
                    </el-col>
                </el-row>
            </div>
        </div>
    </div>
</template>

<style lang="stylus" scope>
</style>


<script>
export default {
    created () {
        this.getUsers();
        this.getDepartments();
        this.getLevels();
        this.getPosts();
    },
    data() {
        return {
            form: {
                name: "",
                email: "",
                department_id: "",
                level_id: "",
                posts: [],
                report: ""
            },
            users: [],
            posts: [],
            departments: [],
            levels: [],
            rules: {
                name: [
                    { required: true, message: '请输入真实姓名', trigger: 'blur' }
                ],
                email: [
                    { required: true, message: '请输入工作邮箱', trigger: 'blur' },
                    { type: 'email', message: '非法邮箱格式', trigger: 'blur' }
                ],
                department_id: [
                    { required: true, message: '请选择部门', trigger: 'change' }
                ],
                level_id: [
                    { required: true, message: '请选择级别', trigger: 'change' }
                ],
                posts: [
                    { type: 'array', required: true, message: '至少选择一个职位', trigger: 'change' }
                ],
                report: [
                    { required: true, message: '请选择汇报关系', trigger: 'change' }
                ],
            }
        };
    },
    methods: {
        onSubmit(formName) {
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    axios({
                        method: 'post',
                        url: '/api/users',
                        data: this.form
                    }).then((res) => {
                        console.log(res);
                    });
                } else {
                    this.$message.error('请检查表单字段填写是否完整和正确');
                    return false;
                }
            });
        },
        resetForm(formName) {
            this.$refs[formName].resetFields();
        },
        getUsers() {
            axios.get('/api/usersList')
            .then((res) => {
                this.users = res.data;
            });
        },
        getDepartments() {
            axios.get('/api/departments')
            .then((res) => {
                this.departments = res.data;
            });
        },
        getLevels() {
            axios.get('/api/levels')
            .then((res) => {
                this.levels = res.data;
            });
        },
        getPosts() {
            axios.get('/api/posts')
            .then((res) => {
                this.posts = res.data;
            });
        }
    }
};
</script>

