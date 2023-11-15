<?php

if ($_GET['success']){
    echo "registration successful!";
    echo "<a href='index.html'>back</a>";
}


else{
    
    if ($_GET['adduser'] && $_GET['nick'] && $_GET['pass'] ) {
        $link = mysqli_connect("localhost", "t9152863_az", "***Milan2004");
    if (!$link) {
        die('Connection error: ' . mysql_error() );
    }
    mysqli_select_db ($link,"t9152863_az");
    $query = "INSERT INTO users (login, password)";
    $query = $query."VALUES ('".$_GET['nick']."', '".$_GET['pass']."')";
    
    //echo $query;
    $result = mysqli_query ($link, $query);
        if($result){
            header("Location: reg1.php?success=yes");
            exit();
        }    
        else echo "Registration error";
    }

 else {   
    echo "<!doctype html><html>";
    echo "<head><meta charset='utf-8'></head>";
    echo "<body>";
    echo "<h1 align='center'>Регистрация!!!</h1>";    
    echo 'Успешно соединились';
    echo "<hr><form action=\"reg1.php\" method=\"get\">";
    echo "<table>";
    echo "<tr><td width=\"150\">Имя пользователя:</td><td><input type=\"text\" name=\"nick\" size=\"20\" placeholder=\"Ваше имя\"></td></tr>";
    echo "<tr><td width=\"150\">Пароль:  </td><td><input type=\"text\" name=\"pass\"  size=\"20\" placeholder=\"Пароль\"></td></tr>";
    echo "</table>";
    echo "<br>";
    echo "<input type=\"submit\" value=\"Зарегистрироваться \" name=\"adduser\" >";
    echo "<input type=\"button\" value=\"Вернуться \" name=\"back\" onclick=\"document.location.href='index.html'\">";
    echo "</form><hr>";
}
mysql_close($link);
echo "</body></html>";
}
?>

