<?
$fileName = $_FILES['file']['name'];
$fileType = $_FILES['file']['type'];
$fileError = $_FILES['file']['error'];
$fileContent = file_get_contents($_FILES['file']['tmp_name']);

$img='';

//************************************************************************************
if(isset($_FILES['file']['name']) && $_FILES['file']['name']!="" && $_FILES['file']['size']<2605600){
	$ext = substr(strrchr($_FILES['file']['name'], '.'), 1);
	$allowed = array( 'jpg'=>true,'jpeg'=>true,'JPG'=>true,'JPEG'=>true);
	
	$len = 4;
	$base="abcdefghjkmnpqrstwxyzabcdefghjkmnpqrstwxyzabcdefghjkmnpqrstwxyz123456789";
	$max=strlen($base)-1;
	$pre='';
	mt_srand((double)microtime()*1000000);
	while (strlen($pre)<$len+1)
	$pre.=$base{mt_rand(0,$max)};

	if($ext=="JPG" || $ext=="JPEG" || $ext=="jpg" || $ext=="jpeg")
	{
		$photo_name=$pre.$_FILES['file']['name'];		
		$photo_name=str_replace("_","",$photo_name);
		
		
		$path=__DIR__."/modules/Quiz/files/$photo_name";

		if($allowed[$ext]=="true"){
			if (file_exists("/modules/Quiz/files/$photo_name"))unlink(path);
			copy($_FILES['file']['tmp_name'], $path);
			$img='<img src="/modules/Quiz/files/'.$photo_name.'">';
		}
	}
}
//************************************************************************************


//echo $img;



      echo json_encode(array(
               'img' => $img,
			   'name' => $photo_name
            ));
			
?>