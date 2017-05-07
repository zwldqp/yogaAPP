<?php
$student = $this -> session -> userdata('student');
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
    <?php include 'nav.php'?>
    <div class="content-page">
        <div class="content">
            <table class="am-table am-table-bordered am-table-radius am-table-striped">
                <thead>
                <tr>
                    <th>课程名称</th>
                    <th>任课教师</th>
                    <th>课程学分</th>
                    <th>课程课时</th>
                    <th>选课</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($course as $value){?>
                    <tr>
                        <td><?php echo $value->cour_Name?></td>
                        <td><a href="student/teac?id=<?php echo $value->teac_Id?>"><?php echo $value->teac_Name?></a></td>
                        <td><?php echo $value->cour_Credit?></td>
                        <td><?php echo $value->cour_Class?></td>
                        <td>
                            <?php if(isset($res[$value -> teco_Id])){ ?>
                                <a href="student/del_select?id=<?php echo $res[$value -> teco_Id] -> seco_Id?>"><?php echo "退选"?></a>
                            <?php }else{?>
                                <a href="student/do_select?id=<?php echo $value -> teco_Id?>"><?php echo "选课"?></a>
                            <?php }?>
                        </td>
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
