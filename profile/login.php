<?php

require_once '../vendor/autoload.php';

if(isset($_POST['login-btn'])){
    $login = new App\classes\UserLogin();
     $error_txt = $login->userCheck($_POST);
}
if(isset($_SESSION['login-success'])){
    header('location:index.php');
}
?>
<?php 
  session_start();
  include '../languages/langConfig.php';
?>
<?php 
  include ('UserInformation.php');
?>

<!DOCTYPE html>
<html lang="<?php echo $lang['lang'] ?>">

<!-- Mirrored from thevectorlab.net/flatlab-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Jul 2019 15:06:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $siteData['title']?> - <?php echo $lang['Sign-in-page'] ?></title>
    <meta name="keywords" content="<?= $siteData['keywords']?>">
    <meta name="description" content="<?= $siteData['description']?>">
    <meta name="title" content="<?= $siteData['title']?>">
    <meta property="og:site_name" content="<?= $siteData['nsite']?>"/>
    <meta property="og:image" content="<img src="uploads/<?= $siteData['icon']?>" />
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta property="og:locale" content="<?php echo $lang['lang'] ?>"/>
    <meta property="og:title" content="<?= $siteData['title']?>"/>
    <meta property="og:description" content="<?= $siteData['description']?>"/>
    <meta property="og:image" content="<img src="uploads/<?= $siteData['icon']?>"/>
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta name="twitter:site" content="<?= $siteData['nsite']?>"/>
    <meta name="twitter:title" content="<?= $siteData['tiyle']?>"/> 
    <meta name="twitter:card" content="<?= $siteData['icon']?>">
    <meta name="twitter:description" content="<?= $siteData['description']?>"/>
    <meta name="twitter:image" content="<img src="uploads/<?= $siteData['icon']?>" />
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="<?= $siteData['sitelink']?>"/>
	<meta name="google-site-verification" content="Wq-n-QaxUP6b3GbKML3-IfS6tPC3lK5rHmsxmuMAktw"/>
    <link rel="shortcut icon" href="<?= $siteData['icon']?>">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6116353004302810"
     crossorigin="anonymous"></script>
</head>

  <body class="login-body" dir="<?php echo $lang['dir'] ?>">

    <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading"><?php echo $lang['Login-now'] ?></h2>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="<?php echo $lang['username'] ?>" autofocus name="username">
            <input type="hidden" class="form-control" value="<?php echo UserInfo::get_ip();?>" name="ip">
            <input type="hidden" class="form-control" value="<?php echo UserInfo::get_os(); ?>" name="os">
            <input type="hidden" class="form-control" value="<?php echo UserInfo::get_device(); ?>" name="de">
            <input type="hidden" class="form-control" value="<?php echo UserInfo::get_browser();?>" name="bro">
            <input type="password" class="form-control" placeholder="<?php echo $lang['password'] ?>" name="password">
            <label class="checkbox">
                <input type="checkbox"  name="keep"> <?php echo $lang['remember-me'] ?>
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"><?php echo $lang['Did-you-forget-the-password?'] ?></a>
                </span>
            </label>
            <input type="submit" value="<?php echo $lang['Login'] ?>" name="login-btn" class="btn btn-lg btn-login btn-block" >
            <p style="color: red;"><?= isset($error_txt) ? $error_txt : ''?></p>
        </div>
      </form>
       <a href="signup/index.php" class="">Login</a>

    </div>
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo $lang['Did-you-forget-the-password?'] ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo $lang['Enter-your-email-address-below-to-reset-your-password'] ?></p>
                    <input type="text" name="email" placeholder="<?php echo $lang['email'] ?>" autocomplete="off" class="form-control placeholder-no-fix">

                </div>
                <div class="modal-footer">
                    <button data-dismiss="modal" class="btn btn-default" type="button"><?php echo $lang['Cancel'] ?></button>
                    <button class="btn btn-success" type="button"><?php echo $lang['send'] ?></button>
                </div>
            </div>
        </div>
    </div>
  <center>
  	<ul>
                    <li class="nav-item">
                    	<?php echo $lang['The-language'] ?>
                    <ul>
                            <?php 
  include '../language.php';
?>
                         </ul>
                        </li>
 </ul>
  </center>
    <!-- modal -->
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

  </body>

</html>
