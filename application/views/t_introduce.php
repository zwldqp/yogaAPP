<?php
$loginID = $this -> session -> userdata('logindata');
?>

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
                <form class="am-form" action="teacher/do_introduce" method="get">
                    <div class="am-g">
                        <div class="am-form-group">
                            <input type="text" class="am-radius"  placeholder="真实名字" name="name">
                        </div>

                        <div class="am-form-group form-horizontal m-t-20">
                            <input type="email" class="am-radius"  placeholder="联系邮箱" name="email">
                        </div>

                        <div class="am-form-group ">
                            <button type="submit" class="am-btn am-btn-primary am-radius" style="width: 100%;height: 100%;">完善信息</button>
                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
</body>
</html>
