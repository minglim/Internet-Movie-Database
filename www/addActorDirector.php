<html>
	<html>
	<head>
		<title>add actor / director</title>
		<style type="text/css">
		</style>
	</head>	
	<body>
				Add new actor/director: <br/>
		<form action="./addActorDirector.php" method="GET">
			Identity:	<input type="radio" name="identity" value="Actor" checked="true">Actor
						<input type="radio" name="identity" value="Director">Director<br/>
			<hr/>
			First Name:	<input type="text" name="first" maxlength="20"><br/>
			Last Name:	<input type="text" name="last" maxlength="20"><br/>
			Sex:		<input type="radio" name="sex" value="Male" checked="true">Male
						<input type="radio" name="sex" value="Female">Female<br/>
						
			Date of Birth:	<input type="date" name="dob"> (use yyyy-mm-dd format if using Firefox)<br/>
			Date of Death:	<input type="date" name="dod"> (leave blank if alive now)<br/>
			<input type="submit" value="Add"/>
		</form>
		<hr/>
<?php
$expression0 = $_GET['identity'];
$f = $_GET['first'];
$l = $_GET['last'];
$s = $_GET['sex'];
$birth = $_GET['dob'];
$dead = $_GET['dod'];
if(empty($f) && empty($l) && empty($s) && empty($birth) && empty($dead))
	exit;
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$maxPersonQuery = "select id from MaxPersonID";
$result = mysql_query($maxPersonQuery, $db_connection);

while($row = mysql_fetch_row($result))
{
	$max = $row[0];
}


if ($expression0 == "Actor")
{
	$insert0 = "insert into Actor (id, last, first, sex, dob, dod) values ($max, '$l', '$f', '$s', '$birth', '$dead')";
	mysql_query($insert0, $db_connection);
	echo "Actor Added Successfully!";
}
else
{
	$insert1 = "insert into Director (id, last, first, dob, dod) values ($max, '$l', '$f', '$birth', '$dead')";
	mysql_query($insert1, $db_connection);
	echo "Director Added Successfully!";
}

$updateQuery = "update MaxPersonID set id=id+1";
mysql_query($updateQuery, $db_connection);

mysql_close($db_connection);
?>
	</body>
</html>


