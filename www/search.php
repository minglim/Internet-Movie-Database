<html>
	<html>
	<head>
		<title>Search Actor / Movie</title>
		<style type="text/css">
		</style>
	</head>	
	<body>
			
			
		Search for actors/movies
		<form action="./search.php" method="GET">		
			Search: <input type="text" name="keyword"></input>
			<input type="submit" value="Search"/>
		</form>
		<hr/>

<?php
$expression = $_GET['keyword'];
if (empty($expression))
	exit;
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$words = preg_split("/\s/", $expression);
$count = sizeof($words);
if($count < 2)
	$actorQuery = "select id, first, last, dob from Actor where first like '%$words[0]%' or last like '%$words[0]%'";
else
	$actorQuery = "select id, first, last, dob from Actor where (first like '%$words[0]' and last like '%$words[1]') or (first like '%$words[1]' and last like '%$words[0]')";
$actorResult = mysql_query($actorQuery, $db_connection);
/*$actorQuery = "select first, last, dob from Actor where";
while(list($key,$val)=each($words))
{
	$actorQuery .= " first like '%$val%' or";
	$actorQuery .= " last like '%$val%' or";
}
$actorQuery = substr($actorQuery,0,(strlen($actorQuery)-3));
$actorResult = mysql_query($actorQuery, $db_connection);*/
echo "Search results for [$expression]...";
echo "<br/>";
echo "<br/>";
echo "Searching match records in Actor database...";
echo "<br/>";
while($row0 = mysql_fetch_row($actorResult))
{
	echo "Actor: ";
       	echo "<a href = './showActorInfo.php?aid=$row0[0]'>".$row0[1].'&nbsp'.$row0[2].'&nbsp'.'('.$row0[3].')';
	echo "</a>";
	echo "<br/>";
}

$movieQuery = "select id, title, year from Movie where";
while(list($key,$val)=each($words))
{
	$movieQuery .= " title like '%$val%' and";
}
$movieQuery = substr($movieQuery,0,(strlen($movieQuery)-4));
$movieResult = mysql_query($movieQuery, $db_connection);
echo "Searching match records in Movie database...";
echo "<br/>";
while($row1 = mysql_fetch_row($movieResult))
{
	echo "Movie: ";
	echo "<a href = './showMovieInfo.php?mid=$row1[0]'>".$row1[1].'&nbsp'.'('.$row1[2].')';
	echo "</a>";
	echo "<br/>";
}
mysql_close($db_connection);
?>

			</body>
</html>

