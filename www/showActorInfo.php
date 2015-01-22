
<html>
	<html>
	<head>
		<title>Actor Information</title>
		<style type="text/css">
		</style>
	</head>	
	<body>

<form action="./showActorInfo.php" method="GET">
	<input type="hidden" name="aid"></input>
	</form>
	<!-- search box -->
                Search for actors <form action="./search.php" method="GET">
                        Search: <input type="text" name="keyword"></input>
                        <input type="submit" value="Search"/>
                </form>

<?php

$a= $_GET['aid'];

if (empty($a))
{
	exit;
}
	

echo"--Show Actor Info--";
echo"<br/>";

$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$actorQuery1 = "select first, last, sex, dob, dod from Actor where id=$a";
$actorResult = mysql_query($actorQuery1, $db_connection);

while($row0 = mysql_fetch_row($actorResult))
{
	echo"Name: $row0[0] $row0[1]";
	echo"<br/>";
	echo"Sex: $row0[2]";
	echo"<br/>";
	echo"Date of Birth: $row0[3]";
       	echo"<br/>"; 
	echo"Date of Death: $row0[4]"; 
	echo"<br/>";
	echo"<br/>";
	echo"<br/>";
}

echo"--Act in--";
echo"<br/>";

$actorQuery2 = "select role, mid from MovieActor where aid=$a";
$otherResult = mysql_query($actorQuery2, $db_connection);


while($row1 = mysql_fetch_row($otherResult))
{
	$movieQuery = "select title from Movie where id=$row1[1]";
	$movieResult = mysql_query($movieQuery, $db_connection);
	while($row2 = mysql_fetch_row($movieResult))
	{
		echo"Act \"$row1[0]\" in ";
		echo"<a href='./showMovieInfo.php?mid=$row1[1]'>$row2[0]</a>";
		echo"<br/>";
	}

}	

mysql_close($db_connection);
?>

<br/> <br/> <br/>
				
	

			</body>
</html>

