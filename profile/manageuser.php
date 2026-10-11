<?php require_once 'header.php'?>
<?php

?>
<div class="row">
    <div class="col-lg-12">
        <section class="card">
            <header class="card-header">
                <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['All-Users'] ?></h3>
                <span><b></b></span>
                <span style="color: red;margin-left: 50px;"><b></b></span>
            </header>
            <div class="card-body">
                <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?php echo $lang['SL'] ?></th>
                            <th><?php echo $lang['username'] ?></th>
                            <th><?php echo $lang['Role'] ?></th>
                            <th class="text-center"><?php echo $lang['The-tool'] ?></th>
                            <th>name</th>
                            <th>email</th>
                            <th>number</th>
              
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require_once '../vendor/autoload.php';
                        $sql = "SELECT * FROM users    ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $num = 0;
              $i = $num;
              
                  while($row = mysqli_fetch_array($result)){ 
                  	$num++; ?>
                            <tr>
                                <th scope="row"><?= ++$i?></th>
                                <td scope="row"><?= strtoupper($row['username'])?></td>
                                <th scope="row">
                                    <?php
                                    if($row['role'] == 1){
                                        echo '<span class="badge badge-pill badge-primary">admin</span>';
                                    }elseif ($row['role'] == 0){
                                        echo '<span class="badge badge-pill badge-danger">block</span>';
                                    }elseif ($row['role'] == 2){
                                        echo '<span class="badge badge-pill badge-warning">Editor</span>';
                                    }
                                    ?>
                                </th>
                                <th scope="row">
                                    <?php
                                    if($row['role'] == 1){
                                        echo '<span class="badge badge-pill badge-primary">admin</span>'; ?>
                                        <a href="status.php?id=<?= $row['id']?>&manageuser&unblock" class="btn btn-sm btn-warning"><i class="fa  fa-hand-o-down"></i><?php echo $lang['He-came-down'] ?></a>
                                    <?php  }elseif ($row['role'] == 0){ ?>
                                        <a href="status.php?id=<?= $row['id']?>&manageuser&unblock" class="btn btn-sm btn-success"><i class="fa  fa-hand-o-up"></i><?php echo $lang['Unblock'] ?></a>
                                        <a href="delete.php?id=<?= $row['id']?>&manageuser&delete" class="btn btn-sm btn-danger"><i class="fa  fa-trash-o"></i><?php echo $lang['Delete'] ?></a>
                                    <?php  }elseif ($row['role'] == 2){ ?>
                                        <a href="status.php?id=<?= $row['id']?>&manageuser&block" class="btn btn-sm btn-danger"><i class="fa  fa-hand-o-down"></i><?php echo $lang['block'] ?></a>
                                        <a href="status.php?id=<?= $row['id']?>&manageuser&admin" class="btn btn-sm btn-info"><i class="fa  fa-hand-o-up"></i><?php echo $lang['admin'] ?></a>
                                        <a href="delete.php?id=<?= $row['id']?>&manageuser&delete" class="btn btn-sm btn-danger"><i class="fa  fa-trash-o"></i><?php echo $lang['Delete'] ?></a>
                                    <?php      }
                                    ?>
                                </th>
                                <td scope="row"><?= strtoupper($row['name'])?></td>
                                  <td scope="row"><?= strtoupper($row['email'])?></td>
                                  <td scope="row"><?= strtoupper($row['number'])?></td>
                                  
       
                            </tr>
                        <?php } 
}
}else {
  echo "0 results";
 }             ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
$sql = "SELECT * FROM users ORDER BY id DESC";
$result = $conn->query($sql);
$siteData = mysqli_fetch_assoc($result);
if($result = mysqli_query($conn, $sql)){
            	    if(mysqli_num_rows($result) > 0){
            			$total_msg = mysqli_num_rows($result);
              $num = 0;
              $i = $num;
              
                  while($row = mysqli_fetch_array($result)){ 
                  	$num++; ?>
    <!-- EDIT CATEGORY Modal -->
    <div class="modal fade" id="id<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['Update-Category'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update.php" method="post">
                        <div class="form-group">
                            <label for="cat"><b><?php echo $lang['Name-of-category'] ?></b></label>
                            <input  type="text" class="form-control" value="<?= $row['category_name']?>" name="catName">
                        </div>
                        <input type="hidden" value="<?= $row['id']?>" name="id">
                        <div class="form-group">
                            <input type="submit" value="<?php echo $lang['update'] ?>" class="btn btn-block btn-success" name="update-cat">
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
<?php require_once 'footer.php'?>
