<?php require_once 'header.php';
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
use App\classes\Site;
$ob = Site::display();
use App\classes\Mail;
?>
<div class="mail-box">
    <aside class="sm-side">
        <div class="user-head">
            <a href="javascript:;" class="inbox-avatar">
                <img src="img/mail-avatar.jpg" alt="">
            </a>
            <div class="user-name">
                <h5><a href="#">wilzwave</a></h5>
                <span><a href="#">info.wilzwave@gmail.com</a></span>
            </div>
            <a href="javascript:;" class="mail-dropdown float-right">
                <i class="fa fa-chevron-down"></i>
            </a>
        </div>
        <div class="inbox-body">
            <a class="btn btn-compose" data-toggle="modal" href="#myModal">
                <?php echo $lang['Create-a'] ?>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><?php echo $lang['Create-a'] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><?php echo $lang['to'] ?></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputEmail1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label">Cc / Bcc</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="cc" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><?php echo $lang['subject'] ?></label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputPassword1" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-2 control-label"><?php echo $lang['message'] ?></label>
                                    <div class="col-lg-10">
                                        <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-offset-2 col-lg-10">
                                                      <span class="btn green fileinput-button">
                                                        <i class="fa fa-plus fa fa-white"></i>
                                                        <span><?php echo $lang['Facility'] ?></span>
                                                        <input type="file" multiple="" name="files[]">
                                                      </span>
                                        <button type="submit" class="btn btn-send"><?php echo $lang['send'] ?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <ul class="inbox-nav inbox-divider">
            <li <?= $page == 'inbox.php' ? 'class="active"' : '' ?>>
                <a href="inbox.php"><i class="fa fa-inbox"></i><?php echo $lang['Ward-Fund'] ?> <span class="badge badge-danger float-right mt-3"><?php echo Mail::countAllMail(); ?></span></a>
            </li>
            <li <?= $page == 'sentmail.php' ? 'class="active"' : '' ?>>
                <a href="sentmail.php"><i class="fa fa-envelope-o"></i><?php echo $lang['Mail-Sender'] ?></a>
            </li>
            <li <?= $page == 'draft.php' ? 'class="active"' : '' ?>>
                <a href="draft.php"><i class=" fa fa-link"></i> <?php echo $lang['Draft'] ?> <span class="badge badge-info float-right mt-3">30</span></a>
            </li>
            <li <?= $page == 'trash.php' ? 'class="active"' : '' ?>>
                <a href="trash.php"><i class=" fa fa-trash-o"></i><?php echo $lang['Trash'] ?> <span class="badge badge-danger float-right mt-3"><?php echo Mail::countAllTrashMail(); ?></span></a>
            </li>
        </ul>
        <div class="inbox-body text-center">
            <div class="btn-group">
                <a href="javascript:;" class="btn mini btn-primary">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
            <div class="btn-group">
                <a href="javascript:;" class="btn mini btn-success">
                    <i class="fa fa-phone"></i>
                </a>
            </div>
            <div class="btn-group">
                <a href="javascript:;" class="btn mini btn-info">
                    <i class="fa fa-cog"></i>
                </a>
            </div>
        </div>

    </aside>
    <aside class="lg-side">
        <div class="inbox-head">
            <h3><?php echo $lang['Ward-Fund'] ?></h3>
            <form class="float-right position" action="#">
                <div class="input-append">
                    <input type="text" placeholder="Search Mail" class="sr-input">
                    <button type="button" class="btn sr-btn"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>