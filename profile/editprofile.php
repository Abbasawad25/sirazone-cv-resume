<?php require_once 'header.php';
$page = explode('/',$_SERVER['PHP_SELF']);
$page = end($page);
?>

<?php 
 // 
 $id_user = $ro['id'];

if(isset($_POST['update_user']) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$name = trim(strip_tags($_POST['name']));
	$username  = trim(strip_tags($_POST['username']));
	$city  = trim(strip_tags($_POST['city']));
	$birth = trim(strip_tags($_POST['birth']));
	$state = trim(strip_tags($_POST['state']));
	$summary   = trim(strip_tags($_POST['summary']));
	$zipcode = trim(strip_tags($_POST['zipcode']));
    $address  = trim(strip_tags($_POST['address']));
	$country  = trim(strip_tags($_POST['country']));
	$email  = trim(strip_tags($_POST['email']));
	$number = trim(strip_tags($_POST['number']));
    
    // File checks
    $maxBytes = 5 * 1024 * 1024; // 5 MB
$allowedMimes = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'image/gif'  => 'gif',
    'image/webp' => 'webp',
];
$uploadsDir =   '../uploads/images/users';

// Helper: send response and exit

function respond($msg) {
    echo '<p>' . htmlspecialchars($msg, ENT_QUOTES) . '</p>';
    echo '<p><a href="index.php">Back</a></p>';
    exit;
}

// Check uploaded file presence
if (!isset($_FILES['image'])) {
    respond('No file uploaded.');
}

$file = $_FILES['image'];

// Basic upload error check
if ($file['error'] !== UPLOAD_ERR_OK) {
    respond('Upload error code: ' . $file['error']);
}

// Size limit
if ($file['size'] > $maxBytes) {
    respond('File too large. Limit is 5 MB.');
}

// Use getimagesize() to verify it's image and get MIME
$imgInfo = @getimagesize($file['tmp_name']);
if ($imgInfo === false || empty($imgInfo['mime'])) {
    respond('File is not a valid image.');
}
$mimeFromGetImageSize = $imgInfo['mime'];

// Use finfo to double-check MIME (magic bytes)
$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimeFromFinfo = finfo_file($finfo, $file['tmp_name']);
finfo_close($finfo);

// Must match allowed list and match between checks
if (!in_array($mimeFromGetImageSize, array_keys($allowedMimes), true) ||
    $mimeFromGetImageSize !== $mimeFromFinfo) {
    respond('Image type not allowed or could not be verified.');
}

// Map to file extension
$ext = $allowedMimes[$mimeFromGetImageSize];

// Create uploads directory (outside webroot is best; shown here in project for example)
if (!is_dir($uploadsDir)) {
    if (!mkdir($uploadsDir, 0755, true)) {
        respond('Failed to create uploads directory.');
    }
}

// Generate secure random filename
$randomName = bin2hex(random_bytes(16)) . '.' . $ext;
$destination = $uploadsDir . '/' . $randomName;

// Re-encode the image using GD (this strips metadata and prevents polyglot files)
switch ($mimeFromGetImageSize) {
    case 'image/jpeg':
        $src = @imagecreatefromjpeg($file['tmp_name']);
        break;
    case 'image/png':
        $src = @imagecreatefrompng($file['tmp_name']);
        break;
    case 'image/gif':
        $src = @imagecreatefromgif($file['tmp_name']);
        break;
    case 'image/webp':
        $src = @imagecreatefromwebp($file['tmp_name']);
        break;
    default:
        $src = false;
}

if ($src === false) {
    respond('Failed to process image.');
}

// Optionally resize here if needed (example: limit to 2000x2000)
$maxDim = 2000;
$width = imagesx($src);
$height = imagesy($src);
if ($width > $maxDim || $height > $maxDim) {
    $ratio = $width / $height;
    if ($ratio > 1) {
        $newW = $maxDim;
        $newH = (int)($maxDim / $ratio);
    } else {
        $newH = $maxDim;
        $newW = (int)($maxDim * $ratio);
    }
    $tmp = imagecreatetruecolor($newW, $newH);
    // Preserve transparency for PNG/GIF/WebP
    if (in_array($mimeFromGetImageSize, ['image/png', 'image/gif', 'image/webp'], true)) {
        imagecolortransparent($tmp, imagecolorallocatealpha($tmp, 0, 0, 0, 127));
        imagealphablending($tmp, false);
        imagesavealpha($tmp, true);
    }
    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newW, $newH, $width, $height);
    imagedestroy($src);
    $src = $tmp;
}

