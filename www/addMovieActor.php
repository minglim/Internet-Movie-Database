<html>
	<html>
	<head>
		<title>add actor's role in a movie</title>
		<style type="text/css">
		</style>
	</head>	
	<body>
				Add new actor in a movie: <br/>
		<form action="./addMovieActor.php" method="GET">	
			Movie : <select name="mid">

<?php
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$movieQuery = "select id, title, year from Movie order by title";
$movieResult = mysql_query($movieQuery, $db_connection);
while($row0 = mysql_fetch_row($movieResult))
{
	echo "<option value=$row0[0]>".$row0[1].'&nbsp;'.'('.$row0[2].')'."</option>";
}
echo "</select>";
echo "<br/>";

mysql_close($db_connection);
?>

Actor: <select name="aid">
<?php
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$actorQuery = "select id, first, last, dob from Actor order by first";
$actorResult = mysql_query($actorQuery, $db_connection);
while($row1 = mysql_fetch_row($actorResult))
{
	echo "<option value=$row1[0]>".$row1[1].'&nbsp;'.$row1[2].'&nbsp'.'('.$row1[3].')'."</option>";
}
echo "</select>";
echo "<br/>";

mysql_close($db_connection);
?>

Role: <input type="text" name="role" maxlength="50">
<br/></br>
<input type="submit" value="Add"/>
</form>

<?php
$movieID = $_GET['mid'];
$actorID = $_GET['aid'];
$actorRole = $_GET['role'];
if(empty($actorRole))
	exit;
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$insert = "insert into MovieActor (mid, aid, role) values ($movieID, $actorID, '$actorRole')";
mysql_query($insert, $db_connection);
echo "Relation Successful!";

mysql_close($db_connection);
?>
</body>
</html>

