<?php require_once 'header.php' ?>
<?php
$id_user = $ro['id'];
$about_sec = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM about_section where id_user='$id_user' "));
if(isset($_POST['save_about']) and $_SERVER['REQUEST_METHOD'] == "POST"){
	$first_name = trim((string)($_POST['first_name'] ?? ''));
    $last_name = trim((string)($_POST['last_name'] ?? ''));
    $middle_name = trim((string)($_POST['middle_name'] ?? ''));
    $address  = trim(strip_tags($_POST['address']));
	$number = trim(strip_tags($_POST['number']));
	$email  = trim(strip_tags($_POST['email']));
	$designation = trim(strip_tags($_POST['designation']));
	$summary  = trim(strip_tags($_POST['summary']));
	$status = trim(strip_tags($_POST['status']));
    
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
if(isset($about_sec[$id_user])){
	$update = "UPDATE   about_section SET id_user='$id_user',first_name='$first_name',last_name='$last_name',middle_name='$middle_name',email='$email',number='$number',address='$address',summary='$summary',designation='$designation',imgae='$randomName' where id_user='$id_user' ";
	if(mysqli_query($conn, $update)){
			echo "505";
}
else{
	array_push($errors, "حدث خطأ ما");
}
	}else{
$query = "INSERT INTO about_section(id_user,first_name,last_name,middle_name,email,number,address,summary,designation,imgae)
VALUES('$id_user','$first_name','$last_name','$middle_name', '$email','$number','$address','$summary','$designation','$randomName')";

if(mysqli_query($conn, $query)){
			array_push($errors, "تم الحفظ بنجاح");
}
else{
	array_push($errors, "حدث خطأ ما");
}
}
	}else{
		}
		
		
			
			
?>
    <div class="row">
        <div class="col-lg-12">
            <section class="card">
                <header class="card-header">
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['about_section'] ?></h3>
                    <span style="font-weight: bold"><?php include('../app/errors.php'); ?></span>
                </header>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-3 col-form-label"><b><?php echo $lang['first_name'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="first_name" placeholder="<?php echo $lang['first_name'] ?>" name="first_name" value="<?= isset($about_sec['first_name']) ? $about_sec['first_name'] : ''?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-3 col-form-label"><b><?php echo $lang['last_name'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="last_name" placeholder="<?php echo $lang['last_name'] ?>" name="last_name" value="<?= isset($about_sec['last_name']) ? $about_sec['last_name'] : ''?>" required minlength="2" maxlength="255">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="middle_name" class="col-sm-3 col-form-label"><b><?php echo $lang['middle_name'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="middle_name" placeholder="<?php echo $lang['middle_name'] ?>" name="middle_name" value="<?= isset($about_sec['middle_name']) ? $about_sec['middle_name'] : ''?>" required minlength="2" maxlength="255">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label"><b><?php echo $lang['address'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="address" placeholder="<?php echo $lang['address'] ?>" name="address" value="<?= isset($about_sec['address']) ? $about_sec['address'] :''?>" required minlength="2" maxlength="255">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label"><b><?php echo $lang['email'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="email" required class="form-control" id="email" placeholder="<?php echo $lang['email'] ?>" name="email" value="<?= isset($about_sec['email']) ? $about_sec['email'] :''?>" required minlength="6" maxlength="255">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 col-form-label"><b><?php echo $lang['phone_number'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="number" required class="form-control" id="phone" placeholder="<?php echo $lang['email'] ?>" name="number" value="<?= isset($about_sec['number']) ? $about_sec['number'] :''?>" required minlength="6" maxlength="255">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="designation" class="col-sm-3 col-form-label"><b><?php echo $lang['designation'] ?></b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="designation" placeholder="<?php echo $lang['designation'] ?>" name="designation" value="<?= isset($about_sec['designation']) ? $about_sec['designation'] :''?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['summary'] ;?></b>
                            </div>
                            <div class="col-sm-9">
                                <textarea name="summary" id="summary" cols="30" rows="10" class="summernot"><?= isset($about_sec['summary']) ? $about_sec['summary'] :''?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <b><?php echo $lang['image'] ?></b>
                            </div>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="image" accept=".jpg,.jpeg,.png,.gif">
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