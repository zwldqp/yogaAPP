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
            <table class="am-table .am-table-bordered" style="font-size: 0.1rem">
                <thead>
                <tr >
                    <th>班级名称</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上课时间</th>
                    <th>课程描述</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $results[0]->cour_Name?></td>
                        <td><?php echo $results[0]->cour_Credit?>&nbsp;<?php echo $results[0]->cour_Class?></td>
                        <td><?php echo $results[0]->cour_Desc?></td>
                    </tr>
                </tbody>
            </table>
            <table class="am-table .am-table-bordered">
                <thead>
                <tr>
                    <th>学生名称</th>
                    <th>联系方式</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($results as $result){?>
                    <tr>
                        <td><?php echo $result->stud_Name?></td>
                        <td><?php echo $result->stud_Email?></td>
                        <td><a href="teacher/shangfen?id=<?php echo $result->stud_Id?>&&cour=<?php echo $results[0]->cour_Id?>">上分</a></td>
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
