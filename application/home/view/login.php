<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>携手作者网-登录</title>
    <link rel="shortcut icon" type="image/x-icon" href="Vertical/favicon.ico">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
    <link href="./public/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="./public/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="./public/css/ionicons.css" rel="stylesheet" type="text/css">
    <link href="./public/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="./public/css/jquery.mCustomScrollbar.css" rel="stylesheet">
    <link href="./public/css/style.css" rel="stylesheet">
    <link href="./public/css/responsive.css" rel="stylesheet">
</head>

<body class="bg_darck">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-form">
                    <form action="?c=login&a=index" method="post">
                        <div class="form-group">
                            <label>邮箱地址</label>
                            <input type="email" class="form-control" name="email" placeholder="邮箱地址">
                        </div>
                        <div class="form-group">
                            <label>密码</label>
                            <input type="password" class="form-control" name="password" placeholder="密码">
                        </div>
<!--                        <div class="checkbox">-->
<!--                            <label>-->
<!--                                <input type="checkbox"> 记住我-->
<!--                            </label>-->
<!--                        </div>-->
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">登录</button>
                        <div class="register-link m-t-15 text-center">
                            <p>没有账号？
                                <a href="?c=register&a=index"> 注册</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="./public/js/jquery.min.js"></script>
    <script type="text/javascript" src="./public/js/popper.min.js"></script>
    <script type="text/javascript" src="./public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./public/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="./public/js/custom.js" type="text/javascript"></script>
</body>

</html>
