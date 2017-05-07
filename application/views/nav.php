<!-- sidebar start -->
<div class="admin-sidebar am-offcanvas  am-padding-0" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar">
        <!-- User -->
        <div class="user-box am-hide-sm-only">
            <div class="user-img">
                <img src="assets/img/avatar-1.jpg" alt="user-img" title="Mat Helme" class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="am-icon-dot-circle-o" aria-hidden="true"></i></div>
            </div>
            <h5><a href="#"><?php echo $student -> stud_Name?></a> </h5>
            <ul class="list-inline">
                <li>
                    <a href="#">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </a>
                </li>

                <li>
                    <a href="#" class="text-custom">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
        <!-- End User -->

        <ul class="am-list admin-sidebar-list">
            <li><a href="student/index"><span class="am-icon-home"></span> 首页</a></li>
            <li><a href="student/select_course"><span class="am-icon-table"></span> 选课中心</a></li>
            <li><a href="student/s_kaoshi"><span class="am-icon-table"></span> 我的考试</a></li>
            <li><a href="student/s_news"><span class="am-icon-table"></span> 当今时事</a></li>
            <li><a href="student/s_miji"><span class="am-icon-table"></span> 独家秘籍</a></li>
            <li><a href="student/s_gread"><span class="am-icon-table"></span> 成绩查询</a></li>
            <li><a href="student/modify_password"><span class="am-icon-table"></span> 个人信息</a></li>
            <li><a href="student/logout"><span class="am-icon-file"></span> 退出</a></li>
        </ul>
    </div>
</div>
<!-- sidebar end -->