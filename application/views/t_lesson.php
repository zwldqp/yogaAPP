<?php $name = $this->session->userdata('logindata'); ?>
<!doctype html>
<html>
<head>
    <base href="<?php echo site_url() ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ZN在线教育</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <script src="assets/js/echarts.min.js"></script>
    <!--    <link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
    <style>
        .lesson{
            width: 25%;
            height: 300px;
            border:1px solid;
            float: left;
            margin-right:10px;
            margin-bottom:10px;
            text-align: center;
        }
        .lesson img{
            margin:0 5%;
            height: 250px;
            width: 90%;
        }
    </style>
</head>
<body data-type="index">
<?php include "t_header.php" ?>
<div class="tpl-page-container tpl-page-header-fixed">
    <?php include "t_nav.php"?>
    <div class="tpl-content-wrapper">
        <div class="lesson-container" style="width: 80%; margin: 0 auto">
            <ul class="am-nav am-nav-pills am-nav-justify" style="height: 60px;">
                <li class="am-active"><a href="javascript:;">已上传的课程</a></li>
                <li><a href="teacher/t_up_lesson">上传课程</a></li>
            </ul>
            <div class="lesson-content">
                    <?php foreach ($results as $result){ ?>
                        <div class="lesson">
                            <a href="teacher/video_begin?course=<?php echo  $result->cour_Id?>"><img src="<?php echo $result->pict_Url?>" alt="<?php echo $result->cour_Name?>"></a>
                            <Videos></Videos>
                            <p><?php echo $result->cour_Name?>
                                学分：<?php echo $result->cour_Credit?>学分</p>
                        </div>
                    <?php }?>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/iscroll.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>