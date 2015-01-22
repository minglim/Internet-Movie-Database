	<html>
	<head>
		<title>add new movie</title>
		<style type="text/css">
		</style>
	</head>	
	<body>
				Add new movie: <br/>
		<form action="./addMovieInfo.php" method="GET">			
			Title : <input type="text" name="title" maxlength="20"><br/>
			Company: <input type="text" name="company" maxlength="50"><br/>
			Year : <input type="text" name="year" maxlength="4"><br/>	<!-- Todo: validation-->	
			MPAA Rating : <select name="mpaarating">
					<option value="G">G</option>
<option value="NC-17">NC-17</option>
<option value="PG">PG</option>
<option value="PG-13">PG-13</option>
<option value="R">R</option>

					</select>
			<br/>
			Genre : 
					<input type="checkbox" name="genre_Action" value="Action">Action</input>
<input type="checkbox" name="genre_Adult" value="Adult">Adult</input>
<input type="checkbox" name="genre_Adventure" value="Adventure">Adventure</input>
<input type="checkbox" name="genre_Animation" value="Animation">Animation</input>
<input type="checkbox" name="genre_Comedy" value="Comedy">Comedy</input>
<input type="checkbox" name="genre_Crime" value="Crime">Crime</input>
<input type="checkbox" name="genre_Documentary" value="Documentary">Documentary</input>
<input type="checkbox" name="genre_Drama" value="Drama">Drama</input>
<input type="checkbox" name="genre_Family" value="Family">Family</input>
<input type="checkbox" name="genre_Fantasy" value="Fantasy">Fantasy</input>
</br>
<input type="checkbox" name="genre_Horror" value="Horror">Horror</input>
<input type="checkbox" name="genre_Musical" value="Musical">Musical</input>
<input type="checkbox" name="genre_Mystery" value="Mystery">Mystery</input>
<input type="checkbox" name="genre_Romance" value="Romance">Romance</input>
<input type="checkbox" name="genre_Sci-Fi" value="Sci-Fi">Sci-Fi</input>
<input type="checkbox" name="genre_Short" value="Short">Short</input>
<input type="checkbox" name="genre_Thriller" value="Thriller">Thriller</input>
<input type="checkbox" name="genre_War" value="War">War</input>
<input type="checkbox" name="genre_Western" value="Western">Western</input>
					
			<br/>
			
			<input type="submit" value="Add"/>
					</form>
		<hr/>

<?php
$t = $_GET['title'];
$c = $_GET['company'];
$y = $_GET['year'];
$r = $_GET['mpaarating'];



if(empty($t) && empty($c) && empty($y))
	exit;
$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);

$maxMovieQuery = "select id from MaxMovieID";
$result = mysql_query($maxMovieQuery, $db_connection);

while($row = mysql_fetch_row($result))
{
	$max = $row[0];
}


	$insert0 = "insert into Movie (id, title, year,rating, company) values ($max, '$t', $y, '$r',  '$c')";
mysql_query($insert0, $db_connection);


if (isset($_GET['genre_Action']))
{

	$insert1= "insert into MovieGenre (mid, genre) values ($max, 'Action')";
	mysql_query($insert1, $db_connection);
}

if (isset($_GET['genre_Adult']))
{
	$insert2= "insert into MovieGenre (mid, genre) values ($max, 'Adult')";
	mysql_query($insert2, $db_connection);
}

if (isset($_GET['genre_Animation']))
{
	$insert3= "insert into MovieGenre (mid, genre) values ($max, 'Animation')";
	mysql_query($insert3, $db_connection);
}

if (isset($_GET['genre_Comedy']))
{
	$insert4= "insert into MovieGenre (mid, genre) values ($max, 'Comedy')";
	mysql_query($insert4, $db_connection);
}

if (isset($_GET['genre_Crime']))
{
	$insert5= "insert into MovieGenre (mid, genre) values ($max, 'Crime')";
	mysql_query($insert5, $db_connection);
}

if (isset($_GET['genre_Documentary']))
{
	$insert6= "insert into MovieGenre (mid, genre) values ($max, 'Documentary')";
	mysql_query($insert6, $db_connection);
}

if (isset($_GET['genre_Drama']))
{
	$insert7= "insert into MovieGenre (mid, genre) values ($max, 'Drama')";
	mysql_query($insert7, $db_connection);
}
if (isset($_GET['genre_Family']))
{
	$insert8= "insert into MovieGenre (mid, genre) values ($max, 'Family')";
	mysql_query($insert8, $db_connection);
}

if (isset($_GET['genre_Fantasy']))
{
	$insert9= "insert into MovieGenre (mid, genre) values ($max, 'Fantasy')";
	mysql_query($insert9, $db_connection);
}

if (isset($_GET['genre_Horror']))
{
	$insert10= "insert into MovieGenre (mid, genre) values ($max, 'Horror')";
	mysql_query($insert10, $db_connection);
}
if (isset($_GET['genre_Musical']))
{
	$insert11= "insert into MovieGenre (mid, genre) values ($max, 'Musical')";
	mysql_query($insert11, $db_connection);
}

if (isset($_GET['genre_Mystery']))
{
	$insert12= "insert into MovieGenre (mid, genre) values ($max, 'Mystery')";
	mysql_query($insert12, $db_connection);
}

if (isset($_GET['genre_Romance']))
{
	$insert13= "insert into MovieGenre (mid, genre) values ($max, 'Romance')";
	mysql_query($insert13, $db_connection);
}
if (isset($_GET['genre_Sci-Fi']))
{
	$insert14= "insert into MovieGenre (mid, genre) values ($max, 'Sci-Fi')";
	mysql_query($insert14, $db_connection);
}
if (isset($_GET['genre_Short']))
{
	$insert15= "insert into MovieGenre (mid, genre) values ($max, 'Short')";
	mysql_query($insert15, $db_connection);
}

if (isset($_GET['genre_Thriller']))
{
	$insert16= "insert into MovieGenre (mid, genre) values ($max, 'Thriller')";
	mysql_query($insert16, $db_connection);
}

if (isset($_GET['genre_War']))
{
	$insert17= "insert into MovieGenre (mid, genre) values ($max, 'War')";
	mysql_query($insert17, $db_connection);
}

if (isset($_GET['genre_Western']))
{
	$insert18= "insert into MovieGenre (mid, genre) values ($max, 'Western')";
	mysql_query($insert18, $db_connection);
}




	echo "Movie Added Successfully!";



$updateQuery = "update MaxMovieID set id=id+1";
mysql_query($updateQuery, $db_connection);

mysql_close($db_connection);
?>
	</body>
</html>

