<?php include('app/request.php'); ?>
<!doctype html>
<html lang="<?php echo $lang['lang'] ?>" dir="<?php echo $lang['dir'] ?>">
  <head>
    <meta charset="UTF-8" />
    <title><?php echo $lang['title_site'].  " - ". $lang['register'] ?></title>
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
    <link rel="stylesheet" href="./assets/css/login.css" />
    
  </head>
  <body>
    <div class="container">
      <div class="title"><?php echo $lang['register'] ?> </div>
      
      <div class="content">
        <form action="" method="POST" onsubmit="return registerForm()">
          <div class="user-details">
            <div class="input-box">
              <span class="details"><?php echo $lang['full_name'] ?></span>
              <input id="full_name" type="text" name="name" laceholder="<?php echo $lang['enter_your_name'] ?>" required minlength="3" maxlength="255"/>
            </div>
            <div class="input-box">
              <span class="details"><?php echo $lang['username'] ?></span>
              <input
                id="user_name"
                type="text"
                name="username"
                placeholder="<?php echo $lang['enter_your_username'] ?>"
                required minlength="4" maxlength="50"
              />
            </div>
            <div class="input-box">
              <span class="details"><?php echo $lang['email'] ?></span>
              <input id="email" type="text" name="email" placeholder="<?php echo $lang['enter_your_email'] ?>" required minlength="8" maxlength="255"/>
            </div>
            <div class="input-box">
              <span class="details"><?php echo $lang['phone_number'] ?></span>
              <input
                id="phone_number"
                type="number"
                name="number"
                placeholder="<?php echo $lang['enter_your_number'] ?>"
              />
            </div>
            <div class="input-box">
              <span class="details"><?php echo $lang['password'] ?></span>
              <input
                id="password"
                type="text"
                name="password"
                placeholder="<?php echo $lang['enter_your_password'] ?>"
                required minlength="8" maxlength="255"
              />
            </div>
            <div class="input-box">
              <span class="details"><?php echo $lang['confirm_password'] ?></span>
              <input
                id="confirm_password"
                type="text"
                name="confirm_password"
                placeholder="<?php echo $lang['confirm_password'] ?>"
                required minlength="8" maxlength="255"
              />
            </div>
          </div>
          <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" />
            <input type="radio" name="gender" id="dot-2" />
            <input type="radio" name="gender" id="dot-3" />
            <span class="gender-title"></span>
            <div class="category">
              <label for="dot-1">
             
                <span class="gender"><?php include('app/errors.php'); ?></span>
              </label>
           
            </div>
          </div>
          <div class="button">
            <input type="submit" name="reg_user" value="<?php echo $lang['register'] ?>" />
          </div>
        </form>
      </div>
    </div>
    <script src="./assets/css/script.js"></script>
  </body>
</html>
