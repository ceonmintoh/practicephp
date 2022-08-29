<?
function recurse_delete_dir(string $src, string $dest) : int {
        $count = 0;
        // ensure that $src and $dest end with a slash so that we can concatenate it with the filenames directly
        $src = rtrim($dest, "/\\") . "/";
        
        $dest = rtrim($dest, "/\\") . "/";
        // use dir() to list files
        $list = dir($src);
        // create $dest if it does not already exist
        @mkdir($dest);
        // store the next file name to $file. if $file is false, that's all -- end the loop.
        while(($file = $list->read()) !== false) {
            if($file === "." || $file === "..") continue;
            if(is_file($src . $file)) {
                copy($src . $file, $dest . $file);
                $count++;
                }
            elseif(is_dir($src . $file)) {
                $count += recurse_copy_dir($src . $file, $dest . $file);
            }
        }
        return $count;
    }
?>