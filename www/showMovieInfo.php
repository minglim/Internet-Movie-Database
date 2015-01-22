<html>
	<html>
	<head>
		<title>Movie Information</title>
		<style type="text/css">
		</style>
	</head>	
	<body>
<form action="./showMovieInfo.php" method="GET">
	<input type="hidden" name="mid"></input>
	</form>
	<!-- search box -->
                Search for movies <form action="./search.php" method="GET">
                        Search: <input type="text" name="keyword"></input>
                        <input type="submit" value="Search"/>
                </form>
<?php
$id = $_GET['mid'];
if(empty($id))
	exit;
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$movieQuery = "select title, company, rating from Movie where id=$id";
$directorQuery = "select first, last, dob from Director where id in (select did from MovieDirector where mid=$id)";
$genreQuery = "select genre from MovieGenre where mid=$id";
$movieResult = mysql_query($movieQuery, $db_connection);
$directorResult = mysql_query($directorQuery, $db_connection);
$genreResult = mysql_query($genreQuery, $db_connection);

echo "--Show Movie Info--";
echo "<br/>";
while($row0 = mysql_fetch_row($movieResult))
{
	echo "Title: $row0[0]";
	echo "<br/>";
	echo "Producer: $row0[1]";
	echo "<br/>";
	echo "MPAA Rating: $row0[2]";
	echo "<br/>";
}
echo "Director:";
while($row1 = mysql_fetch_row($directorResult))
{
	echo " $row1[0] $row1[1] ($row1[2])&nbsp;&nbsp; ";
}
echo "<br/>";
echo "Genre:";
while($row2 = mysql_fetch_row($genreResult))
{
	echo " $row2[0]&nbsp;&nbsp;";
}
echo "<br/>";
echo "<br/>";
echo "--Actors in this movie--";
echo "<br/>";

$roleQuery = "select ma.aid, a.first, a.last, ma.role from MovieActor ma, Actor a where ma.mid=$id and ma.aid=a.id";
$roleResult = mysql_query($roleQuery, $db_connection);

while($row3 = mysql_fetch_row($roleResult))
{
	echo "<a href='./showActorInfo.php?aid=$row3[0]'>$row3[1] $row3[2]</a>";
	echo " as $row3[3]";
	echo "<br/>";
}
echo "<br/>";
echo "--User Reviews--";
echo "<br/>";

$averageQuery = "select avg(rating), count(rating) from Review where mid=$id";
$averageResult = mysql_query($averageQuery, $db_connection);
while($row4 = mysql_fetch_row($averageResult))
{
	echo "Average Rating: $row4[0] /5 (5.0 is the best) by $row4[1] reviews. ";
	echo "<a href='./addComment.php?mid=$id'>Add Review</a>";
}
echo "<br/>";
echo "Detailed Reviews:";
echo "<br/>";
$reviewQuery = "select time, name, rating, comment from Review where mid=$id";
$reviewResult = mysql_query($reviewQuery, $db_connection);
while($row5 = mysql_fetch_row($reviewResult))
{
	echo "On $row5[0], $row5[1] rated this movie $row5[2] point(s). His/her review is below.";
	echo "<br/>";
	echo "$row5[3]";
	echo "<br/>";
	echo "<br/>";
}
mysql_close($db_connection);
?>

</body>
</html>
