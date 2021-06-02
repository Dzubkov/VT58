<form method="post">
	<label for="text">Message text:</label>
	<input type="text" name="textIn" id="textIn"><br>
	<button type="submit">Add message</button>
	</form>
<?php
$isEmpty = "/[^ ]{1}/i";
if (!preg_match($isEmpty, $_POST['textIn'])) {echo "Empty message"."<br />";}
else {
	$msg = $_POST['textIn'];
	echo "Message: ".$msg."<br/>";
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'baza';
	$link = mysqli_connect($host, $user, $password, $database); //представляет идентификатор соединения, 
                                                                          //связь с сервером mysql
	$result=mysqli_query($link, "SELECT * FROM `mymail` WHERE 1");  //выполняет запрос к базе данных
	while($data=mysqli_fetch_array($result)) //Выбирает одну строку из результирующего набора и помещает её в                                                                           массив
	{
		if(mail("$data[0]", "Message LAB 7", $msg)){
			echo $data[0]." -- incorrect"."<br/>";
		} else {
			echo $data[0]." -- correct"."<br/>";
		}
	}
}









