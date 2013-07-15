<?
	error_reporting(E_ALL);
	$photoLabel	= "Add New Photo";
	$arrError		= array();
	$id				= 0;
	$title			= "";
	$table			= "photos";
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$id				= (int)$_GET['id'];
		$row			= $objPhotos->getPhotoInfo($id);
		$photoLabel		= "Edit Photo";
		$title			= $row[0]['title'];
		$image_head		= $row[0]['image_head'];
		$image_eyes		= $row[0]['image_eyes'];
		$image_nose		= $row[0]['image_nose'];
		$image_mouth	= $row[0]['image_mouth'];

		$img ="<img src='".HEAD_IMAGE_UPLOAD_URL."".$image_head."'><br/>"; 
		$img .="<img src='".EYES_IMAGE_UPLOAD_URL."".$image_eyes."'><br/>"; 
		$img .="<img src='".NOSE_IMAGE_UPLOAD_URL."".$image_nose."'><br/>"; 
		echo $img .="<img src='".MOUTH_IMAGE_UPLOAD_URL."".$image_mouth."'>"; 
	}
	if(isset($_POST['submit']) && $_POST['submit'] != ""){
		extract($_POST);		
		foreach($_POST as $k=>$v){
			if($k == 'submit' || $k =='' || $k == 'file_name')
				continue;
			//if($v)){
				$arFieldValues[$k] = $v;
			//}
		}
		if(!$id){
			$arFieldValues['users_id'] = $_SESSION['sessAdminID'];
			$id = $objPhotos->insert($table,$arFieldValues);
			$_SESSION['empMsg'] = "Photo Record Added Successfully";
		}else{
			foreach($arFieldValues as $k=>$v){
				if($k =='id')
				continue;
				$arFieldValuesUpdate[$k]=$v;
			}
			$arConditions = array("id"=>$id);
			$objPhotos->update($table,$arFieldValuesUpdate,$arConditions);
			$_SESSION['empMsg'] = "Photo Record Updated Successfully";
		}
		if((isset($_FILES['file_name']) && $_FILES['file_name']['name'] != "")){
				//require_once("../lib/class.image_upload.php");
				//require_once("../lib/class.image_resize.php");

				require("../lib/class.upload.php");
				$objUpload = new file_upload();

				$image_height = 320;
				$image_width  =	400;

				
				$arfilename = $objUpload->upload($id,'file_name',IMAGE_UPLOAD_PATH,'jpeg,gif,png,JPG,JPEG,jpeg');

				$objUpload->smart_resize_image( IMAGE_UPLOAD_PATH.$arfilename[0],$image_width,$image_height,IMAGE_UPLOAD_PATH,false,$arfilename[0],true);
				$filename   = $arfilename[0];

				
				
				/*
				$objImageupload	= new imageFileUpload();

				$objImageupload->tag_name = "file_name";

				$a_tempFileName  = explode(".",strtolower($_FILES['file_name']['name']));
				 
				$objImageupload->file_name = $a_tempFileName[0].".".$a_tempFileName[1];
				
				$newFileName	=  $objImageupload->file_name;			

				$objImageupload->storing_directory = IMAGE_UPLOAD_PATH;


				$objImageupload->image_extensions = "jpg,gif,png,jpeg"; 
				if(false == $objImageupload->upload()){
					$error = $objImageupload->errorMsg();
					echo "Error : ".$error;
				}				
				$outputFileName		= $objImageupload->file_name;
				$destinationPath	= $objImageupload->storing_directory;
				$objImageEditor = new ImageEditor($objImageupload->file_name, $objImageupload->storing_directory);
				$objImageEditor->resizeInProportion($objImageEditor->getWidth(),$objImageEditor->getHeight(),320);
				$objImageEditor->outputFile($outputFileName, $destinationPath);
				chmod($objImageupload->storing_directory.$objImageupload->file_name,0777);
				*/
					/*		
					$image_height = 320;
					$image_width  =	400;
					$arfilename = $objUpload->upload($id,'file_name',IMAGE_UPLOAD_PATH,'jpeg,gif,png,JPG,JPEG,jpeg');
					$filename   = $arfilename[0];
					//$objUpload->smart_resize_image(IMAGE_UPLOAD_PATH.$arfilename[0],$image_height,$image_width,IMAGE_UPLOAD_PATH,true,$arfilename[0],false);
					*/
					
					// $image->load(IMAGE_UPLOAD_PATH.$arfilename[0]);
					// $image->resize(320,316);
					// $image->save(IMAGE_UPLOAD_PATH.$arfilename[0]);
					// $WaterMarkText = "fototime.com";			
					// $image->watermarkImage (IMAGE_UPLOAD_PATH.$arfilename[0], $WaterMarkText, //IMAGE_UPLOAD_PATH.$arfilename[0]);
					 include("../classes/imageslice.php");
					 ECHO IMAGE_UPLOAD_PATH.$filename;

					 $slice = new ImageSlicer($id,IMAGE_UPLOAD_PATH.$filename,1,4);
					 //$slice->set_border(1);
					 $arrImage = $slice->show_image();
					 $arrUpdate['image_head'] = $arrImage[1];	
					 $arrUpdate['image_eyes'] = $arrImage[2];	
					 $arrUpdate['image_nose'] = $arrImage[3];	
					 $arrUpdate['image_mouth'] = $arrImage[4];
					 $arConditions 	= array('id'=>$id);
					if($objPhotos->update($table,$arrUpdate,$arConditions)){
					//echo $error = "<font class='error'>Photo Uploaded Successfully</font>";
					die();
					?>
						<script>setTimeout("window.location.href='photos.php'", 1000);</script>
					 <?}
					
					/*
					$objUpload->smart_resize_image(IMAGE_UPLOAD_PATH.$arfilename[0],$image_height,$image_width,HEAD_IMAGE_UPLOAD_PATH,true,$arfilename[0],false);
					$objUpload->smart_resize_image(EYES_IMAGE_UPLOAD_PATH.$arfilename[0],$image_height,$image_width,IMAGE_UPLOAD_PATH,true,$arfilename[0],false);

					$objUpload->smart_resize_image(NOSE_IMAGE_UPLOAD_PATH.$arfilename[0],$image_height,$image_width,IMAGE_UPLOAD_PATH,true,$arfilename[0],false);
					$objUpload->smart_resize_image(MOUTH_IMAGE_UPLOAD_PATH.$arfilename[0],$image_height,$image_width,IMAGE_UPLOAD_PATH,true,$arfilename[0],false);
				
					//unlink(IMAGE_UPLOAD_PATH.$filename);
					*/

					
				//	$arFieldValuesUpdate += array("emp_image"=>$filename);				
				// if(isset($filename) && $filename != ""){						
				//	$arConditions = array("id"=>$id);
					//$objPhotos->update($table,$arFieldValuesUpdate,$arConditions);
				//}
				die();
			}else{
				ob_end_clean();
				header("Location: photos.php");
				exit;
			}
	}
