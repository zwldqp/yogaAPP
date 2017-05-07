<?php
$loginID = $this -> session -> userdata('logindata');
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
<?php include 'header.php'?>

<div class="admin">
    <?php include 'admin_nav.php'?>
    <div class="content-page">
        <div class="content">
            <table class="am-table .am-table-bordered">
                <thead>
                <tr>
                    <th>课程名称</th>
                    <th>日期</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($res as $value){?>
                    <tr>
                        <td><?php echo $value->cour_Name?></td>
                        <td><?php echo $value->cour_Credit?></td>
                        <td><?php echo $value->cour_Class?></td>
                        <td>
                            <a href="admin/delete_course?id=<?php echo $value->cour_Id?>">删除</a>/
                            <a href="admin/update_course?id=<?php echo $value->cour_Id?>">修改</a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
            <form action="admin/insert_course" method="get">
                <p><input type="text" class="am-form-field am-radius" placeholder="课程名称" name="name" value="<?php if(isset($class)) echo $class -> cour_Name?>"/></p>
                <p><input type="text" class="am-form-field am-radius" placeholder="课程日期" name="credit" value="<?php if(isset($class)) echo $class -> cour_Credit?>"/></p>
                <p><input type="text" class="am-form-field am-radius" placeholder="课程时间" name="class" value="<?php if(isset($class)) echo $class -> cour_Class?>"/></p>
                <p><input type="text" class="am-form-field am-radius" placeholder="课程描述" name="desc" value="<?php if(isset($class)) echo $class -> cour_Desc?>"/></p>
                <button type="submit" class="am-btn am-btn-primary">添加</button>
            </form>
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
