<?php
	class upload{
		function file_upload($id,$file_id, $folder="", $types=""){
			if(!$_FILES[$file_id]['name']) return array('','No file specified');
			$file_title = $id."_".$_FILES[$file_id]['name'];
			//Get file extension
			$ext_arr = split("\.",basename($file_title));
			$ext = strtolower($ext_arr[count($ext_arr)-1]); //Get the last extension

		//Not really uniqe - but for all practical reasons, it is
	   // $uniqer = substr(md5(uniqid(rand(),1)),0,5);
	  //  $file_name = $uniqer . '_' . $file_title;//Get Unique Name
		$file_name = $file_title;
	    $all_types = explode(",",strtolower($types));
		if($types){
			if(in_array($ext,$all_types));
	        else {
            $result = "'".$_FILES[$file_id]['name']."' is not a valid file."; //Show error if any.
            return array('',$result);
        }
    }
    //Where the file must be uploaded to
    if($folder) $folder .= '/';//Add a '/' at the end of the folder
    $uploadfile = $folder . $file_name;
	//chmod($uploadfile,0777);
    $result = '';
    //Move the file from the stored location to the new location
    if (!move_uploaded_file($_FILES[$file_id]['tmp_name'], $uploadfile)) {
        $result = "Cannot upload the file '".$id."_".$_FILES[$file_id]['name']."'"; //Show error if any.
        if(!file_exists($folder)) {
            $result .= " : Folder don't exist.";
        } elseif(!is_writable($folder)) {
            $result .= " : Folder not writable.";
        } elseif(!is_writable($uploadfile)) {
            $result .= " : File not writable.";
        }
        $file_name = '';
        
    } else {
        if(!$_FILES[$file_id]['size']) { //Check if the file is made
            @unlink($uploadfile);//Delete the Empty file
            $file_name = '';
            $result = "Empty file found - please use a valid file."; //Show the error message
        } else {
            chmod($uploadfile,0777);//Make it universally writable.
        }
    }
    return array($file_name,$result);
}

function check_image_ext($extension){
  if(preg_Match("/jpg|JPG|JPEG|GIF|gif|png|PNG/",$extension)){
	  return true;
  }else{
      return false;
  }
}

function smart_resize_image( $file, $width = 0, $height = 0,$output_dir='uploads/', $proportional = false, $output = 'file', $delete_original = false, $use_linux_commands = false){
    if ( $height <= 0 && $width <= 0 ) {
      return false;
    }
    $info = getimagesize($file);
    $image = '';
	/*
	$ext_arr = split("\.",basename($file));
    $ext = strtolower($ext_arr[count($ext_arr)-1]);
	$ext =".".$ext;
    */
    $final_width = 0;
    $final_height = 0;
    list($width_old, $height_old) = $info;
     if ($proportional) {
      if ($width == 0) $factor = $height/$height_old;
      elseif ($height == 0) $factor = $width/$width_old;
      else $factor = min ( $width / $width_old, $height / $height_old);   
       $final_width = round ($width_old * $factor);
      $final_height = round ($height_old * $factor);
     }else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
    }
     switch ( $info[2] ) {
      case IMAGETYPE_GIF:
        $image = imagecreatefromgif($file);
      break;
      case IMAGETYPE_JPEG:
        $image = imagecreatefromjpeg($file);
      break;
      case IMAGETYPE_PNG:
        $image = imagecreatefrompng($file);
      break;
      default:
        return false;
    }
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
     if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
     $trnprt_indx = imagecolortransparent($image);
      // If we have a specific transparent color
      if ($trnprt_indx >= 0) {
         // Get the original image's transparent color's RGB values
        $trnprt_color    = imagecolorsforindex($image, $trnprt_indx);
         // Allocate the same color in the new image resource
        $trnprt_indx    = imagecolorallocate($image_resized, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
         // Completely fill the background of the new image with allocated color.
        imagefill($image_resized, 0, 0, $trnprt_indx);
         // Set the background color for new image to transparent
        imagecolortransparent($image_resized, $trnprt_indx);
       } 
      // Always make a transparent background color for PNGs that don't have one allocated already
	   elseif ($info[2] == IMAGETYPE_PNG) {
         // Turn off transparency blending (temporarily)
        imagealphablending($image_resized, false);
         // Create a new transparent color for image
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
         // Completely fill the background of the new image with allocated color.
        imagefill($image_resized, 0, 0, $color);
         // Restore transparency blending
        imagesavealpha($image_resized, true);
      }
    }
     imagecopyresampled($image_resized, $image, 0, 0, 0, 0, $final_width, $final_height, $width_old, $height_old);
     if($delete_original){
      if ( $use_linux_commands )
        exec('rm '.$file);
      else
        @unlink($file);
    }
     switch ( strtolower($output)){
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:
        imagegif($image_resized, $output_dir.$output);
      break;
      case IMAGETYPE_JPEG:
        imagejpeg($image_resized, $output_dir.$output);
      break;
      case IMAGETYPE_PNG:
        imagepng($image_resized, $output_dir.$output);
      break;
      default:
        return false;
    }
    return true;
  }

 
	function createthumb($name,$filename,$new_w,$new_h)
			   {
			$system=explode(".",$name);
			if (preg_match("/jpg|jpeg|JPG/",$system[1])){$src_img=imagecreatefromjpeg($name);}
			if (preg_match("/gif|GIF/",$system[1])){$src_img=imagecreatefromgif($name);}
			if (preg_match("/png/",$system[1])){$src_img =imagecreatefrompng($name);}
			$old_x=imageSX($src_img);
			$old_y=imageSY($src_img);
				
			if ($old_x > $old_y) 
			{
				$thumb_w=$new_w;
				$thumb_h=$old_y*($new_h/$old_x);
			}
			if ($old_x < $old_y) 
			{
				$thumb_w=$old_x*($new_w/$old_y);
				$thumb_h=$new_h;
			}
			if ($old_x == $old_y) 
			{
				$thumb_w=$new_w;
				$thumb_h=$new_h;
			}
			$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
			imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
			if (preg_match("/png/",$system[1]))
			{
				imagepng($dst_img,$filename); 
			} else {
				imagejpeg($dst_img,$filename); 
			}
			imagedestroy($dst_img); 
			imagedestroy($src_img); 
			return true;
			   }
}
?>