<?php
    echo "<!doctype html><html>";
    echo "<head><meta charset='utf-8'></head>";
    echo "<body>";

//echo "Логин:".$_GET['nick'];
//echo "<br>Пароль:".$_GET['pass'];
 $link=mysqli_connect("localhost", "t9152863_az", "***Milan2004", "t9152863_az");
 // var_dump($link); 
 mysqli_select_db($link, "t9152863_az");
 $query = "select id, login, password from users where login='".$_GET['nick']."' and password='".$_GET['pass']."'";
// echo $query."<br>";
 $result = mysqli_query($link, $query);
 //var_dump($result); 
 $row = mysqli_fetch_assoc($result);
 //var_dump($row);
if(isset($row['login'])){
echo "Приветствуем, ".$row['login']."!<br>";

echo "<from action=\"login.php\" method=\"get\">";
echo "<textarea name=\"msg\" cols=\"40\" rows=\"6\"></textarea><br>";
echo "<input type=\"submit\" value=\"Добавить сообщение\" name=\"addrec\">";
echo "</from>";

echo "<from action=\"index.html\" method=\"get\">";
echo "<input type=\"submit\" value=\"Выйти\" name=\"out\">";
echo "</from>";
}
else{
echo "Неверные данные<br>";
echo "<form action=\"login.php\" method=\"get\">";
echo "<h1>Вход</h1>";
echo "<table>";
echo "<tr><td width=\"150\">Имя пользователя</td><td><input type=\"text\" name=\"nick\" size=\'20\" placeholder=\"Логин\"></td></tr>";
echo "<tr><td width=\"150\">Пароль: </td><td><input type=\"password\" name=\"pass\" size=\'20\" placeholder=\"Пароль\"></td></tr>";
echo "</table>";
echo "<br>";
echo "<input type=\"submit\" value=\"Войти \" name=\"comein\">";
echo "<input type=\"button\" value=\"Вернуться \" name=\"back\" onclick=\"document.location.href='index.html'\">";
echo "</form><hr>";

}
?>