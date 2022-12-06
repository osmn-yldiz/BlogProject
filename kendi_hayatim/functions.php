<?php

require 'class/phpmailer/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function HomeList()
{
	global $db;

	$result = $db->prepare("SELECT * FROM home WHERE Status=1");
	$result->execute();
	$line = $result->fetch(PDO::FETCH_ASSOC);
	return $line;
}

function mainMenuList()
{
	global $db;

	$result = $db->prepare("SELECT * FROM main_menu WHERE Status=1 ORDER BY OrderNumber ASC");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;
}

function SocialMediaList()
{
	global $db;

	$result = $db->prepare("SELECT * FROM socialmedia WHERE Status=1 AND Link!=''");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;

}

function aboutList($SeoName) 
{
	global $db;

	//$ID = intval($ID);

	$result = $db->prepare("SELECT * FROM about WHERE SeoName=? AND Status=1");
	$result->execute([$SeoName]);
	if($result->rowCount() > 0){
		$line = $result->fetch(PDO::FETCH_ASSOC);
		return $line;
	}
	else{
		header("location:index.php");
		exit;
	}

}

function aboutImages ($aboutID) 
{
	global $db, $database;

	$aboutID = intval($aboutID);

	$result = $db->prepare("SELECT * FROM aboutimages WHERE aboutID=? AND Status=1");
	$result->execute([$aboutID]);
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;

}

function SkillList()
{
	global $db;

	$result = $db->prepare("SELECT * FROM skill WHERE Status=1");
	$result->execute();
	$line = $result->fetchAll(PDO::FETCH_ASSOC);
	return $line;

}

function mailSend($gidecek_mail, $subject, $message) {
	$mail = new PHPMailer();

	try {
		    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
		    $mail->isSMTP();                                            //Send using SMTP
		    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
		    $mail->Username   = 'smtp.osmannyldz7878@gmail.com';                     //SMTP username
		    $mail->Password   = 'Oy621207.';                               //SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $mail->Port       = 587; 
		    $mail->CharSet = 'utf-8';
		    //Recipients
		    $mail->setFrom('smtp.osmannyldz7878@gmail.com', 'Osman Yıldız');
		    $mail->addAddress($gidecek_mail);               //Name is optional
		    //$mail->addReplyTo('info@example.com', 'Information');
		    //$mail->addCC('ramazansen.tr@gmail.com');
		    //$mail->addBCC('ramazansen.tr@gmail.com');

		    //Attachments
		    /*
		    if ($durum == 2) {
		    	$mail->addAttachment('C:/xampp/htdocs/osman/arizabildirim_twig/img/1_1598452306_resim.png', 'doga.png');
		    }
		    else if($durum == 5) {
		    	$mail->addAttachment('C:/xampp/htdocs/osman/arizabildirim_twig/ek_mail_dosyalar/pdf/asalsayilar.pdf', 'asalsayilar.pdf');
		    }*/
		    
		    
		    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

		    //Content
		    $mail->isHTML(true);                                  //Set email format to HTML
		    $mail->Subject = $subject;
		    $mail->Body    = $message;
		    $mail->AltBody = $message;

		    if($mail->send()){
		    	return true;
		    }
		   // print_r($mail->ErrorInfo);

		} 
		catch (Exception $e) 
		{
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

function ContactAdd($name, $email, $subject, $message) {

		global $db;

		$sorgu = $db->prepare("INSERT INTO inbox(name, email, subject, message, CreateDate) VALUES(?,?,?,?, NOW())");
		if($sorgu->execute([$name, $email, $subject, $message])){
			return 1;
		}else{
			return  0;
		}


}

function generateRandomString($length = 10) {
		$characters = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;	
}

function projectsList() 
{

	global $db;

	$sorgu = $db->prepare("SELECT * FROM projects WHERE Status = 1");
	$sorgu->execute();
	$line = $sorgu->fetchAll(PDO::FETCH_ASSOC);
	return $line;

}

function interestsList() 
{

	global $db;

	$sorgu = $db->prepare("SELECT * FROM interests WHERE Status = 1");
	$sorgu->execute();
	$line = $sorgu->fetchAll(PDO::FETCH_ASSOC);
	return $line;

}


function interestsArrayList() 
{

	global $db;

	$sorgu = $db->prepare("SELECT * FROM interests WHERE Status = 1");
	$sorgu->execute();
	$line = $sorgu->fetchAll(PDO::FETCH_ASSOC);
	foreach($line as $key=>$value) 
	{
		$Name[$value['ID']] = $value['Name'];
		$Icon[$value['ID']] = $value['Icon'];
		$Color[$value['ID']] = $value['Color'];

	}
	return array($Name, $Icon, $Color);

}

function interestedAboutList($aboutID) 
{

	global $db;

	$sorgu = $db->prepare("SELECT * FROM interestedabout WHERE AboutID=?");
	$sorgu->execute([$aboutID]);
	$line = $sorgu->fetchAll(PDO::FETCH_ASSOC);
	return $line;

}

?>