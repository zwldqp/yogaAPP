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
            <table class="am-table .am-table-bordered">
                <thead>
                <tr>
                    <th>班级名称</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($courses as $value){?>
                    <tr>
                        <?php if(isset($my_course[$value->cour_Id])){?>
                            <td><?php echo $value->cour_Name?></td>
                            <td><a href="teacher/t_teach_class?id=<?php echo $value->cour_Id?>">详情</a>|<a href="teacher/t_kaoshi?id=<?php echo $value->cour_Id?>">发布考试</a> </td>
                        <?php }?>
                    </tr>
                <?php }?>
                </tbody>
            </table>
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
