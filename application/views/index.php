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
        <?php include 'header.php'?>
		
		<div class="admin">
            <?php include 'nav.php'?>
            <div class="content-page">
                <div class="content">
                    <table class="am-table .am-table-bordered">
                        <thead>
                        <tr>
                            <th>课程名称</th>
                            <th>日期</th>
                            <th>时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $Count = 0?>
                        <?php foreach($courses as $course){ ++$Count?>
                            <tr <?php if($Count % 2) echo 'class="am-primary"'?>>
                                <td><?php echo $course -> cour_Name?></td>
                                <td><?php echo $course -> cour_Credit?></td>
                                <td><?php echo $course -> cour_Class?></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
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
                    <?php foreach ($results as $result){
                        $time = time();
                        $d=date("y-m-d",$time);
                        if($result->kaoshi-$d==1||$result->kaoshi-$d==0)?>
                            <p style="color: red">您近期有一门考试<?php echo $result->cour_Name?>，请注意查看考试时间</p>
                    <?php }?>
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
