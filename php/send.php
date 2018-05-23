<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "omarbaev95@mail.ru";
$Subject = "New Message Received";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}


/*
if(!empty($_POST['contactname']) and !empty($_POST['email']) and !empty($_POST['messages']))
{
$to = "omarbaev95@mail.ru";
$from = 'brothe95@mail.ru';
$subject = "Проверка почты";
$mes = 'Имя: '.$_POST['contactname'].'; email: '.$_POST['email'].'; Сообщение: '.$_POST['messages']. ';';
$headers = "Content-type: text/html; charset=UTF-8 \r\n";
$headers .= "From: <brothe95@mail.ru>\r\n";
$result = mail($to, $subject, $mes, $headers);

    if ($result){ 
        echo "<p>Cообщение успешно отправленно. Пожалуйста, оставайтесь на связи</p>";
    }
    else{
        echo "<p>Cообщение не отправленно. Пожалуйста, попрбуйте еще раз</p>";
    }
}
else {
echo "<p>Обязательные поля не заполнены. Введите email</p>";
}
*/
?>