// Save the re-encoded image
$saved = false;
switch ($mimeFromGetImageSize) {
    case 'image/jpeg':
        $saved = imagejpeg($src, $destination, 85); // 85% quality
        break;
    case 'image/png':
        // PNG quality: compression level 0 (no) to 9
        $saved = imagepng($src, $destination, 6);
        break;
    case 'image/gif':
        $saved = imagegif($src, $destination);
        break;
    case 'image/webp':
        $saved = imagewebp($src, $destination, 80);
        break;
}
imagedestroy($src);

if (!$saved) {
    respond('Failed to save processed image.');
}
@chmod($destination, 0644);
//end
$update = "UPDATE   users SET username='$username',email='$email',number='$number',city='$city',country='$country',state='$state',address='$address',summary='$summary',birth='$birth',zipcode='$zipcode',image='$randomName' where id='$id_user' ";
	if(mysqli_query($conn, $update)){
			array_push($errors, "تم الحفظ بنجاح");
}
else{
	array_push($errors, "حدث خطأ ما");
}
}
	
		
?>
<div class="row">
    <aside class="profile-nav col-lg-3">
        <section class="card">
            <div class="user-heading round">
                <a href="">
                    <img src="../uploads/images/users/<?= isset($ro['image']) ? $ro['image'] : ''?>" alt="">
                </a>
                <h1><?= $ro['name'] ?></h1>
                <p><?= $ro['email'] ?></p>
            </div>

            <ul class="nav nav-pills nav-stacked">
                <li class="nav-item"><a class="nav-link" href="profile.php"> <i class="fa fa-user"></i><?php echo $lang['Profile'] ?></a></li>
                <li class=" active nav-item"><a class="nav-link" href="editprofile.php"> <i class="fa fa-edit"></i><?php echo $lang['Edit-Profile'] ?></a></li>
            </ul>

        </section>
    </aside>
    <aside class="profile-info col-lg-9">
        <div class="panel-body bio-graph-info">
            <h1><?php echo $lang['Update-Profile'] ?></h1>
            <h6 style="color: green"><i><?php include('../app/errors.php'); ?></i></h6>
            <h6 style="color: red"><i></i></h6>
            <h6 style="color: red"><i></i></h6>
            <h6 style="color: red"><i></i></h6>
            <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['Information-about-me'] ?></label>
                    <div class="col-lg-10">
                        <textarea name="summary" id="" class="form-control" cols="30" rows="10"> <?= isset($ro['summary']) ? $ro['summary'] : ''?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['Forename'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="f-name" placeholder=" " value="<?= $ro['name'] ?>" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['phone_number'] ?></label>
                    <div class="col-lg-6">
                        <input type="number" class="form-control" id="number" placeholder=" " value="<?= $ro['number'] ?>" name="number">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['organic'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="occupation" placeholder=" " value="<?=
                        $ro['type'] == 1 ? 'pro' : 'free' ?>"  readonly>
                        <input name="id" type="hidden" class="form-control" id="email" placeholder=" " value="<?= $ro['id'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['email'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" name="email" class="form-control" id="email" placeholder=" " value="<?= $ro['email'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['username'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="mobile" name="username" placeholder=" " value="<?= $ro['username'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['dates'] ?></label>
                    <div class="col-lg-6">
                        <input type="date" class="form-control" id="" placeholder=" " value="<?= $ro['birth'] ?>" name="birth">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['Countrys'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="" placeholder=" " value="<?= $ro['country'] ?>" name="country">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['city'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="" placeholder=" " value="<?= $ro['city'] ?>" name="city">
                    </div>
                </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['state'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="" placeholder=" " value="<?= $ro['state'] ?>" name="state">
                    </div>
                </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['address'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="" placeholder=" " value="<?= $ro['address'] ?>" name="address">
                    </div>
                </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label"><?php echo $lang['zipcode'] ?></label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="" placeholder=" " value="<?= $ro['zipcode'] ?>" name="zipcode">
                    </div>
                </div>
                <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['image'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" value="<?= isset($ro['image']) ? $ro['image'] : ''?>" accept=".jpg,.jpeg,.png,.gif">
                            </div>
                        </div>
                
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <input type="submit" class="btn btn-success" name="update_user" value="<?php echo $lang['Save'] ?>"></input>
                    </div>
                </div>
            </form>
        </div>
    </aside>
</div>
<?php

?>
<?php require_once 'footer.php'?>
