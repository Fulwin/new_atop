<template>
    <div>
        <div class="login-container rounded clearfix">
            <div class="login-left float-left py-4 position-relative">
                <div class="logo-box mx-auto">
                    <div class="logo bg-white">
                        <img src="https://www.atoptechnology.com.cn/images/logo.jpg" height="92px" style="margin-top: 12px;" class="rounded" alt="">
                    </div>
                </div>
                <h4 class="text-center mt-3 text-white">华拓光通信股份有限公司</h4>
                <div class="infos text-center position-absolute">
                    <div class="text-white">
                        <small>建议使用1024*768以上分辨率进行浏览</small>
                    </div>
                    <div class="text-white">
                        <small>浏览器兼容：IE8+ / FireFox / Google Chrome</small>
                    </div>
                </div>
            </div>
            <div class="login-right float-right bg-white">
                <div>
                    <h4 class="text-primary mb-0">用户登录</h4>
                    <hr class="border-primary">
                    <!-- <small class="text-dark">Welcome to Atop OA system.</small> -->
                    <!-- <img src="https://www.atoptechnology.com.cn/images/logo.jpg" width="100%" alt=""> -->
                </div>
                <div class="login-form pt-3">
                    <el-form ref="login" :model="user" label-width="0">
                        <el-form-item>
                            <el-input type="text" v-model="user.email" placeholder="请输入邮箱"></el-input>
                        </el-form-item>
                        <el-form-item>
                            <el-input type="password" v-model="user.password" placeholder="请输入密码"></el-input>
                        </el-form-item>
                        <el-button type="primary" style="width: 100%;">登录</el-button>
                    </el-form>
                    <div class="text-dark mt-3">
                        <small>
                            <a class="text-muted" href="mailto:developer.fulwin@outlook.com">没有账号？联系管理员获取账号</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="stylus" scope>
@import '../../../styl/base.styl';

body
    margin 0
    font-family "Helvetica Neue",Helvetica,"PingFang SC","Hiragino Sans GB","Microsoft YaHei","微软雅黑",Arial,sans-serif
    background-image url('https://wallpapers.wallhaven.cc/wallpapers/full/wallhaven-118824.jpg') !important
    background-size 100%

.login-container
    margin-top 5%
    position absolute
    left 50%
    margin-left -400px
    width 800px
    height 500px
    overflow hidden
    .login-left
        width 440px
        height 100%
        background rgba(255, 255, 255, .25)
        .infos
            width 100%
            bottom 30px
        .logo-box
            width 120px
            height 120px
            overflow hidden
            border-radius 50%
            background rgba(255, 255, 255, .3)
            .logo
                width 110px
                height 110px
                overflow hidden
                border-radius 50%
                margin 5px 0 0 5px
    .login-right
        width 360px
        height 100%
        padding 50px 40px
.login
    margin-top 80px
    background-color #fff
    .login-form
        padding 2rem 1.5rem

</style>

<script>
export default {
    data() {
        return {
            user: {
                email: '',
                password: ''
            }
        }
    }
}
</script>
