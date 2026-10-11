<?php include('app/request.php'); ?>
<!doctype html>
<html lang="<?php echo $lang['lang'] ?>" dir="<?php echo $lang['dir'] ?>">
  <head>
    <meta charset="UTF-8" />
    <title><?php echo $lang['title_site']." - ".$lang['Login'] ?></title>
    <link rel="stylesheet" href="./assets/css/register.css" />
     <meta name="description" content="<?php echo $lang['site_description'] ?>" />
    <meta name="keywords" content="<?php echo $lang['site_keywords'] ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="title" content="<?= $lang['site_title']?>">
    <meta property="og:site_name" content="<?= $lang['site_name']?>"/>
    <meta property="og:image" content="<img src="uploads/images/site/logo.png" />
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta property="og:locale" content="<?php echo $lang['lang'] ?>"/>
    <meta property="og:title" content="<?= $lang['site_title']?>"/>
    <meta property="og:description" content="<?php echo $lang['site_description'] ?>"/>
    <meta property="og:image" content="<img src="uploads/images/site/logo.png"/>
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta name="twitter:site" content="<?= ['site_name']?>"/>
    <meta name="twitter:title" content="<?= $lang['site_title']?>"/> 
    <meta name="twitter:description" content="<?= $lang['site_description']?>"/>
    <meta name="twitter:image" content="<img src="uploads/images/site/logo.png" />
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="uploads/images/site/logo.png">
    <!-- Fontawesome CDN Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="container">
      <div class="forms">
        <div class="form-content">
          <div class="login-form">
            <div class="title"><?php echo $lang['login_to_your_account'] ?></div>
            <form action="" method="POST" onsubmit="return userLoginFunction()">
              <div class="input-boxes">
                <div class="input-box">
                  <i class="fas fa-envelope"></i>
                  <input
                    type="text"
                    name="username"
                    placeholder="<?php echo $lang['enter_your_username'] ?>"
                    id="user_email"
                    required minlength="3" maxlength="255"
                  />
                </div>
                <div class="input-box">
                  <i class="fas fa-lock"></i>
                  <input
                    type="password"
                    name="password"
                    placeholder="<?php echo $lang['enter_your_password'] ?>"
                    id="user_password"
                    required minlength="8" maxlength="255"
                  />
                </div>
                <div class="text"><a href="#"><?php echo $lang['forgot_password'] ?></a></div>
                <div class="button input-box">
                  <input type="submit" name="login_user" value="<?php echo $lang['Login'] ?>" id="submit_btn" />
                </div>
                <div class="text"><p><?php include('app/errors.php'); ?></p></div>
                <div class="text sign-up-text">
                  <?php echo $lang['dont_have_an_account'] ?>
                  <label for="flip"
                    ><a href="register.php"><?php echo $lang['register'] ?></a></label
                  >
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>
