<?
function convertJpegToPng(string $filename, string $outputFile) {
    $im = imagecreatefromjpeg($filename);
    imagepng($im, $outputFile);
    imagedestroy($im);
}

//Image Cropping and Resizing

//first create a new image with desired dimensions:
// new image
$dst_img = imagecreatetruecolor($width, $height);


//original image
$src_img=imagecreatefromstring(file_get_contents($original_image_path));

//Now, copy all (or part of) original image (src_img) into the new image (dst_img) by imagecopyresampled:
imagecopyresampled($dst_img, $src_img,
$dst_x ,$dst_y, $src_x, $src_y,
$dst_width, $dst_height, $src_width, $src_height);
?>