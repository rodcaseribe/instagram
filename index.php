<html>
<head>
</head>
<body>
<h1>Pesquisando sem Token *Instagram</h1>
<form action="" method="post" align="center" >
<h2>USUARIO:</h2>
 <input type="text" name="Fname" ><input  type="submit" name="btnsubmit">
</form>
</body>
<?php
	header ('Content-type: text/html; charset=UTF-8');
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    if(isset($_POST['btnsubmit'])){
$variavel = $_POST['Fname'];
	set_time_limit(10);
    $resultado = file_get_contents("https://instagram.com/web/search/topsearch/?context=blended&query=".$variavel);
    curl_close ($curl);
	$resultado = json_decode($resultado, true);
	//for ($inc=0;$inc<60;$inc++){
}	
	for ($inc=0;$inc<80;$inc++){
		//sleep(2);
		if(isset($resultado['users'][$inc]['user']['username'])){
		echo '<div align=center><h4>USERNAME: '.($resultado['users'][$inc]['user']['username']).'</h4></div>';	
		echo '<div align=center><h5>NOME COMPLETO: '.($resultado['users'][$inc]['user']['full_name']).'</h5></div>';
		echo '<div align=center><h6>SEGUIDORES: '.($resultado['users'][$inc]['user']['byline']).'</h6></div>';
		echo '<div align=center><img src='.($resultado['users'][$inc]['user']['profile_pic_url']).'></img></div>';
		//echo "<br>";
		ob_flush();
        flush();
        sleep(0.5);
		}
	}		
		ob_end_flush();
?>
<html>
<head>
	<style>
body {background-color:lightgray}
h4   {color:blue}h6   {color:red}h5   {color:green}p    {color:green}
</style>
</head>
<body>
</body>
</html>
