<?php require_once 'header.php' ?>
<?php
$id_user = $ro['id'];

if(isset($_POST['save_about']) and $_SERVER['REQUEST_METHOD'] == "POST"){
    $day  = trim(strip_tags($_POST['day']));
	$type = trim(strip_tags($_POST['type']));
	$summary  = trim(strip_tags($_POST['summary']));
	if (empty($day)) { array_push($errors, "يرجي تحديد المدة او عدد الايام");
 }
 if (empty($type)) { array_push($errors, "يرجي تحديد طريقة الدفع");
 }
 
	switch($day){
		case "day":
		$money = 1000;
		break;
		case "week":
		$money = 3000;
		break;
		case "month";
		$money = 5000;
		break;
		case "year":
		$money = 8000;
		break;
		default :
	echo "0";
		}
		$amount = $money;

    
    // File checks
    $maxBytes = 5 * 1024 * 1024; // 5 MB
$allowedMimes = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'image/gif'  => 'gif',
    'image/webp' => 'webp',
];
$uploadsDir =   '../uploads/images/organic';

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


$query = "INSERT INTO organic(id_user,day,type,amount,summary,image)
VALUES('$id_user','$day','$type','$amount','$summary','$randomName')";

if(mysqli_query($conn, $query)){
			array_push($errors, "العملية تمت بنجاح طلبك في انتظار الموافقة");
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
                    <h3 style="display: inline-block;margin-right: 25px;"><?php echo $lang['organic'] ?></h3>
                    <span style="font-weight: bold">شراء عضوية مدفوعة</span>
                    <span style="font-weight: bold"><?php include('../app/errors.php'); ?></span>
                </header>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b>طريقة الدفع</b></label>
                            <div class="col-sm-9">
                                <select name="type" id="" class="form-control" required>
                                    <option value="bankk">bankk بنكك</option>
                                    <option value="fory">فوري</option>   
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="first_name" class="col-sm-3 col-form-label"><b>رقم الحساب بنكك</b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="first_name" placeholder="<?php echo $lang['first_name'] ?>" value="8249356" readonly>
                                	
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-3 col-form-label"><b>فوري</b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="last_name" name="last_name" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="middle_name" class="col-sm-3 col-form-label"><b>اسم الحساب</b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="middle_name"  value="عباس عوض أحمد محمد" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"><b>المدة والسعر</b></label>
                            <div class="col-sm-9">
                                <select name="day" id="" class="form-control" required>
                                    <option value="day">يوم 1000 جنية</option>
                                    <option value="week">إسبوع 3000 الف جنية</option>
                                    <option value="month">شهر 5000 الف جنية</option>
                                    <option value="year">سنة 8000 الف جنية</option>
                             
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label"><b>رقم الإشعار</b></label>
                            <div class="col-sm-9">
                                <input type="text" required class="form-control" id="address" name="address" value="0998812457" readonly>
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