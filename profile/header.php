<?php
//require_once '../vendor/autoload.php';
@include('../app/config.php'); 
//require_once("../languages/langConfig.php");
 if(!isset($_SESSION['username'])) {
header('Location: ../login.php');
}  else{
    $uname=$_SESSION['username'];
    $desired_dir="files/$uname/";
}
$ro = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users where username='".$_SESSION['username']."';"));

        

$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
        


$title = '';
if($page == 'index.php'){
    $title = 'Home';
}elseif($page == 'addcategory.php' || $page == 'managecategory.php'){
    $title = '';
}
elseif($page == 'addpost.php' || $page == 'managepost.php'){
    $title = 'Post';
}
elseif($page == 'adduser.php' || $page =='manageuser.php'){
    $title = 'User';
}
elseif($page == 'inbox.php' || $page =='sentmail.php' || $page =='draft.php' || $page =='strash.php'){
    $title = 'Mail';
}
elseif($page == 'logo.php' || $page =='social.php'){
    $title = 'Site Identity';
}
else{
    $title = 'Home';
}

?>
<?php 
  include '../languages/langConfig.php';
?>

<!DOCTYPE html>
<html lang="<?php echo $lang['lang'] ?>">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title><?= $lang['admin-panel'] . '  ' . $siteData['title']?></title>
    <meta name="keywords" content="<?= $siteData['keywords']?>">
    <meta name="description" content="<?= $siteData['description']?>">
    <meta name="title" content="<?= $siteData['title']?>">
    <meta property="og:site_name" content="<?= $siteData['nsite']?>"/>
    <meta property="og:image" content="<img src="uploads/<?//= $siteData['icon']?>" />
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta property="og:locale" content="<?php echo $lang['lang'] ?>"/>
    <meta property="og:title" content="<?//= $siteData['title']?>"/>
    <meta property="og:description" content="<?//= $siteData['description']?>"/>
    <meta property="og:image" content="<img src="uploads/<?//= $siteData['icon']?>"/>
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta name="twitter:site" content="<?//= ['nsite']?>"/>
    <meta name="twitter:title" content="<?//= //$siteData['tiyle']?>"/> 
    <meta name="twitter:card" content="<?//= //$siteData['icon']?>">
    <meta name="twitter:description" content="<?//= //$siteData['description']?>"/>
    <meta name="twitter:image" content="<img src="uploads/<?//= //$siteData['icon']?>" />
    <meta property="og:image:width" content="180"/>
    <meta property="og:image:height" content="50"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:url" content="<?= $siteData['sitelink']?>"/>
	<meta name="google-site-verification" content="Wq-n-QaxUP6b3GbKML3-IfS6tPC3lK5rHmsxmuMAktw"/>
    <link rel="shortcut icon" href="<?= $siteData['icon']?>">
    <!--  summernote -->
    <link href="assets/summernote/dist/summernote.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <!--dynamic table-->
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />
    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-6116353004302810"
     crossorigin="anonymous"></script>
</head>

<body>

