<?php
class GlobalStream{
    private $var;
    public function stream_open(string $path){
        $this->var =& $GLOBALS[parse_url($path)["host"]];
        return true;
    }
    public function stream_write(string $data){
        $this->var .= $data;
        return strlen($data);
    }
}
stream_wrapper_register("global", GlobalStream::class);
$image = imagecreatetruecolor(100, 100);
imagefill($image, 0, 0, imagecolorallocate($image, 0, 0, 0));
$stream = fopen("global://myImage", "");
imagepng($image, $stream);
echo base64_encode($myImage);