<?php require_once 'header.php'?>
	<?php
	$id_user = $ro['id'];
	if(isset($_POST['update_achieve']) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = trim((string)($_POST['name'] ?? ''));
	$degree = trim(strip_tags($_POST['degree']));
	$address  = trim(strip_tags($_POST['address']));
	$start_date = trim(strip_tags($_POST['start_date']));
	$end_date = trim(strip_tags($_POST['end_date']));
    $description = trim((string)($_POST['description'] ?? ''));
    $id_get = trim((string)($_POST['id'] ?? ''));
    $id_get = strip_tags($id_get);
    $name = strip_tags($name);
    $description  = strip_tags($description);
 if (empty($title)) { array_push($errors, "العنوان");
 }
if (empty($description)) { array_push($errors, "الوصف مطلوب");
 }
$query = "UPDATE  education SET name='$name',degree='$degree',location='$address',start_date='$start_date',end_date='$end_date',description='$description' where id='$id_get'";

if(mysqli_query($conn, $query)){
			array_push($errors, "تم الحفظ بنجاح"); 
}
else{
	array_push($errors, "حدث خطأ ما");
}
	}else{
		
		}
		//active and inactive
		if(isset($_POST['active']) || isset($_POST['inactive'])  && $_SERVER['REQUEST_METHOD'] == "POST"){
			if(isset($_POST['active']) ){
				$up_status = 0;
				$id_status = $_POST['active'];
				}elseif(isset($_POST['inactive']) ){
					$up_status = 1;
					$id_status = $_POST['inactive'];
					}
			
			$que = "UPDATE education  SET status='$up_status' where id='$id_status'";
         if(mysqli_query($conn, $que)){
			array_push($errors, "تم الحفظ بنجاح"); 
}else{
	array_push($errors, "حدث خطأ ما");
}
			
			}else{
				}
		if(isset($_POST['delet']) and $_SERVER['REQUEST_METHOD'] == "POST"){
			$id_delet = $_POST['delet'];
			$quer = "DELETE FROM  education  where id='$id_delet'";
         if(mysqli_query($conn, $quer)){
			array_push($errors, "تم الحفظ بنجاح"); 
}else{
	array_push($errors, "حدث خطأ ما");
}
			
			}else{
				}
	?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['education'] ?></h3>
                <span><b></b></span>
                <span style="color: red;margin-left: 50px;"><b><?php include('../app/errors.php'); ?></b></span>
            </header>
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?php echo $lang['SL'] ?></th>
                            <th><?php echo $lang['name_education'] ?></th>
                            <th><?php echo $lang['The-status'] ?></th>
                            <th><?php echo $lang['degree'] ?></th>
                            <th class="text-center"><?php echo $lang['Role'] ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                         $sql = "SELECT * FROM education where id_user='$id_user' ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $num = 0;
              $i = $num;
                  while($row = mysqli_fetch_array($result)){ 
                  	$num++;
                       ?>
                            <tr>
                                <th scope="row"><?= ++$i?></th>
                                <td scope="row"><?= $row['name']?></td>
                                <td><?= $row['status'] == 1 ? '<span class="badge badge-pill badge-success">Active</span>' : '<span class="badge badge-pill badge-danger">Inactive</span>' ?></td>
                                <td><?= $row['degree']?></td>
                                <td class="text-center">
                                	<form action="" method="post">
                                    <?php
                                    if($row['status'] == 1) { ?>
                                        <button name="active"  value="<?php echo $row['id'] ?>" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-down"></i><?php echo $lang['Inactive'] ?></button>
                                    <?php  }else{ ?>
                                        <button name="inactive" value="<?php echo $row['id'] ?>" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-up"></i><?php echo $lang['Active'] ?></button>
                                    <?php } ?>
                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#id<?= $row['id']?>"><i class="fa fa-edit"></i><?php echo $lang['freeing'] ?></a>
                                    <button name="delet" value="<?= $row['id']?>" class="btn btn-sm btn-danger"onclick="return confirm('Are you sure ?')"><i class="fa fa-trash-o"></i><?php echo $lang['Delete'] ?></button>
                                  </form>
                                </td>
                            </tr>
                        <?php  }   
}
}else {
  echo "0 not data";
 }             
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
 $sql = "SELECT * FROM education  where id_user='$id_user' ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $num = 0;
              
                  while($row = mysqli_fetch_array($result)){ 
                  	$num++;
?>
    <!-- EDIT CATEGORY Modal -->
    <div class="modal fade" id="id<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['education'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="cat"><b><?php echo $lang['name_education'] ?></b></label>
                            <input  type="text" class="form-control" value="<?= $row['name']?>" name="name">
                        </div>
                        <div class="form-group">
                            <label for="cat"><b><?php echo $lang['degree'] ?></b></label>
                            <input  type="text" class="form-control" value="<?= $row['degree']?>" name="degree">
                        </div>
                        <div class="form-group">
                            <label for="cat"><b><?php echo $lang['address'] ?></b></label>
                            <input  type="text" class="form-control" value="<?= $row['location']?>" name="address">
                        </div>
                        <div class="form-group">
                            <label for="cat"><b><?php echo $lang['start_date'] ?></b></label>
                            <input  type="date" class="form-control" value="<?= $row['start_date']?>" name="start_date">
                        </div>
                        <div class="form-group">
                            <label for="cat"><b><?php echo $lang['end_date'] ?></b></label>
                            <input  type="date" class="form-control" value="<?= $row['end_date']?>" name="end_date">
                        </div>
          
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['description'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="description" id="description" cols="30" rows="10" class="summernot"><?php echo $row['description'] ?></textarea>
                            </div>
                        </div>
                        <input type="hidden" value="<?= $row['id']?>" name="id">
                        <div class="form-group">
                            <input type="submit" value="<?php echo $lang['update'] ?>" class="btn btn-block btn-success" name="update_achieve">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['Close'] ?></button>
                </div>
            </div>
        </div>
    </div>
<?php } 
}
}else {
  echo "0 results";
 }             ?>

<?php
    
?>
<?php require_once 'footer.php'?>
