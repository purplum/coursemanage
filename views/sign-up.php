<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>注册 徐汇区逸夫小学俱乐部报名系统</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Template by FreeHTML5.co"/>
    <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive"/>


    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="../favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../themes/css/bootstrap.min.css">
    <link rel="stylesheet" href="../themes/css/animate.css">
    <link rel="stylesheet" href="../themes/css/style.css">
    <script src="../js/jquery-1.11.3.min.js"></script>
    <script src="../themes/layer/layer.js"></script>

    <!-- Modernizr JS -->
    <script src="../js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="../js/respond.min.js"></script>
    <![endif]-->

</head>
<body class="style-3">

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <ul class="menu">
                欢迎使用徐汇区逸夫小学俱乐部报名系统
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 col-md-push-2">


            <!-- Start Sign In Form -->
            <form method="post" action="../actions/registerCheck.php" class="fh5co-form animate-box" data-animate-effect="fadeInRight" onsubmit="return check()" >
                <h2>注册</h2>
<!--                <div class="form-group">-->
<!--                    <div class="alert alert-success" role="alert">Your info has been saved.</div>-->
<!--                </div>-->
                <div class="form-group">
                    <label for="name" class="">姓名：</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="请输入学生姓名" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="studentid" class="">学号：</label>
                    <input type="text" class="form-control" id="studentid" name="studentid" placeholder="请输入学生学号" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="personid" class="">身份证号：</label>
                    <input type="text" class="form-control" id="personid" name="personid" placeholder="请输入学生身份证号码" autocomplete="off">
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="password" class="">密码：</label>-->
<!--                    <input type="text" class="form-control" id="password" name="password" placeholder="输入密码" autocomplete="off"-->
<!--                           onfocus="this.type='password'">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="re-password" class="">再次输入密码：</label>-->
<!--                    <input type="text" class="form-control" id="re_password" placeholder="Re-type Password"-->
<!--                           autocomplete="off" onfocus="this.type='password'" onblur="checkpas()">-->
<!--                    <label id="tishi" style="display: none;color: red;">两次密码输入不一致</label>-->
<!--                    <label id="tishi2" style="display: none;color: green;">√ 两次密码一致</label>-->
<!--                </div>-->
                <div class="form-group">
                    <label for="sgrade" class="">入学年份 (年)：</label>
                    <select class="form-control" name="sgrade" id="sgrade">
                        <option></option>
                        <option>2019</option>
                        <option>2018</option>
                        <option>2017</option>
                        <option>2016</option>
                        <option>2015</option>
                        <option>2014</option>
                        <option>2013</option>
                        <option>2012</option>
                    </select>

<!--                    </input>-->
<!--                    <input type="button"-->
<!--                           class="form-control" id="sgrade" name="sgrade" placeholder="Sgrade">-->
<!--                    <input type="text" class="form-control" id="sgrade" name="sgrade" placeholder="2019" autocomplete="off">-->
                </div>
                <div class="form-group">
                    <label for="sclass" class="">班级：</label>
                    <select class="form-control" name="sclass" >
                        <option ></option>
                        <option >1</option>
                        <option >2</option>
                        <option >3</option>
                        <option >4</option>
                        <option >5</option>
                        <option >6</option>
                    </select>
<!--                    <input type="text" class="form-control" id="sclass" name="sclass" placeholder="所在班级" autocomplete="off">-->
                </div>
                <div class="form-group">
                    <label for="gender" class="">性别：</label>
                    <select class="form-control" name="gender" >
                        <option ></option>
                        <option value ="male">男</option>
                        <option value ="female">女</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="stel" class="">手机号：</label>
                    <input type="text" class="form-control" id="stel" name="stel" placeholder="可选" autocomplete="off">
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="email" class="">邮箱：</label>-->
<!--                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label for="saddress" class="">地址：</label>-->
<!--                    <input type="text" class="form-control" id="saddress" name="saddress" placeholder="Saddress" autocomplete="off">-->
<!--                </div>-->
                <div class="form-group">
                    <p>Already registered? <a href="../login.php">登录</a></p>
                </div>
                <div class="form-group">
                    <input type="submit" id="zhuce" value="注册" class="btn btn-primary">
                </div>
            </form>
            <!-- END Sign In Form -->


        </div>
    </div>
    <div class="row" style="padding-top: 60px; clear: both;">
        <div class="col-md-12 text-center">
            <p>
                <small>&copy; All Rights Reserved. <a href="http://yfxx.xhedu.sh.cn/" target="_blank"
                                                      title="YF course">徐汇区逸夫小学</a></small>
            </p>
        </div>
    </div>
</div>
<script>
    function checkpas() {
        var password = document.getElementById("password").value;
        var repassword = document.getElementById("re_password").value;
        if(password!=repassword){
            document.getElementById("tishi").style.display = "block";
            document.getElementById("tishi2").style.display = "none";
        }else{
            document.getElementById("tishi").style.display = "none";
            document.getElementById("tishi2").style.display = "block";
        }
    }

    function check() {
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        // var password = document.getElementById("password").value;
        // var repassword = document.getElementById("re_password").value;
        console.log(name);
        if (name == "" || name.length == 0) {
            layer.alert("用户名不能为空！");
            return false;
        }
        // if(email ==""||email.length==0){
        //     layer.alert("邮箱不能为空！");
        //     return false;
        // }
        // if(password ==""||password.length==0||repassword==""||repassword.length==0){
        //     layer.alert("密码不能为空！");
        //     return false;
        // }
        // if(document.getElementById("tishi").style.display=="block"){
        //     layer.alert("两次密码输入不一致，请重新输入！");
        //     return false;
        // }
        else {
            return true;
        }
    }
</script>

<!-- jQuery -->
<!--<script src="js/jquery.min.js"></script>-->
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js"></script>
<!-- Placeholder -->
<script src="../js/jquery.placeholder.min.js"></script>
<!-- Waypoints -->
<script src="../js/jquery.waypoints.min.js"></script>
<!-- Main JS -->
<script src="../js/main.js"></script>

</body>
</html>

