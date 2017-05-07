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
	                <a href="index.html" class="logo"><span>线上瑜伽生活馆</span></a>
	            </div>
	            
	            <div class="m-t-40 card-box">
	            	<div class="text-center">
	                    <h4 class="text-uppercase font-bold m-b-0">Login</h4>
	                </div>
	                <div class="panel-body">
	                	<form class="am-form" method="post" action="welcome/check_login">
	                		<div class="am-g">
	                			<div class="am-form-group">
							      <input type="text" class="am-radius"  placeholder="输入用户账号" name="username">
							    </div>
							
							    <div class="am-form-group form-horizontal m-t-20">
							      <input type="password" class="am-radius"  placeholder="输入密码" name="password">
							    </div>
		                        
		                        <div class="am-form-group ">
		                        	<button type="submit" class="am-btn am-btn-primary am-radius" style="width: 100%;height: 100%;">登录</button>
		                        </div>
								<div class="am-form-group ">
									<a href="student/reg" class="text-muted"><i class="fa fa-lock m-r-5"></i> 注册（学员）</a>
									<a href="teacher/t_reg" class="text-muted"><i class="fa fa-lock m-r-5"></i> 注册（教师）</a>
								</div>

	                		</div>

	                	</form>
							
	                </div>
	            </div>
			</div>
		</div>
	</body>
</html>
