<template>
    <div>
        <header id="header">
            <div class="clearfix">
                <div class="float-left">
                    <img src="https://www.atoptechnology.com.cn/images/logo.jpg" height="59" alt="">
                </div>
                <div class="float-right">
                    <div class="clearfix header-bar">
                        <div class="hb-item float-left">
                            <router-link to="/"><i class="el-icon-time"></i> 待办事项</router-link>
                        </div>
                        <div class="hb-item float-left">
                            <img src="https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=2529469200,1162169902&fm=27&gp=0.jpg"
                                height="30" 
                                width="30" 
                                class="rounded mr-1"
                                alt="">
                            <span>{{ $store.state.user.name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section id="container">
            <aside id="aside">
                <el-scrollbar style="height: 100%;">
                    <div id="sidebar">
                        <el-menu 
                            default-active="projects" 
                            class="el-menu-vertical-demo" 
                            @open="handleOpen" 
                            @close="handleClose" 
                            background-color="#2d3e50" 
                            text-color="#fff"
                            :unique-opened="true"
                            active-text-color="#409eff">
                            <el-submenu index="rd">
                                <template slot="title">
                                    <i class="el-icon-menu"></i>
                                    <span>研发管理</span>
                                </template>
                                <el-menu-item index="projects">项目管理</el-menu-item>
                                <el-menu-item index="samples">样品管理</el-menu-item>
                                <el-menu-item index="products">产品管理</el-menu-item>
                                <el-menu-item index="softwares">软件发布</el-menu-item>
                                <el-menu-item index="compatibilities">兼容表</el-menu-item>
                            </el-submenu>
                            <el-submenu index="plm">
                                <template slot="title">
                                    <i class="el-icon-time"></i>
                                    <span>PLM</span>
                                </template>
                                <el-menu-item index="files">文件管理</el-menu-item>
                                <el-menu-item index="codes">客户代码</el-menu-item>
                            </el-submenu>
                            <el-menu-item index="approves">
                                <i class="el-icon-news"></i>
                                <span slot="title">审批</span>
                            </el-menu-item>
                            <el-menu-item index="summaries">
                                <i class="el-icon-edit-outline"></i>
                                <span slot="title">工作总结</span>
                            </el-menu-item>
                            <el-menu-item index="acronyms">
                                <i class="el-icon-tickets"></i>
                                <span slot="title">缩略词</span>
                            </el-menu-item>
                            <el-menu-item index="rmas">
                                <i class="el-icon-phone-outline"></i>
                                <span slot="title">客诉处理</span>
                            </el-menu-item>
                            <el-submenu index="hra">
                                <template slot="title">
                                    <i class="el-icon-location-outline"></i>
                                    <span>HRA</span>
                                </template>
                                <el-menu-item index="files">公告栏</el-menu-item>
                                <el-menu-item index="codes">用户管理</el-menu-item>
                            </el-submenu>
                            <el-menu-item index="settings">
                                <i class="el-icon-setting"></i>
                                <span slot="title">系统设置</span>
                            </el-menu-item>
                        </el-menu>
                    </div>
                </el-scrollbar>
            </aside>
            <div id="main">
                <transition>
                    <router-view></router-view>
                </transition>
            </div>
        </section>
    </div>
</template>

<style lang="stylus" scope>
@import '../../styl/base.styl';
    
body
    margin-top 60px
    background #f1f1f1

#header
    height 60px
    border-bottom solid 1px #ccc
    background-color #fff
    padding-left 20px
    padding-right 20px
    position fixed
    top 0
    z-index 10
    width 100%
    .header-bar
        margin-top 15px
        .hb-item
            line-height 30px
            padding 0 20px
            &:first-child
                padding-left 0
            &:last-child
                padding-right 0

#container
    width 100%

    #aside
        width 250px
        position fixed
        top 59px
        height 100%
        background-color #2d3e50
        overflow hidden

    #main
        margin-left 250px
        padding 20px

</style>


<script>
export default {
    methods: {
        handleOpen(key, keyPath) {
            console.log(key, keyPath);
        },
        handleClose(key, keyPath) {
            console.log(key, keyPath);
        }
    }
};
</script>
