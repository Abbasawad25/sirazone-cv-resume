<?php require_once 'header.php' ?>
<?php
if(isset($_POST['save_achieve']) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = trim(strip_tags($_POST['name']));
	$degree  = trim(strip_tags($_POST['degree']));
	$description = trim(strip_tags($_POST['description']));
	$status = trim(strip_tags($_POST['status']));
    $status  = filter_var($status,FILTER_SANITIZE_NUMBER_INT);
 if (empty($name)) { array_push($errors, "إسم المهارة مطلوب");
 }
if (empty($degree)) { array_push($errors, "النسبة او الدرجة مطلوبة");
 }
if (empty($description)) { array_push($errors, "وصف المشروع مطلوب"); 
}

    
$id_user = $ro['id'];
$query = "INSERT INTO skills(id_user,name,degree,description,status)
VALUES('$id_user','$name','$degree','$description','$status')";

if(mysqli_query($conn, $query)){
			array_push($errors, "تم الحفظ بنجاح"); 
}
else{
	array_push($errors, "حدث خطأ ما");
}
	}else{
		}
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['skills'] ?></h3>
                    <span style="font-weight: bold"><?php include('../app/errors.php'); ?></span>
                </header>
                <div class="card-body">
                	
                    <form action="" method="post" enctype="multipart/form-data">                 
                        <div class="form-group row">
                            <label for="title" class="col-sm-3 col-form-label"><b><?php echo $lang['name'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="title" placeholder="<?php echo $lang['name'] ?>" name="name" value="" required minlength="2" maxlength="255">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="degree" class="col-sm-3 col-form-label"><b><?php echo $lang['degree'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="degree" placeholder="<?php echo $lang['degree'] ?>" name="degree" value="" required minlength="2" maxlength="255">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['description'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="description" id="description" cols="30" rows="10" class="summernot"></textarea>
                            </div>
                        </div>
                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-3 pt-0"><b><?php echo $lang['The-status'] ?></b></legend>
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
                                <input type="submit" class="btn btn-primary btn-block" name="save_achieve" value="<?php echo $lang['Save-post'] ?>">
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