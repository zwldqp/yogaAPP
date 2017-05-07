<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo site_url() ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="assets/css/core.css" />
    <link rel="stylesheet" href="assets/css/menu.css" />
    <link rel="stylesheet" href="assets/css/amazeui.css" />
    <link rel="stylesheet" href="assets/css/component.css" />
    <link rel="stylesheet" href="assets/css/page/form.css" />
</head>
<body>
<div class="account-pages">
    <div class="wrapper-page">
        <div class="text-center">
            <a href="index.html" class="logo"><span>Yoga选课系统</span></a>
        </div>

        <div class="m-t-40 card-box">
            <div class="text-center">
                <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
            </div>
            <div class="panel-body">
                <form class="am-form" method="post" action="welcome/do_reg">
                    <div class="am-g">
                        <div class="am-form-group">
                            <input type="text" class="am-radius" id="doc-ipt-email-1" placeholder="输入用户账号" name="username">
                            <span id="name" >用户名必须十位纯数字</span>
                        </div>

                        <div class="am-form-group form-horizontal m-t-20">
                            <input type="password" class="am-radius" id="password" placeholder="输入密码" name="password">
                            <span id="psw"></span>
                        </div>

                        <div class="am-form-group form-horizontal m-t-20">
                            <input type="password" class="am-radius" id="doc-ipt-pwd-1" placeholder="再输一遍密码">
                            <span id="psw2"></span>
                        </div>

                        <div class="am-form-group ">
                            <button type="submit" class="am-btn am-btn-primary am-radius" style="width: 100%;height: 100%;" id="submit">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery-1.9.1.min.js"></script>
<script>
    $(function(){
        $elem = $('#submit');
        $elem.prop('disabled',true);
        var flag = [false,false,false];
        /** 用户名校验 **/
        $('#doc-ipt-email-1').on('blur', function () {
            var reg =/^\d{10}$/;
            if(reg.test(this.value)){
                $.get('welcome/check_name', {
                    username: this.value
                }, function (data) {
                    if ($.trim(data) == 'success') {
                        $('#name').html('√');
                        flag[0] = true;
                    } else {
                        $('#name').html('该用户名不可用');
                        flag[0] = false;
                    }
                    if(flag[0] && flag[1] && flag[2]) $elem.prop('disabled',false);
                }, 'text');
            }else{
                $('#name').html('该用户名不可用');
                flag[0] = false;
            }
            if(flag[0] && flag[1] && flag[2]) $elem.prop('disabled',false);
        });

        var $password = $('#password');
        var $repassword = $('#doc-ipt-pwd-1');
        var $psw = $('#psw');
        var $psw2 = $('#psw2');
        /** 密码校验 **/
        $password.on('blur', function () {
            var reg =/^\d$/;
            if(this.value.length < 8 || reg.test(this.value)) {
                $psw.html('至少8位并且不能全为数字！');
                flag[1] = false;
            }else{
                $psw.html('√');
                flag[1] = true;
            }
            if(flag[0] && flag[1] && flag[2]) $elem.prop('disabled',false);
        });

        /** 确认密码校验 **/
        $repassword.on('blur', function () {
            if(this.value!= $password.val()){
                $psw2.html('密码不相同！');
                flag[2] = false;
            }else {
                $psw2.html('√');
                flag[2] = true;
            }
            if(flag[0] && flag[1] && flag[2]) $elem.prop('disabled',false);
        });
    })
</script>
</body>
</html>
