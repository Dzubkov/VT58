<form method="post">
<input type="submit" name="sD" value="PRESS">
</form>
<?php
//получение ip
//Собака (подавление ошибок) на тот случай, если какой то из заголовок не был передан (тогда произойдет обращение к несуществующему ключу массива), а фильтрация, потому что там может быть не IP.
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];//определение прокси серверов
$remote  = @$_SERVER['REMOTE_ADDR']; // Получаем IP-адрес
if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
else $ip = $remote;
echo "IP: " . $ip;

//подключение и работа с бд
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'sql';
$link = mysqli_connect($host, $user, $password, $database) or die("Error " . mysqli_error($link)); //невозможно подключиться к БД
$resultnum=mysqli_query($link, "SELECT * FROM `iptable` WHERE 1");
$numip=0;
while($data=mysqli_fetch_array($resultnum))
{
  if ($data['ip']==$ip) {
    $numip=($data['num']+1);
  }
}
//Проверяем, есть ли уже в базе IP-адрес
$a = mysqli_query($link,"SELECT COUNT(1) FROM `iptable` WHERE ip='$ip'");
$b = mysqli_fetch_array( $a );
echo "  Vhodov $numip<br/>";
if ($b[0]==0) { //если такого ip не было
  $query="INSERT INTO `iptable` (`num`,`ip`) VALUES (3,'$ip')";//добавляем в БД
  $result=mysqli_query($link, $query);
  if($result==true){echo "add new ip";}
} else {
  $query ="UPDATE `iptable` SET `num`='$numip' WHERE `ip`='$ip'";//обновляем
  $result=mysqli_query($link, $query);
  echo "table update";
}

//печать сортированного в обратном порядке
$query ="SELECT * FROM `iptable` ORDER BY `num` DESC";
$result=mysqli_query($link,$query);
echo "<table border='1'>";
while($data=mysqli_fetch_array($result))
{
	echo "<tr>"."<th>".$data['ip']."</th>"."<th>".$data['num']."</th>"."</tr>";
}
?>