?>
<br/>
<table width='100%' align ='center' cellpadding='2' cellspacing='2' border='0'>
	<form name ='add_page' id ='add_page'method ='POST' action ='' enctype='multipart/form-data'>
		<tr class='even'>
			<td valign='top' align='center' colspan='2' class='tableHeader'><?=$photoLabel;?></td>
		</tr>
				<?if(is_array($arrError) && count($arrError)){?>
					<tr class='odd'>
						<td valign='top' align='left' colspan='2' class='error'>		
							<?foreach($arrError as $error){?>
								<?=$error;?><br/>
							<?}?>	
						</td>
					</tr>
				<?}?>
				<tr class='odd'>
					<td valign='top' align='left' width='30%' class='label'>Title</td>
					<td valign='top' align='left' width='70%'><input type ='text' name='title' value ='<?=$title;?>'></td>
				</tr>
				<tr class='even'>
					<td valign='top' align='left' width='30%' class='label'>Upload Photo</td>
					<td valign='top' align='left' width='70%'><input type ='file' name='file_name' value =''></td>
				</tr>
				<tr class='odd'>
					<td valign='top' colspan='2' align='right'>
						<input type ='button'  class='btnReset' name='back' id ='back' value ='Back' onClick='javascript:history.back(-1);'>
						<input type ='hidden' name ='id' id ='id' value ='<?=$id;?>'>
						<input type ='submit' class='btnSubmit' name='submit' id ='submit' value ='Submit'>
				</td>
	</tr>
</form>
</table>