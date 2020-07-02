<?php 
function IsNullOrEmptyString($str){
    return (!isset($str) || strlen($str) === 0);
}

$name = $_POST['name'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$message = $_POST['message'];
$age = $_POST['age'];
$city = $_POST['city'];
$rationale = $_POST['rationale'];
$experience = $_POST['experience'];
$marketing = $_POST['marketing'];
$investment = $_POST['investment'];


require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mail.adm.tools';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'franchise@browncup.ua';                 // SMTP username
$mail->Password = '101xG3bTreCX'; 
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('franchise@browncup.ua', 'BrownCup.ua');
$mail->addAddress($email);     // Add a recipient

$mail->Subject = 'Франшиза кофейни BrownCup';

$isFranchiseMessage = IsNullOrEmptyString($message);
$body = "";
$altBody = "";

if($isFranchiseMessage) {
	$body = "Здравствуйте, ".$name."!"
			."<br /><br />Вас приветствует сеть уличных кофеен с особым подходом к приготовлению кофе Brown Cup."
			."<br /><br />Мы очень ценим Вашу заинтересованность партнерством с нами."
			."<br />Ценим Ваше время, и потому в этом письме мы высылаем Вам презентацию с описанием нашего предложения, преимуществами, обзором деятельности нашей сети сегодня, а также финансовую модель с необходимыми показателями в цифрах - в общем то,   что поможет Вам сформировать для себя определённое мнение о нашей франшизе."
			."<br /><br />Скачайте файлы, ознакомьтесь, проанализируйте, и в ближайшие дни мы свяжемся с Вами для обсуждения возможности дальнейшего сотрудничества."
			." Если Вас заинтересует более подробная информация - мы с удовольствием встретимся с Вами для обсуждения деталей нашей бизнес-модели и финансовых показателей."
			."<br /><br />Хорошего времени суток.;)"
			."<br />Будем на связи!"
			."<br /><br />С уважением, команда Brown Cup."
			."<br /><br />P.S. Ссылка на презентацию здесь - https://drive.google.com/file/d/1upy-v0-fxvwzkClG08XzbPHVrrrVc3lD/view?usp=sharing"
			."<br /><br />P.P.S. Ссылка на финансовую модель здесь - https://drive.google.com/file/d/1Gru6UPk2lASG2ODlTqr_6t7Rz4qrcW3-/view?usp=sharing";

	$altBody = "Здравствуйте, ".$name."!"
				."\r\n\r\nВас приветствует сеть уличных кофеен с особым подходом к приготовлению кофе Brown Cup."
				."\r\n\r\nМы очень ценим Вашу заинтересованность партнерством с нами."
				."\r\nЦеним Ваше время, и потому в этом письме мы высылаем Вам презентацию с описанием нашего предложения, преимуществами, обзором деятельности нашей сети сегодня, а также финансовую модель с необходимыми показателями в цифрах - в общем то,   что поможет Вам сформировать для себя определённое мнение о нашей франшизе."
				."\r\n\r\nСкачайте файлы, ознакомьтесь, проанализируйте, и в ближайшие дни мы свяжемся с Вами для обсуждения возможности дальнейшего сотрудничества."
				."Если Вас заинтересует более подробная информация - мы с удовольствием встретимся с Вами для обсуждения деталей нашей бизнес-модели и финансовых показателей."
				."\r\n\r\nХорошего времени суток.;)"
				."\r\nБудем на связи!"
				."\r\n\r\nС уважением, команда Brown Cup."
				."\r\n\r\nP.S. Ссылка на презентацию здесь - https://drive.google.com/file/d/1upy-v0-fxvwzkClG08XzbPHVrrrVc3lD/view?usp=sharing"
				."\r\n\r\nP.P.S. Ссылка на финансовую модель здесь - https://drive.google.com/file/d/1Gru6UPk2lASG2ODlTqr_6t7Rz4qrcW3-/view?usp=sharing";

	$mail->Body    = $body;
	$mail->AltBody = $altBody;
	$mail->Send();
}


$mail->ClearAddresses();
$mail->addAddress('franchise@browncup.ua');

if($isFranchiseMessage) {
	$body = "<b>Имя:</b> <i>".$name."</i>"
			."<br /><b>Телефон:</b> <i>".$tel."</i>"
			."<br /><b>Email:</b> <i>".$email."</i>"
			."<br /><b>Возраст:</b> <i>".$age."</i>"
			."<br /><b>Город:</b> <i>".$city."</i>"
			."<br /><b>Почему именно Brown Cup:</b> <i>".$rationale."</i>"
			."<br /><b>Опыт в бизнесе:</b> <i>".$experience."</i>"
			."<br /><b>Понимание рынка кофе:</b> <i>".$marketing."</i>"
			."<br /><b>Готовность инвестировать:</b> <i>".$investment."</i>";

	$altBody = "Имя: ".$name
			."\r\nТелефон: ".$tel
			."\r\nEmail: ".$email
			."\r\nВозраст: ".$age
			."\r\nГород: ".$city
			."\r\nПочему именно Brown Cup: ".$rationale
			."\r\nОпыт в бизнесе: ".$experience
			."\r\nПонимание рынка кофе: ".$marketing
			."\r\nГотовность инвестировать: ".$investment;
} else {
	$body = "<b>Имя:</b> <i>".$name."</i>"
			."<br /><b>Телефон:</b> <i>".$tel."</i>"
			."<br /><b>Email:</b> <i>".$email."</i>"
			."<br /><b>Сообщение:</b> <i>".$message."</i>";
			
	$altBody = "Имя: ".$name
			."\r\nТелефон: ".$tel
			."\r\nEmail: ".$email
			."\r\nСообщение: ".$message;
}

$mail->Body    = $body;
$mail->AltBody = $altBody;

if($mail->send()) {
    $success = 'true';
} else {
    $success = 'false';
}

echo $success;
?>