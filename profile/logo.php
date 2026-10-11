<?php require_once 'header.php'?>
<?php
    use App\classes\Site;
    use App\classes\Session;
    $ob = Site::display();
    $siteData = mysqli_fetch_assoc($ob);

?>
<h3 style="display: inline-block">Update logo and Footer</h3> <span style="color: red;margin-left: 30px;font-size: 18px"><?= Session::get("extNotmatch")?></span>
<span style="color: green;margin-left: 30px;font-size: 18px"><?= Session::get("updatesite")?></span>
<hr>
<div class="row">
    <div class="col-md-6">
        <form action="update.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for=""><?php echo $lang['Site-address'] ?></label>
                <input type="text" class="form-control" name="title" value="<?=$siteData['title'] ?>">
            </div>
              <div class="form-group">
                <label for=""><?php echo $lang['Name-of-the-site'] ?></label>
                <input type="text" class="form-control" name="nsite" value="<?=$siteData['nsite'] ?>">
            </div>
            <div class="form-group">
                <label for=""><?php echo $lang['Tagged'] ?></label>
                <input type="text" class="form-control" name="keywords" value="<?=$siteData['keywords'] ?>">
            </div>
            <div class="form-group">
                <label for=""><?php echo $lang['Description-of-the-site'] ?></label>
                <input type="text" class="form-control" name="description" value="<?=$siteData['description'] ?>">
            </div>
              <div class="form-group">
                <label for=""><?php echo $lang['Site-link'] ?></label>
                <input type="text" class="form-control" name="sitelink" value="<?=$siteData['sitelink'] ?>">
            </div>
              <div class="form-group">
                <label for=""><?php echo $lang['My-email-site'] ?></label>
                <input type="text" class="form-control" name="emailsite" value="<?=$siteData['emailsite'] ?>">
            </div>
              <div class="form-group">
                <label for=""><?php echo $lang['Website-phone-number'] ?></label>
                <input type="text" class="form-control" name="webnumber" value="<?=$siteData['webnumber'] ?>">
            </div>
              <div class="form-group">
                <label for=""><?php echo $lang['Country'] ?></label>
                <input type="text" class="form-control" name="Country" value="<?=$siteData['Country'] ?>">
            </div>
            <div class="form-group">
                <label for=""><?php echo $lang['footer-txt'] ?></label>
                <input type="text" class="form-control" name="footer-txt" value="<?=$siteData['footer'] ?>">
            </div>
            <div class="form-group">
                <label for=""><?php echo $lang['The-number-of-posts-you-want'] ?></label>
                <input type="text" class="form-control" name="post" value="<?=$siteData['postdisplay'] ?>">
            </div>
            <div class="form-group">
            	<label for=""><?php echo $lang['add-ads'] ?></label>
            <textarea name="addads" colos="600" rows="10">
<?=$siteData['addads'] ?></textarea>
              </div>
              <div class="form-group">
            	<label for=""><?php echo $lang['add-ads'] ?></label>
            <textarea name="addadsd" colos="600" rows="10">
<?=$siteData['addadsd'] ?></textarea>
              </div>
              <div class="form-group">
            	<label for=""><?php echo $lang['add-ads'] ?></label>
            <textarea name="addadsf"  rows="4">
<?=$siteData['addadsf']?></textarea>
              </div>
            <div class="form-group">
                <label for=""><?php echo $lang['logo'] ?></label>
                <input type="file" class="form-control" name="logo">
            </div>
            <div class="form-group">
                <label for=""><?php echo $lang['Site-icon'] ?></label>
                <input type="url" class="form-control" name="icon">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="site-btn" value="Update">
            </div>
        </form>
    </div>
    <div class="col-md-6 align-self-center text-center">
        <div class="img-box bg-primary" style="display: inline-block">
            <img src="../uploads/<?=$siteData['logo']?>" alt="" class="img-fluid">
        </div>
    </div>
    <!-- end container-fluid -->
    <div class="col-md-6 align-self-center text-center">
        <div class="img-box bg-primary" style="display: inline-block">
            <img src="<?=$siteData['icon']?>" alt="" class="img-fluid">
        </div>
    </div>
    <!-- end container-fluid -->
    	
</div>
</div>
<?php
Session::unsetSession('extNotmatch');
Session::unsetSession('updatesite');
?>
<?php require_once 'footer.php'?>