<section id="container">
    <!--header start-->
    <header class="header white-bg">
        <div class="sidebar-toggle-box">
            <i class="fa fa-bars"></i>
        </div>
        <!--logo start-->
        <a href="index.php" class="logo"><span><?php echo $lang['site_name']; ?></span></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
            <ul class="nav top-menu">
                <!-- settings start -->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-tasks"></i>
                        <span class="badge badge-success">6</span>
                    </a>
                    <ul class="dropdown-menu extended tasks-bar">
                        <div class="notify-arrow notify-arrow-green"></div>
                        <li>
                            <p class="green"><?php echo $lang['You-have-6-hanging-tasks'] ?></p>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc"><?php echo $lang['Dashboard-V1.3'] ?></div>
                                    <div class="percent">40%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                        <span class="sr-only">Macro-success-45%</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc"><?php echo $lang['Update-database'] ?></div>
                                    <div class="percent">60%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        <span class="sr-only"><?php echo $lang['Macro-30-Danger'] ?></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc">Phone-developer</div>
                                    <div class="percent">87%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 87%">
                                        <span class="sr-only">النجاح</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc"><?php echo $lang['mobileapplication'] ?></div>
                                    <div class="percent">33%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 33%">
                                        <span class="sr-only"><?php echo $lang['Macro-30-Danger'] ?></span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div class="desc"><?php echo $lang['Dashboard-V1.3'] ?></div>
                                    <div class="percent">45%</div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                        <span class="sr-only">Complete-47%</span>
                                    </div>
                                </div>

                            </a>
                        </li>
                        <li class="external">
                            <a href="#"><?php echo $lang['See-all-tasks'] ?></a>
                        </li>
                    </ul>
                </li>
                <!-- settings end -->
                <!-- inbox dropdown start-->
                <li id="header_inbox_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge badge-danger">mail</span>
                    </a>
                    <ul class="dropdown-menu extended inbox">
                        <div class="notify-arrow notify-arrow-red"></div>
                        <li>
                            <p class="red"><?php echo $lang['You-have-a'] ?><?//= Mail::countNewMail() ?> <?php echo $lang['New-messages'] ?></p>
                        </li>
                        
                       
                        <li>
                            <a href="">
                                <span class="photo"><img alt="avatar" src="img/avatar-mini.jpg"></span>
                                <span class="subject">
                                    <?= $m['subject']?>
                                </span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="inbox.php"><?php echo $lang['See-all-messages'] ?></a>
                        </li>
                    </ul>
                </li>
                <!-- inbox dropdown end -->
                <!-- notification dropdown start-->
                <li id="header_notification_bar" class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-bell-o"></i>
                        <span class="badge badge-warning">7</span>
                    </a>
                    <ul class="dropdown-menu extended notification">
                        <div class="notify-arrow notify-arrow-yellow"></div>
                        <li>
                            <p class="yellow"><?php echo $lang['You-have-7-new-notifications'] ?></p>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                <?php echo $lang['Server-number-3-busy'] ?>
                                <span class="small italic"><?php echo $lang['34-minutes'] ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-warning"><i class="fa fa-bell"></i></span>
                                <?php echo $lang['Server-No-10-is-not-responded'] ?>
                                <span class="small italic"><?php echo $lang['1-hour'] ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                <?php echo $lang['The-damage-database'] ?>
                                <span class="small italic"><?php echo $lang['Four-hours'] ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-success"><i class="fa fa-plus"></i></span>
                                <?php echo $lang['New-User-Recorder'] ?>
                                <span class="small italic"><?php echo $lang['In-this-moment'] ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="label label-info"><i class="fa fa-bullhorn"></i></span>
                                <?php echo $lang['Error-in-the-application'] ?>
                                <span class="small italic"><?php echo $lang['Ten-minutes'] ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="#"><?php echo $lang['See-all-notices'] ?></a>
                        </li>
                    </ul>
                </li>
                <!-- notification dropdown end -->
            </ul>
            <!--  notification end -->
        </div>
        <div class="top-nav ">
            <!--search & user info start-->
            <ul class="nav pull-right top-menu">
                <li>
                    <input type="text" class="form-control search" placeholder="<?php echo $lang['Search'] ?>">
                </li>
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="../uploads/images/users/<?echo $ro['image'];?>" style="width: 35px">
                        <span class="username"><?= isset($_SESSION['username']) ? $_SESSION['username'] : '' ;?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout dropdown-menu-right">
                        <div class="log-arrow-up"></div>
                        <li><a href="profile.php"><i class=" fa fa-suitcase"></i><?php echo $lang['Profile'] ?></a></li>
                        <li><a href="#"><i class="fa fa-cog"></i><?php echo $lang['setting'] ?></a></li>
                        <li><a href="#"><i class="fa fa-bell-o"></i><?php echo $lang['Notice'] ?></a></li>
                        <li><a href="logout.php"><i class="fa fa-key"></i><?php echo $lang['Log-out'] ?></a></li>
                    </ul>
                </li>
                <li class="sb-toggle-right">
                    <i class="fa  fa-align-right"></i>
                </li>
                <!-- user login dropdown end -->
            </ul>
            <!--search & user info end-->
        </div>
    </header>
    <!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a  href="index.php" <?= $page == 'index.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-dashboard"></i>
                        <span><?php echo $lang['admin-panel'] ?></span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == '../resume.php' ? 'class="active"' : '' ?> <?= $page == '../template/pro.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-shield"></i>
                        <span><?php echo $lang['created-resume'] ?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == '../resume.php' ? 'class="active"' : '' ?>><a  href="../resume.php"><?php echo $lang['Add-resume-pro'] ?></a></li>
                        <li <?= $page == 'pro.php' ? 'class="active"' : '' ?>><a  href="../template/pro.php"><?php echo $lang['Add-resume-low'] ?></a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'free.php' ? 'class="active"' : '' ?> <?= $page == 'pro.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-shield"></i>
                        <span><?php echo $lang['template'] ?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'free.php' ? 'class="active"' : '' ?>><a  href="free.php"><?php echo $lang['template_free'] ?></a></li>
                        <li <?= $page == 'pro.php' ? 'class="active"' : '' ?>><a  href="pro.php"><?php echo $lang['template_pro'] ?></a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'about_section.php' ? 'class="active"' : '' ?> <?= $page == 'achievements.php' ? 'class="active"' : '' ?> <?= $page == 'manage_achievements.php' ? 'class="active"' : '' ?><?= $page == 'experience.php' ? 'class="active"' : '' ?><?= $page == 'manage_experience.php' ? 'class="active"' : '' ?><?= $page == 'education.php' ? 'class="active"' : '' ?><?= $page == 'manage_education.php' ? 'class="active"' : '' ?><?= $page == 'projects.php' ? 'class="active"' : '' ?><?= $page == 'manage_projects.php' ? 'class="active"' : '' ?><?= $page == 'skills.php' ? 'class="active"' : '' ?><?= $page == 'manage_skills.php' ? 'class="active"' : '' ?>>
                        <i class="fa fa-shield"></i>
                        <span><?php echo $lang['created-resume'] ?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'about_section.php' ? 'class="active"' : '' ?>><a  href="about_section.php"><?php echo $lang['about_section'] ?></a></li>
                        <li <?= $page == 'achievements.php' ? 'class="active"' : '' ?>><a  href="achievements.php"><?php echo $lang['achievements'] ?></a></li>
                        <li <?= $page == 'manage_achievements.php' ? 'class="active"' : '' ?>><a  href="manage_achievements.php"><?php echo $lang['manage_achievements'] ?></a></li>
                        <li <?= $page == 'experience.php' ? 'class="active"' : '' ?>><a  href="experience.php"><?php echo $lang['experience'] ?></a></li>
                        <li <?= $page == 'manage_experience.php' ? 'class="active"' : '' ?>><a  href="manage_experience.php"><?php echo $lang['manage_experience'] ?></a></li>
                        <li <?= $page == 'education.php' ? 'class="active"' : '' ?>><a  href="education.php"><?php echo $lang['education'] ?></a></li>
                        <li <?= $page == 'manage_education.php' ? 'class="active"' : '' ?>><a  href="manage_education.php"><?php echo $lang['manage_education'] ?></a></li>
                        <li <?= $page == 'projects.php' ? 'class="active"' : '' ?>><a  href="projects.php"><?php echo $lang['projects'] ?></a></li>
                        <li <?= $page == 'manage_projects.php' ? 'class="active"' : '' ?>><a  href="manage_projects.php"><?php echo $lang['manage_projects'] ?></a></li>
                        <li <?= $page == 'skills.php' ? 'class="active"' : '' ?>><a  href="skills.php"><?php echo $lang['skills'] ?></a></li>
                        <li <?= $page == 'manage_skils.php' ? 'class="active"' : '' ?>><a  href="manage_skills.php"><?php echo $lang['manage_skills'] ?></a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == '../job-suggestion/search-for-job.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-thumb-tack"></i>
                        <span><?php echo $lang['Jobs-and-skills'] ?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == '../search-for-job.php' ? 'class="active"' : '' ?>><a  href="../search-for-job.php"><?php echo $lang['looking-for-job'] ?></a></li>      
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'organic.php' ? 'class="active"' : '' ?> <?= $page == 'manage_organic.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-shield"></i>
                        <span><?php echo $lang['organic'] ?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'organic.php' ? 'class="active"' : '' ?>><a  href="organic.php"><?php echo $lang['add_organic'] ?></a></li>
                        <li <?= $page == 'manage_organic.php' ? 'class="active"' : '' ?>><a  href="manage_organic.php"><?php echo $lang['manage_organic'] ?></a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'setting.php' ? 'class="active"' : '' ?> >
                        <i class="fa fa-shield"></i>
                        <span><?php echo $lang['setting'] ?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'setting.php' ? 'class="active"' : '' ?>><a  href="setting.php"><?php echo $lang['setting'] ?></a></li>
                        
                    </ul>
                </li>
                <!-- لغة lang -->
               </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == '?lang=ar' ? 'class="active"' : '' ?> <?= $page == '?lang=en' ? 'class="active"' : '' ?> >
                        <i class="fa fa-thumb-tack"></i>
                        <span><?php echo $lang['The-language'] ?></span>
                    </a>
                    <ul class="sub">
                        <?php 
  include 'language.php';
                         ?>
                    </ul>
                </li>
                <!-- adduser only admin -->
                <?php
                if($ro['role'] == 1){ ?>
                    <li class="sub-menu">
                        <a href="javascript:;" <?= $page == 'adduser.php' ? 'class="active"' : '' ?> <?= $page == 'manageuser.php' ? 'class="active"' : '' ?> >
                            <i class="fa fa-users"></i>
                            <span><?php echo $lang['Users'] ?></span>
                        </a>
                        <ul class="sub">
                            <li <?= $page == 'adduser.php' ? 'class="active"' : '' ?>><a  href="adduser.php"><?php echo $lang['add-User'] ?></a></li>
                            <li <?= $page == 'manageuser.php' ? 'class="active"' : '' ?>><a  href="manageuser.php"><?php echo $lang['Manage-users'] ?></a></li>
                        </ul>
                    </li>
                
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'inbox.php' ? 'class="active"' : '' ?> <?= $page == 'draft.php' ? 'class="active"' : '' ?> <?= $page == 'trash.php' ? 'class="active"' : '' ?><?= $page == 'sentmail.php' ? 'class="active"' : '' ?>>
                        <i class="fa fa-envelope-o"></i>
                        <span><?php echo $lang['email'] ?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'inbox.php' ? 'class="active"' : '' ?> <?= $page == 'draft.php' ? 'class="active"' : '' ?> <?= $page == 'trash.php' ? 'class="active"' : '' ?><?= $page == 'sentmail.php' ? 'class="active"' : '' ?>><a  href="inbox.php" ><?php echo $lang['Manage-Mail'] ?></a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" <?= $page == 'logo.php' ? 'class="active"' : '' ?> <?= $page == 'social.php' ? 'class="active"' : '' ?> >
                        <i class="fa  fa-globe"></i>
                        <span><?php echo $lang['Information-on-site'] ?></span>
                    </a>
                    <ul class="sub">
                        <li <?= $page == 'logo.php' ? 'class="active"' : '' ?>><a  href="logo.php"><?php echo $lang['Logo-and-appendix'] ?></a></li>
                        <li <?= $page == 'social.php' ? 'class="active"' : '' ?>><a  href="social.php"><?php echo $lang['Social-media'] ?></a></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">