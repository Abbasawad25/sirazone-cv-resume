<?php require_once 'header.php'?>
<?php
    use App\classes\Site;
    use App\classes\Session;
    $ob = Site::displayAddads();
    $siteData = mysqli_fetch_assoc($ob);

?>
<h3 style="display: inline-block">إدارة الإعلانات</h3> <span style="color: red;margin-left: 30px;font-size: 18px"><?= Session::get("extNotmatch")?></span>
<span style="color: green;margin-left: 30px;font-size: 18px"><?= Session::get("updatesite")?></span>
<hr>
<div class="row">
    <div class="col-md-6">
        <form action="update.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="adshome">
				<div class="ads">
						<div class="adsname">
							<span>إعلان تحت الشعار</span>
						</div>
							<div>
						<textarea name="ads1" id="" class="form-control" cols="30" rows="10" value="<?=$siteData['ads1'] ?>"></textarea>
						<div>
							<div class="adsname">
							<span>إعلان بين المقالات</span>
						</div>
							<div class="adscode">
						<textarea name="ads2" id="" class="form-control" cols="30" rows="10" value="<?=$siteData['ads2'] ?>"></textarea>
						<div>
							<div class="adsname">
							<span>إعلان بين المشاركة الشعبية و الفئات</span>
						</div>
							<div>
						<textarea name="ads3" id="" class="form-control" cols="30" rows="10" value="<?=$siteData['ads3'] ?>"></textarea>
						<div>
										<div class="adsname">
							<span>إعلان تحت صورة المقال</span>
						</div>
							<div>
						<textarea name="ads4" id="" class="form-control" cols="30" rows="10" value="<?=$siteData['ads4'] ?>"></textarea>
						<div>
										<div class="adsname">
							<span>إعلان</span>
						</div>
							<div>
						<textarea name="ads5" id="" class="form-control" cols="30" rows="10" value="<?=$siteData['ads5'] ?>"></textarea>
						<div>
				</div>
				</div>
    </div>
     <div class="form-group">
                <input type="submit" class="btn btn-success" name="link-btn" value="Update">
            </div>
    </form>
</div>
</div>
<?php
Session::unsetSession('notupdateads');
Session::unsetSession('updateaddads');
?>
<?php require_once 'footer.php'?>