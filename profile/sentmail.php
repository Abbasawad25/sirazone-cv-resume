<?php require_once 'mailHeader.php'?>
    <div class="row">
        <div class="col-sm-12">
            <section class="card">
                <div class="card-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped table-hover" id="dynamic-table">
                            <thead>
                            <tr>
                                <th><?php echo $lang['SL'] ?></th>
                                <th><?php echo $lang['name'] ?></th>
                                <th><?php echo $lang['subject'] ?></th>
                                <th ><?php echo $lang['email'] ?></th>
                                <th><?php echo $lang['Role'] ?></th>
                            </tr>
                            </thead>
                            <?php
                            require_once '../vendor/autoload.php';
                            $allCat = new \App\classes\Post();
                            $data = $allCat->showAllPost();
                            $i=0;
                            while ($row = mysqli_fetch_assoc($data)){ ?>
                                <tr>
                                    <td scope="row"><?= ++$i?></td>

                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
<?php require_once 'footer.php'?>