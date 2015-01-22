<html>
	<html>
	<head>
		<title>add director in a movie</title>
		<style type="text/css">
		</style>
	</head>	
	<body>
				Add new director in a movie: <br/>
		<form action="./addMovieDirector.php" method="GET">	
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

Director: <select name="did">
<?php
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$directorQuery = "select id, first, last, dob from Director order by first";
$directorResult = mysql_query($directorQuery, $db_connection);
while($row1 = mysql_fetch_row($directorResult))
{
	echo "<option value=$row1[0]>".$row1[1].'&nbsp;'.$row1[2].'&nbsp'.'('.$row1[3].')'."</option>";
}
echo "</select>";
echo "<br/>";

mysql_close($db_connection);
?>

<br/>
<input type="submit" value="Add"/>
</form>

<?php
$movieID = $_GET['mid'];
$directorID = $_GET['did'];


$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$insert = "insert into MovieDirector (mid, did) values ($movieID, $directorID)";
mysql_query($insert, $db_connection);




mysql_close($db_connection);
?>
</body>
</html>


