<?php  
    /*
        compress()
        elapsed()
        kv()
        str_to_str()
        resize_image()
    */
    function compress($source, $destination, $quality) {

        $info = getimagesize($source);
    
        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);
    
        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);
    
        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);
    
        elseif ($info['mime'] == 'image/webp') 
            $image = imagecreatefromwebp($source);
    
        imagejpeg($image, $destination, $quality);
    
        return $destination;
    }
    function resize_image($file, $w, $h, $crop=FALSE) {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
            } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }
        $info = getimagesize($file);
        if ($info['mime'] == 'image/jpeg') 
            $src = imagecreatefromjpeg($file);
    
        elseif ($info['mime'] == 'image/gif') 
            $src = imagecreatefromgif($file);
    
        elseif ($info['mime'] == 'image/png') 
            $src = imagecreatefrompng($file);
    
        elseif ($info['mime'] == 'image/webp') 
            $src = imagecreatefromwebp($file);
    
    
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    
        return $dst;
    }
    function kv($arr1) {
        $arr2 = array();
        foreach ($arr1 as $key => $value) {
            if($value == 'a') {
                array_push($arr2, $key);
            }
        }
        return $arr2;
    }
    function str_to_str($a) {
        $new_str = '';
        $b = json_decode($a, true);
        // $new_array = explode(",", $new_array);
        if(is_array($b)) {
            if(count($b) > 0) {
                for($s=0; $s < count($b); $s++) {
                    if($s == 0) {
                        $new_str .= $b[$s];
                    } else {
                        $new_str .= ', '.$b[$s];
                    }
                }
                $new_str .= '';
            }
        }
        return $new_str;

    }
    function elapsed($datetime_from) {
        $created_at = new DateTime($datetime_from, new DateTimeZone('Asia/Singapore') );
        $date = new DateTime("now", new DateTimeZone('Asia/Singapore') );

        $interval = $date->diff($created_at);
        $elapsed_str = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
        $elapsed_array = explode(' ', $elapsed_str);
        $elapsed = '';
        if(intval($elapsed_array[0]) > 0) {
            if(intval($elapsed_array[0]) == 1) {
                $elapsed = strval($elapsed_array[0]) . ' yr ago';
            } else {
                $elapsed = strval($elapsed_array[0]) . ' yrs ago';
            }
        } elseif(intval($elapsed_array[2]) > 0) {
            if(intval($elapsed_array[2]) == 1) {
                $elapsed = strval($elapsed_array[2]) . ' month ago';
            } else {
                $elapsed = strval($elapsed_array[2]) . ' months ago';
            }
        } elseif(intval($elapsed_array[4]) > 0) {
            if(intval($elapsed_array[4]) == 1) {
                $elapsed = strval($elapsed_array[4]) . ' day ago';
            } else {
                $elapsed = strval($elapsed_array[4]) . ' days ago';
            }
        } elseif(intval($elapsed_array[6]) > 0) {
            if(intval($elapsed_array[6]) == 1) {
                $elapsed = strval($elapsed_array[6]) . ' hr ago';
            } else {
                $elapsed = strval($elapsed_array[6]) . ' hrs ago';
            }
        } elseif(intval($elapsed_array[8]) > 0) {
            if(intval($elapsed_array[8]) == 1) {
                $elapsed = strval($elapsed_array[8]) . ' min ago';
            } else {
                $elapsed = strval($elapsed_array[8]) . ' mins ago';
            }
        } elseif(intval($elapsed_array[10]) > 0) {
            if(intval($elapsed_array[10]) == 1) {
                $elapsed = strval($elapsed_array[10]) . ' second ago';
            } else {
                $elapsed = strval($elapsed_array[10]) . ' seconds ago';
            }
        }
        return $elapsed;
    }
    function elapsed_check($datetime_from) {
        $created_at = new DateTime($datetime_from, new DateTimeZone('Asia/Singapore') );
        $date = new DateTime("now", new DateTimeZone('Asia/Singapore') );

        $interval = $date->diff($created_at);
        $elapsed_str = $interval->format('%y %m %a %h %i %s');
        $elapsed_array = explode(' ', $elapsed_str);

        $years = intval($elapsed_array[1]);
        $months = intval($elapsed_array[2]);
        $days = intval($elapsed_array[3]);
        $hours = intval($elapsed_array[4]);
        $minutes = intval($elapsed_array[5]);

        if($years == 0 && $months == 0 && $days < 5) {
            $e = 1;
        } else {
            $e = 0;
        }
        return $e;
    }
    function empty_array($arr) {
        unset($arr);
        $arr = array();
        return $arr;
    }
?>