<?php
$loginID = $this -> session -> userdata('logindata');
$teacher = $this -> session -> userdata('teacher');
?>

<!DOCTYPE html>
<html>
<head>
    <base href="<?php echo site_url() ?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yoga选课系统</title>
    <link rel="stylesheet" href="assets/css/amazeui.css" />
    <link rel="stylesheet" href="assets/css/core.css" />
    <link rel="stylesheet" href="assets/css/menu.css" />
    <link rel="stylesheet" href="assets/css/index.css" />
    <link rel="stylesheet" href="assets/css/admin.css" />
    <link rel="stylesheet" href="assets/css/page/typography.css" />
    <link rel="stylesheet" href="assets/css/page/form.css" />
    <link rel="stylesheet" href="assets/css/component.css" />
</head>
<body>
<?php include 't_header.php'?>

<div class="admin">
    <?php include 't_nav.php'?>
    <div class="content-page">
        <div class="content">
            <ul style="font-size:1.5rem;line-height: 6rem;margin-top: 80px;margin-bottom: 50px">
                <h1>我的信息</h1>
                <img src="<?php echo $row->teac_Img?>" style="width: 7rem;height: 9rem;float: right;margin-right: 4rem" alt="">
                <li>姓名：<?php echo $row->teac_Name?></li>
                <li>邮箱：<?php echo $row->teac_Email?></li>
            </ul>
            <a href="teacher/t_introduce1" style="margin-left:80% ">修改</a>
        </div>
    </div>
</div>

<a href="admin-offcanvas" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"><!--<i class="fa fa-bars" aria-hidden="true"></i>--></a>

<script type="text/javascript" src="assets/js/jquery-2.1.0.js" ></script>
<script type="text/javascript" src="assets/js/amazeui.min.js"></script>
<script type="text/javascript" src="assets/js/app.js" ></script>
<script type="text/javascript" src="assets/js/blockUI.js" ></script>
<script type="text/javascript" src="assets/js/charts/echarts.min.js" ></script>
<script type="text/javascript" src="assets/js/charts/indexChart.js" ></script>

</body>

</html>
