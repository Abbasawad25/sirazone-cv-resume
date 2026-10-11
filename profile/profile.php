<?php require_once 'header.php';
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
?>
<?php

$username = $_SESSION['username'];

?>

<div class="row">
    <aside class="profile-nav col-lg-3">
        <section class="card">
            <div class="user-heading round">
                <a href="">
                    <img src="../uploads/images/users/<?= isset($ro['image']) ? $ro['image'] : ''?>" alt="">
                </a>
                <h1><?=  $ro['name'] ?></h1>
                <p><?= $ro['email'] ?></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
                <li class="active nav-item"><a class="nav-link" href="profile.php"> <i class="fa fa-user"></i><?php echo $lang['Profile'] ?></a></li>
                <li class="nav-item"><a class="nav-link" href="editprofile.php"> <i class="fa fa-edit"></i><?php echo $lang['Edit-Profile'] ?></a></li>
            </ul>

        </section>
    </aside>
    <aside class="profile-info col-lg-9">
        <section class="card">
            <div class="bio-graph-heading">
                <?= isset($ro['summary']) ? $ro['summary'] : ''?>
            </div>
            <div class="card-body bio-graph-info">
                <h1><?php echo $lang['Your-information'] ?></h1>
                <div class="row">
                    <div class="bio-row">
                        <p><span><?php echo $lang['name'] ?></span>: <?= $ro['name'] ?></p>
                    </div>
                    
                    <div class="bio-row">
                        <p><span><?php echo $lang['Countrys'] ?></span><?= isset($ro['country']) ? $ro['country'] : ''?></p>
                    </div>
                    <div class="bio-row">
                        <p><span><?php echo $lang['Join-Date'] ?></span>: <?= $ro['date'] ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span><?php echo $lang['organic'] ?></span>:
                            <?php
                            if($ro['type'] == 1){
                                echo $lang['pro'];
                            }else{
                                echo $lang['free'];
                            }
                            ?>
                        </p>
                    </div>
                    <div class="bio-row">
                        <p><span><?php echo $lang['email'] ?></span>: <?= $ro['email'] ?></p>
                    </div>
                    <div class="bio-row">
                        <p><span><?php echo $lang['dates'] ?></span>: <?= $ro['birth'] ?></p>
                    </div>                   
                    <div class="bio-row">
                        <p><span><?php echo $lang['Telephone-number'] ?></span><?= $ro['number']?></p>
                    </div>
                    <div class="bio-row">
                        <p><span><?php echo $lang['username'] ?></span>:  <?= $ro['username'] ?></p>
                    
                  </div>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="bio-chart">
                                <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="35" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; appearance: none;"></div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="red">Abbasawad25.epizy.com</h4>
                                <p><?php echo $lang['I-started:-July'] ?></p>
                                <p><?php echo $lang['Deadline:-August'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="bio-chart">
                                <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" value="63" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; background: none; font: bold 20px Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; appearance: none;"></div>
                            </div>
                            <div class="bio-desk">
                                <h4 class="terques">ThemeForest CMS </h4>
                                <p><?php echo $lang['I-started:-July'] ?></p>
                                <p><?php echo $lang['Deadline:-August'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
</div>
<?php require_once 'footer.php'?>
