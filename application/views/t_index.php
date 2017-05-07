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
    <title>线上围棋系统</title>
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
            <div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}'>
                <ul class="am-slides">
                    <li>
                        <img src="assets/img/nefu1.jpg">

                    </li>
                    <li>
                        <img src="assets/img/nefu2.jpg">

                    </li>
                    <li>
                        <img src="assets/img/nefu3.jpg">

                    </li>
                    <li>
                        <img src="assets/img/nefu4.jpg">

                    </li>
                </ul>
            </div>
            <table class="am-table .am-table-bordered">
                <thead>
                <tr>
                    <th>所授课程</th>
                    <th>课程名称</th>
                    <th>选课人数</th>
                </tr>
                </thead>
                <tbody>
                <?php $count = 1;?>
                <?php foreach ($res as $key => $value){?>
                    <tr>
                        <td><?php echo $count++?></td>
                        <td><?php echo $key?></td>
                        <td><?php echo $value -> count?></td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<a href="admin-offcanvas" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>
<script type="text/javascript" src="assets/js/jquery-2.1.0.js" ></script>
<script type="text/javascript" src="assets/js/amazeui.min.js"></script>
<script type="text/javascript" src="assets/js/app.js" ></script>
<script type="text/javascript" src="assets/js/blockUI.js" ></script>
<script type="text/javascript" src="assets/js/charts/echarts.min.js" ></script>
<script type="text/javascript" src="assets/js/charts/indexChart.js" ></script>

</body>

</html>
