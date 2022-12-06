<?php  

function loginControl(){
	if(intval($_SESSION['userID']) < 1){
	   header("location: login.php");
	   exit;
	}
}

//*************************************************************************************************************************************

function generateRandomString($length = 10) {
	$characters = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;	
}

//*************************************************************************************************************************************

function homeFind($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("SELECT * FROM home WHERE ID = ?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
}

function homeList() {
	global $db;

	$result = $db->prepare("SELECT *  FROM home");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function homeAdd() {
	global $db;

	if (isset($_POST['ekle'])) {
		$Header = $_POST['Header'];
		$Header_Link = $_POST['Header_Link'];
		$Content = $_POST['Content'];
		$Content_underline = $_POST['Content_underline'];
		$Status = $_POST['Status'];

		if($Status == 1) 
		{
			$sorgu = $db->query("UPDATE home SET Status=0");
		}

		$sorgu = $db->prepare("INSERT INTO home(Header, Header_Link, Content, Content_underline, Status) VALUES(?,?,?,?,?)");

		$ekle = $sorgu->execute([$Header, $Header_Link, $Content, $Content_underline, $Status]);
		if ($ekle) {
			header('location: home.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}           
	}
}

function homeDelete($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("DELETE FROM home WHERE ID=?");
	if($result->execute(array($ID))) {
		return true;
	}else{
		return false;
	}
}

function homeEdit($ID) {
	global $db;

	if (isset($_POST['guncelle'])) {

		$Header = $_POST['Header'];
		$Header_Link = $_POST['Header_Link'];
		$Content = $_POST['Content'];
		$Content_underline = $_POST['Content_underline'];
		$Status = $_POST['Status'];

		if($Status == 1)
		{
			$sorgu = $db->query("UPDATE home SET Status=0");
		}

		$sorgu = $db->prepare("UPDATE home SET Header=?, Header_Link=?, Content=?, Content_underline=?, Status=? WHERE ID = ?");

		$ekle = $sorgu->execute([$Header, $Header_Link, $Content, $Content_underline, $Status, $ID]);
		if ($ekle) {
			header('location: home.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}
	}
}

//*************************************************************************************************************************************

function mainmenuFind($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("SELECT * FROM main_menu WHERE ID = ?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
}

function mainmenuList() {
	global $db;

	$result = $db->prepare("SELECT *  FROM main_menu");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function mainmenuAdd() {
	global $db;

	if (isset($_POST['ekle'])) {
		$Name = $_POST['Name'];
		$Link = $_POST['Link'];
		$OrderNumber = $_POST['OrderNumber'];
		$Status = $_POST['Status'];

		$sorgu = $db->prepare("INSERT INTO main_menu(Name, Link, OrderNumber, Status) VALUES(?,?,?,?)");

		$ekle = $sorgu->execute([$Name, $Link, $OrderNumber, $Status]);
		if ($ekle) {
			header('location: menu.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}           
	}
}

function mainmenuDelete($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("DELETE FROM main_menu WHERE ID=?");
	if($result->execute(array($ID))) {
		return true;
	}else{
		return false;
	}
}

function mainmenuEdit($ID) {
	global $db;

	if (isset($_POST['guncelle'])) {
		$Name = $_POST['Name'];
		$Link = $_POST['Link'];
		$OrderNumber = $_POST['OrderNumber'];
		$Status = $_POST['Status'];

		$sorgu = $db->prepare("UPDATE main_menu SET Name=?, Link=?, OrderNumber=?, Status=? WHERE ID = ?");

		$ekle = $sorgu->execute([$Name, $Link, $OrderNumber, $Status, $ID]);
		if ($ekle) {
			header('location: menu.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}
	}
}

//*************************************************************************************************************************************

function socialmediaFind($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("SELECT * FROM socialmedia WHERE ID = ?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
}

function socialmediaList() {
	global $db;

	$result = $db->prepare("SELECT *  FROM socialmedia");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function socialmediaEdit($ID) {
	global $db;

	if (isset($_POST['guncelle'])) {

		$Name = $_POST['Name'];
		$Link = $_POST['Link'];
		$Icon = $_POST['Icon'];
		$Target = $_POST['Target'];
		$Status = $_POST['Status'];

		$sorgu = $db->prepare("UPDATE socialmedia SET Name=?, Link=?, Icon=?, Target=?, Status=? WHERE ID = ?");

		$ekle = $sorgu->execute([$Name, $Link, $Icon, $Target, $Status, $ID]);
		if ($ekle) {
			header('location: socialmedia.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}
	}
}

//*************************************************************************************************************************************

function skillFind($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("SELECT * FROM skill WHERE ID = ?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
}

function skillList() {
	global $db;

	$result = $db->prepare("SELECT *  FROM skill");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function skillAdd() {
	global $db;

	if (isset($_POST['ekle'])) {
		$Name = $_POST['Name'];
		$Value = $_POST['Value'];
		$Status = $_POST['Status'];

		$sorgu = $db->prepare("INSERT INTO skill(Name, Value, Status) VALUES(?,?,?)");

		$ekle = $sorgu->execute([$Name, $Value, $Status]);
		if ($ekle) {
			header('location: skill.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}           
	}
}

function skillDelete($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("DELETE FROM skill WHERE ID=?");
	if($result->execute(array($ID))) {
		return true;
	}else{
		return false;
	}
}

function skillEdit($ID) {
	global $db;

	if (isset($_POST['guncelle'])) {
		$Name = $_POST['Name'];
		$Value = $_POST['Value'];
		$Status = $_POST['Status'];

		$sorgu = $db->prepare("UPDATE skill SET Name=?, Value=?, Status=? WHERE ID = ?");

		$ekle = $sorgu->execute([$Name, $Value, $Status, $ID]);
		if ($ekle) {
			header('location: skill.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}
	}
}

//*************************************************************************************************************************************

function aboutFind($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("SELECT * FROM about WHERE ID = ?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
}

function aboutList() {
	global $db;

	$result = $db->prepare("SELECT *  FROM about");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function AboutAdd() {
	global $db;
	include 'plugins/class.upload.php';
	$errEmpty = array();
	$errOther = array();

	if (isset($_POST['ekle'])) {
		$Name = $_POST['Name'];
		$Content1 = $_POST['Content1'];
		$Content2 = $_POST['Content2'];
		$Birthday = $_POST['Birthday'];
		$Web = $_POST['Web'];
		$Adress = $_POST['Adress'];
		$Adress_Link = $_POST['Adress_Link'];
		$Target = $_POST['Target'];
		$Phone = $_POST['Phone'];
		$City = $_POST['City'];
		$Age = $_POST['Age'];
		$Degree = $_POST['Degree'];
		$Mail = $_POST['Mail'];
		$Freelance = $_POST['Freelance'];
		$Status = $_POST['Status'];


	   if ($_FILES['Images']['name'] != '') {
		  $handle = new Upload($_FILES['Images']);
		  if ($handle->uploaded) {
			 $handle->image_resize   = true;
	//$handle->image_resize          = true;
	//$handle->image_ratio_y         = true;
			 $handle->image_x               = 600;
			 $handle->image_y               = 680;
			 $handle->auto_create_dir    = true;
			 $handle->file_auto_rename   = true;
			 $handle->file_safe_name   = true;
	//$handle->file_max_size    = $sql['img_upload_limit'];
			 $handle->allowed      = array('image/*');
			 $handle->file_new_name_body = time()."-".generateRandomString(3);
			 $targetPath = "../uploads/about";
			 $handle->process($targetPath);
			 if ($handle->processed) {
				$Images = $handle->file_dst_name;
	   //$Images = $handle->file_new_name_body;
				$return = $targetPath. $handle->file_dst_name;
			 }

		  } else {
			 $errOther[] = "Resim Yüklenemedi";
		  }
	   }
	   
	if(count($errEmpty) == 0 && count($errOther) == 0)
	{
	   $sorgu = $db->prepare("INSERT INTO about(Name, Content1, Content2, Birthday, Web, Adress, Adress_Link, Images, Target, Phone, City, Age, Degree, Mail, Freelance, Status) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

	   $ekle = $sorgu->execute([$Name, $Content1, $Content2, $Birthday, $Web, $Adress, $Adress_Link, $Images, $Target, $Phone, $City, $Age, $Degree, $Mail, $Freelance, $Status]);
	   if ($ekle) {
		foreach ($_POST['ilgi'] as $value) {
			$sorgu = $db->query("INSERT INTO interestedabout(AboutID, InsterestedID) VALUES('".$db->lastInsertId()."', '".$value."')");
		}
		  header('location: about.php');
	   } else {
		  $hata = $sorgu->errorInfo();
		  echo 'mysql Hatası'.$hata[2];
	   }           
	}

	return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
 }
}

function aboutDelete($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("DELETE FROM about WHERE ID=?");
	if($result->execute(array($ID))) {
		return true;
	}else{
		return false;
	}
}

function AboutResimEdit($ID){
	global $db;
	include 'plugins/class.upload.php';
	if (!empty($_FILES['Images']['name'])) {
	   $handle = new Upload($_FILES['Images']);
	   if ($handle->uploaded) {
		  $handle->image_resize   = true;
			 //$handle->image_resize          = true;
			 //$handle->image_ratio_y         = true;
		  $handle->image_x               = 600;
		  $handle->image_y               = 680;
		  $handle->auto_create_dir    = true;
		  $handle->file_auto_rename   = true;
		  $handle->file_safe_name   = true;
			 //$handle->file_max_size    = $sql['img_upload_limit'];
		  $handle->allowed      = array('image/*');
		  $handle->file_new_name_body = time()."-".generateRandomString(3);
		  $targetPath = "../uploads/about";
		  $handle->process($targetPath);
		  if ($handle->processed) {
			 $Images = $handle->file_dst_name;
			 $sorgu = $db->prepare("UPDATE about SET Images=? WHERE ID = ?");
			 $ekle = $sorgu->execute([$Images, $ID]);
			 //$Images = $handle->file_new_name_body;
			 $return = $targetPath. $handle->file_dst_name;
		  }
   
	   } else {
		  $errOther[] = "Resim Yüklenemedi";
	   }
	}
   }

function aboutEdit($ID) {
	global $db;

	if (isset($_POST['guncelle'])) {
		//print_r($_POST);exit;
		AboutResimEdit($ID);
		$Name = $_POST['Name'];
		$Content1 = $_POST['Content1'];
		$Content2 = $_POST['Content2'];
		$Birthday = $_POST['Birthday'];
		$Web = $_POST['Web'];
		$Adress = $_POST['Adress'];
		$Adress_Link = $_POST['Adress_Link'];
		$Target = $_POST['Target'];
		$Phone = $_POST['Phone'];
		$City = $_POST['City'];
		$Age = $_POST['Age'];
		$Degree = $_POST['Degree'];
		$Mail = $_POST['Mail'];
		$Freelance = $_POST['Freelance'];
		$Status = $_POST['Status'];

		$db->query("DELETE FROM interestedabout WHERE AboutID =".$ID);
		foreach ($_POST['ilgi'] as $value) {
			$sorgu = $db->query("INSERT INTO interestedabout(AboutID, InsterestedID) VALUES('".$ID."', '".$value."')");
		}
		$sorgu = $db->prepare("UPDATE about SET Name=?, Content1=?, Content2=?, Birthday=?, Web=?, Adress=?, Adress_Link=?, Target=?, Phone=?, City=?, Age=?, Degree=?, Mail=?, Freelance=?, Status=? WHERE ID = ?");

		$ekle = $sorgu->execute([$Name, $Content1, $Content2, $Birthday, $Web, $Adress, $Adress_Link, $Target, $Phone, $City, $Age, $Degree, $Mail, $Freelance, $Status,  $ID]);
		if ($ekle) {
			header('location: about.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}
	}
}

//*************************************************************************************************************************************

function aboutimagesFind($ID) {
	global $db;

	$result = $db->prepare("SELECT * FROM aboutimages WHERE ID=?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
}

function aboutimagesList($AboutID) {
	global $db;

	$result = $db->prepare("SELECT * FROM aboutimages WHERE AboutID=?");
	$result->execute(array($AboutID));
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function aboutimagesAdd() {
	global $db;
	include 'plugins/class.upload.php';
	$errEmpty = array();
	$errOther = array();

	if (isset($_POST['ekle'])) {
		$AboutID = intval($_GET['AboutID']);
		$Name = $_POST['Name'];
		$Status = $_POST['Status'];


	   if ($_FILES['Images']['name'] != '') {
		  $handle = new Upload($_FILES['Images']);
		  if ($handle->uploaded) {
			 $handle->image_resize   = true;
	//$handle->image_resize          = true;
	//$handle->image_ratio_y         = true;
			 $handle->image_x               = 600;
			 $handle->image_y               = 680;
			 $handle->auto_create_dir    = true;
			 $handle->file_auto_rename   = true;
			 $handle->file_safe_name   = true;
	//$handle->file_max_size    = $sql['img_upload_limit'];
			 $handle->allowed      = array('image/*');
			 $handle->file_new_name_body = time()."-".generateRandomString(3);
			 $targetPath = "../uploads/about";
			 $handle->process($targetPath);
			 if ($handle->processed) {
				$Images = $handle->file_dst_name;
	   //$Images = $handle->file_new_name_body;
				$return = $targetPath. $handle->file_dst_name;
			 }

		  } else {
			 $errOther[] = "Resim Yüklenemedi";
		  }
	   }
	   
	if(count($errEmpty) == 0 && count($errOther) == 0)
	{
	   $sorgu = $db->prepare("INSERT INTO aboutimages(AboutID, Name, Images, Status) VALUES(?,?,?,?)");

	   $ekle = $sorgu->execute([$AboutID, $Name, $Images, $Status]);
	   if ($ekle) {
		  header('location: about_images.php?AboutID='.$AboutID);
	   } else {
		  $hata = $sorgu->errorInfo();
		  echo 'mysql Hatası'.$hata[2];
	   }           
	}

	return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
 }
}

function aboutimagesDelete($ID) {
	global $db;
 
	$ID = intval($ID);

	$result = $db->prepare("DELETE FROM aboutimages WHERE ID=?");
	if($result->execute(array($ID))) {
		return true;
	}else{
		return false;
	}
}

function AboutImagesResimEdit($ID){
	global $db;
	include 'plugins/class.upload.php';
	if (!empty($_FILES['Images']['name'])) {
	   $handle = new Upload($_FILES['Images']);
	   if ($handle->uploaded) {
		  $handle->image_resize   = true;
			 //$handle->image_resize          = true;
			 //$handle->image_ratio_y         = true;
		  $handle->image_x               = 600;
		  $handle->image_y               = 680;
		  $handle->auto_create_dir    = true;
		  $handle->file_auto_rename   = true;
		  $handle->file_safe_name   = true;
			 //$handle->file_max_size    = $sql['img_upload_limit'];
		  $handle->allowed      = array('image/*');
		  $handle->file_new_name_body = time()."-".generateRandomString(3);
		  $targetPath = "../uploads/about";
		  $handle->process($targetPath);
		  if ($handle->processed) {
			 $Images = $handle->file_dst_name;
			 $sorgu = $db->prepare("UPDATE aboutimages SET Images=? WHERE ID = ?");
			 $ekle = $sorgu->execute([$Images, $ID]);
			 //$Images = $handle->file_new_name_body;
			 $return = $targetPath. $handle->file_dst_name;
		  }
   
	   } else {
		  $errOther[] = "Resim Yüklenemedi";
	   }
	}
   }

function aboutimagesEdit($ID) {
	global $db;

	if (isset($_POST['guncelle'])) {
		$AboutID = intval($_GET['AboutID']);
		//print_r($_POST);exit;
		AboutImagesResimEdit($ID);
		$Name = $_POST['Name'];
		$Status = $_POST['Status'];

		$sorgu = $db->prepare("UPDATE aboutimages SET Name=?,Status=? WHERE ID = ?");

		$ekle = $sorgu->execute([$Name, $Status,  $ID]);
		if ($ekle) {
			header('location: about_images.php?AboutID='.$AboutID);
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}
	}
}

//*************************************************************************************************************************************

function ProjectsFind($ID) {
	global $db;


	if(!is_numeric($ID)){
	   exit("Numeric değer değil");
	}

	$ID = intval($ID);

	$result = $db->prepare("SELECT * FROM projects WHERE ID = ?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
 }

 function ProjectsAdd() {
	global $db;
	include 'class/class.upload.php';
	$errEmpty = array();
	$errOther = array();

	if (isset($_POST['ekle'])) {
	   $Name = $_POST['Name'];
	   $Link = $_POST['Link'];
	   $Target = $_POST['Target'];
	   $Status = $_POST['Status'];

	   if (empty($Name)) {
		  $errEmpty[] = "İsim alanını boş bırakmayınız.";
	   }
	   if (empty($Link)) {
		$errEmpty[] = "Link alanını boş bırakmayınız.";
	 }
	   if ($_FILES['Images']['name'] != '') {
		  $handle = new Upload($_FILES['Images']);
		  if ($handle->uploaded) {
			 $handle->image_resize   = true;
	//$handle->image_resize          = true;
	//$handle->image_ratio_y         = true;
			 $handle->image_x               = 800;
			 $handle->image_y               = 600;
			 $handle->auto_create_dir    = true;
			 $handle->file_auto_rename   = true;
			 $handle->file_safe_name   = true;
	//$handle->file_max_size    = $sql['img_upload_limit'];
			 $handle->allowed      = array('image/*');
			 $handle->file_new_name_body = time()."-".generateRandomString(3);
			 $targetPath = "../uploads/projects";
			 $handle->process($targetPath);
			 if ($handle->processed) {
				$Images = $handle->file_dst_name;
	   //$Images = $handle->file_new_name_body;
				$return = $targetPath. $handle->file_dst_name;
			 }

		  } else {
			 $errOther[] = "Resim Yüklenemedi";
		  }
	   }
	   
 /*$uzanti = end(explode(".",$_FILES["Images"]["name"]));
 if ($uzanti == "png" || $uzanti == "jpeg" || $uzanti == "jpg" || $uzanti == "JPG") {
	  $finfo = new finfo();
	  $fileinfo = $finfo->file($_FILES["Images"]["tmp_name"], FILEINFO_MIME);
	  if($fileinfo == 'image/png; charset=binary' || $fileinfo == 'image/jpeg; charset=binary' || $fileinfo == 'image/jpg; charset=binary')
	  {
		  $resimAdi = time()."-".generateRandomString(3).".".$uzanti;
		  $resimYolu = "../images/slider/bg/".$resimAdi;
		  if (move_uploaded_file($_FILES["Images"]["tmp_name"], $resimYolu)) 
		  {
			 $Images = $resimAdi;
		  }else{
			 $errOther[] = "Resim Yüklenemedi";
		  }
	  }
	}
	else{
	   $errOther[] = "Dosya uzantısı: png, jpg, jpeg olmalıdır.";
	}*/

	if(count($errEmpty) == 0 && count($errOther) == 0)
	{
	   $sorgu = $db->prepare("INSERT INTO projects(Images, Name, Link, Target, Status) VALUES(?,?,?,?,?)");

	   $ekle = $sorgu->execute([$Images, $Name, $Link, $Target, $Status]);
	   if ($ekle) {
		  header('location: projects.php');
	   } else {
		  $hata = $sorgu->errorInfo();
		  echo 'mysql Hatası'.$hata[2];
	   }           
	}

	return array("errOther"=>$errOther, "errEmpty"=>$errEmpty);
 }
}

function ProjectsList() {
 global $db;

 $result = $db->prepare("SELECT * FROM projects");
 $result->execute();
 $line = $result->fetchAll(PDO::FETCH_ASSOC);
 return $line;
}

function ProjectsDelete($ID) {
 global $db;


 if(!is_numeric($ID)){
	exit("Numeric değer değil");
 }

 $ID = intval($ID);

 $result = $db->prepare("DELETE FROM projects WHERE ID=?");
 if($result->execute(array($ID))) {
	unlink("../uploads/projects/".$_GET['Images']);
	return true;
 }else{
	return false;
 }
}
function ProjectsResimEdit($ID){
 global $db;
 include 'class/class.upload.php';
 if (!empty($_FILES['Images']['name'])) {
	$handle = new Upload($_FILES['Images']);
	if ($handle->uploaded) {
	   $handle->image_resize   = true;
		  //$handle->image_resize          = true;
		  //$handle->image_ratio_y         = true;
	   $handle->image_x               = 800;
	   $handle->image_y               = 600;
	   $handle->auto_create_dir    = true;
	   $handle->file_auto_rename   = true;
	   $handle->file_safe_name   = true;
		  //$handle->file_max_size    = $sql['img_upload_limit'];
	   $handle->allowed      = array('image/*');
	   $handle->file_new_name_body = time()."-".generateRandomString(3);
	   $targetPath = "../uploads/projects";
	   $handle->process($targetPath);
	   if ($handle->processed) {
		  $Images = $handle->file_dst_name;
		  $sorgu = $db->prepare("UPDATE projects SET Images=? WHERE ID = ?");
		  $ekle = $sorgu->execute([$Images, $ID]);
		  //$Images = $handle->file_new_name_body;
		  $return = $targetPath. $handle->file_dst_name;
	   }

	} else {
	   $errOther[] = "Resim Yüklenemedi";
	}
 }
}
function ProjectsEdit($ID) {
 global $db;

 if (isset($_POST['guncelle'])) {
	ProjectsResimEdit($ID);

	$Name = $_POST['Name'];
	$Link = $_POST['Link'];
	$Target = $_POST['Target'];
	$Status = $_POST['Status'];

	if($Name == ""){
		$errOther[] = "İsim alanını Boş bırakmayınız";
	}

	if($Link == ""){
		$errOther[] = "İsim alanını Boş bırakmayınız";
	}
	if(count($errOther) == 0){
	$sorgu = $db->prepare("UPDATE projects SET Name=?, Link=?, Target=?, Status=? WHERE ID = ?");

	$ekle = $sorgu->execute([$Name, $Link, $Target, $Status, $ID]);
	if ($ekle) {
	   return true;
	} else {
	   $hata = $sorgu->errorInfo();
	   $errOther[] = 'mysql Hatası:'.$hata[2];
	   $errOther[] = "Mysql sorgusu hatalı";
	}
 }
	return $errOther;
 }
}

//*************************************************************************************************************************************
function interestedAboutList($aboutID) 
{

	global $db;

	$sorgu = $db->prepare("SELECT * FROM interestedabout WHERE AboutID=?");
	$sorgu->execute([$aboutID]);
	$line = $sorgu->fetchAll(PDO::FETCH_ASSOC);
	return $line;

}

function interestsFind($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("SELECT * FROM interests WHERE ID = ?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
}

function interestsList() {
	global $db;


	$result = $db->prepare("SELECT *  FROM interests");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function interestsEdit($ID) {
	global $db;

	if (isset($_POST['guncelle'])) {
		$Name = $_POST['Name'];
		$Status = $_POST['Status'];

		$sorgu = $db->prepare("UPDATE interests SET Name=?, Status=? WHERE ID = ?");

		$ekle = $sorgu->execute([$Name, $Status, $ID]);
		if ($ekle) {
			header('location: interests.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}
	}
}

//*************************************************************************************************************************************

function usersList() {
	
	global $db;

	$result = $db->prepare("SELECT *  FROM users");
	$result->execute();
	if($result->rowCount() > 0) {
		$line = $result->fetch(PDO::FETCH_ASSOC);
		return $line;
	}
}

function aboutSingleList() {
	global $db;

	$result = $db->prepare("SELECT *  FROM about");
	$result->execute();
	$line = $result->fetch(PDO::FETCH_ASSOC);
	return $line;
}

//*************************************************************************************************************************************

function ProfileFind($ID) {
	global $db;

	$ID = intval($ID);

	$result = $db->prepare("SELECT * FROM users WHERE ID = ?");
	$result->execute(array($ID));
	$line = $result->fetch(PDO::FETCH_ASSOC);

	return $line;
}

function ProfileList() {
	global $db;

	$result = $db->prepare("SELECT *  FROM users");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function ProfileResimEdit($ID){
	global $db;
	include 'class/class.upload.php';
	if (!empty($_FILES['Images']['name'])) {
	   $handle = new Upload($_FILES['Images']);
	   if ($handle->uploaded) {
		  $handle->image_resize   = true;
			 //$handle->image_resize          = true;
			 //$handle->image_ratio_y         = true;
		  $handle->image_x               = 48;
		  $handle->image_y               = 48;
		  $handle->auto_create_dir    = true;
		  $handle->file_auto_rename   = true;
		  $handle->file_safe_name   = true;
			 //$handle->file_max_size    = $sql['img_upload_limit'];
		  $handle->allowed      = array('image/*');
		  $handle->file_new_name_body = time()."-".generateRandomString(3);
		  $targetPath = "../uploads/users";
		  $handle->process($targetPath);
		  if ($handle->processed) {
			 $Images = $handle->file_dst_name;
			 $sorgu = $db->prepare("UPDATE users SET Images=? WHERE ID = ?");
			 $ekle = $sorgu->execute([$Images, $ID]);
			 //$Images = $handle->file_new_name_body;
			 $return = $targetPath. $handle->file_dst_name;
		  }
   
	   } else {
		  $errOther[] = "Resim Yüklenemedi";
	   }
	}
   }

function ProfileEdit($ID) {
	global $db;

	if (isset($_POST['guncelle'])) {
		ProfileResimEdit($ID);
		$Name = $_POST['Name'];
		$Email = $_POST['Email'];
		$Password = $_POST['Password'];

		$sorgu = $db->prepare("UPDATE users SET Name=?, Email=?, Password=? WHERE ID = ?");

		$ekle = $sorgu->execute([$Name, $Email, $Password, $ID]);
		if ($ekle) {
			header('location: profile.php');
		} else {
			$hata = $sorgu->errorInfo();
			echo 'mysql Hatası'.$hata[2];
		}
	}
}

//*************************************************************************************************************************************

function FilesList() {
	global $db;

	$result = $db->prepare("SELECT *  FROM files");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

?>