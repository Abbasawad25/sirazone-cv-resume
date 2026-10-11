<?php require_once 'header.php' ?>
<?php
$id_user = $ro['id'];
$setting = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM setting_user where id_user='$id_user' "));

if(isset($_POST['save_about']) and $_SERVER['REQUEST_METHOD'] == "POST"){

    $browser   = trim(strip_tags($_POST['browser']));
	$views  = trim(strip_tags($_POST['views']));
	$sms  = trim(strip_tags($_POST['sms']));
	$news  = trim(strip_tags($_POST['news']));
	$job  = trim(strip_tags($_POST['job']));
	$setting  = trim(strip_tags($_POST['setting']));
	$status = trim(strip_tags($_POST['status']));
	$query = "SELECT * FROM setting_user WHERE id_user='$id_user' LIMIT 1";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) 
		{
			$update = "UPDATE   setting_user SET id_user='$id_user',browser='$browser',views='$views',sms='$sms',news='$news',job='$job',setting='$setting',status='$status' where id_user='$id_user' ";
	if(mysqli_query($conn, $update)){
			array_push($errors, "تم الحفظ بنجاح");
			
}
else{
	array_push($errors, "حدث خطأ ما");
}
			}else{
				$query = "INSERT INTO setting_user(id_user,browser,views,sms,news,job,setting)
VALUES('$id_user','$browser','$views','$sms', '$news','$job','$setting','$status')";

if(mysqli_query($conn, $query)){
			array_push($errors, "تم الحفظ بنجاح");
}
else{
	array_push($errors, "حدث خطأ ما");
}
				}
 }
 
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['setting'] ?></h3>
                    <span style="font-weight: bold"><?php include('../app/errors.php'); ?></span>
                </header>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['Insert_your_name_in_search_engines'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="browser" id="" class="form-control" required>
                                    <option value="1"><?php echo $lang['yes'] ?></option>
                                    <option value="0"><?php echo $lang['no'] ?></option>   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['Who_can_watch_your_biography'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="views" id="" class="form-control" required>
                                    <option value="1" ><?php echo $lang['All'] ?></option>
                                   <option value="2" ><?php echo $lang['through_the_link_only'] ?></option>
                                    <option value="0" ><?php echo $lang['just_me'] ?></option>   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['messages_sms'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="sms" id="" class="form-control" required>
                                    <option value="1"><?php echo $lang['yes'] ?></option>
                                    <option value="0"><?php echo $lang['no'] ?></option>   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['message_job'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="news" id="" class="form-control" required>
                                    <option value="1"><?php echo $lang['yes'] ?></option>
                                    <option value="0"><?php echo $lang['no'] ?></option>   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['offering_jobs'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="job" id="" class="form-control" required>
                                    <option value="1"><?php echo $lang['yes'] ?></option>
                                    <option value="0"><?php echo $lang['no'] ?></option>   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo $lang['setting_ai'] ?></b></label>
                            <div class="col-sm-9">
                                <select name="setting" id="" class="form-control" required>
                                    <option value="1"><?php echo $lang['yes'] ?></option>
                                    <option value="0"><?php echo $lang['no'] ?></option>   
                                </select>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0"><b><?php echo $lang['account_status'] ?></b></legend>
                                <div class="col-sm-9">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" required name="status" id="gridRadios1" value="1">
                                        <label class="form-check-label" for="gridRadios1">
                                        	<?php echo $lang['Active'] ?>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="0">
                                        <label class="form-check-label" for="gridRadios2">
                                        	<?php echo $lang['Inactive'] ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-primary btn-block" name="save_about" value="<?php echo $lang['Save-post'] ?>">
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
<?php

?>

<?php require_once 'footer.php' ?>