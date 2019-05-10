<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>作品列表</title>
		<link rel="shortcut icon" type="image/x-icon" href="Vertical/favicon.ico">
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
		<link href="./public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="./public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="./public/css/ionicons.css" rel="stylesheet" type="text/css">
		<link href="./public/css/simple-line-icons.css" rel="stylesheet" type="text/css">
		<link href="./public/css/jquery.mCustomScrollbar.css" rel="stylesheet">

		<!--bs4 data table-->
		<link href="./public/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		<link href="./public/css/style.css" rel="stylesheet">
		<link href="./public/css/responsive.css" rel="stylesheet">
	</head>

	<body>
		<div class="wrapper">
			<div class="container_full">
				<div class="side_bar scroll_auto">
                	<div class="user-panel">
						<div class="user_image">
							<img src="./public/images/about-1.jpg" class="img-circle mCS_img_loaded" alt="User Image">
						</div>
						<div class="info">
							<p>
								<?=$username;?>
							</p>
						</div>
					</div>
					<ul id="dc_accordion" class="sidebar-menu tree">
						<li class="menu_sub">
							<a href="index.html">
								<span>所有作品</span>
							</a>
						</li>
						<li class="menu_sub">
							<a href="index2.html">
								<span>个人作品</span>
							</a>
						</li>
						<li class="menu_sub">
							<a href="book-create.html">
								<span>作品创建</span>
							</a>
						</li>
					</ul>
				</div>
				<main class="content_wrapper">
					<div class="container-fluid">
						<!-- state start-->
						<div class="row">
							<div class=" col-sm-12">
								<div class="card card-shadow mb-4">
									<div class="card-header">
										<div class="card-title">
											作品
										</div>
									</div>
									<div class="card-body">
										<div class="table-show-hide">
											<strong class="mr-3">切换列:</strong>
											<a class="toggle-vis" data-column="0">书名</a> - <a class="toggle-vis" data-column="1">作者</a> - <a class="toggle-vis" data-column="2">更新时间</a> - <a class="toggle-vis" data-column="3">最新章节</a> - <a class="toggle-vis" data-column="4">是否能编辑</a>
										</div>
										<table id="show-hide" class="display table table-bordered table-striped" cellspacing="0" width="100%">
											<thead>
											<tr>
												<th>书名</th>
												<th>作者</th>
												<th>更新时间</th>
												<th>章节名</th>
												<th>是否能编辑</th>
												<th>编辑</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>修真聊天群</td>
												<td>圣骑士的传说</td>
												<td>2019-01-27</td>
												<td>第2468章 和霸宋号一样绝</td>
												<td>能</td>
												<td>
													<a href="zj.html">编辑</a>
												</td>
											</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- state end-->
					</div>

				</main>
				<!--main contents end-->
			</div>
		</div>
		<script type="text/javascript" src="./public/js/jquery.min.js"></script>
		<script type="text/javascript" src="./public/js/popper.min.js"></script>
		<script type="text/javascript" src="./public/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="./public/js/jquery.mCustomScrollbar.concat.min.js"></script>
		<!--datatables-->
		<script src="./public/js/jquery.dataTables.min.js"></script>
		<script src="./public/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript" src="./public/js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="./public/js/custom.js" type="text/javascript"></script>
		<script>
			$(document).ready(function() {
				var table = $('#show-hide').DataTable({
					"scrollY" : "400px",
					"paging" : false
				});
				$('a.toggle-vis').on('click', function(e) {
					e.preventDefault();
					// Get the column API object
					var column = table.column($(this).attr('data-column'));
					// Toggle the visibility
					column.visible(!column.visible());
				});
			});
		</script>
	</body>

</html>
