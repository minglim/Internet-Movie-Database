
<html>
	<html>
	<head>
		<title>add new comment </title>
		<style type="text/css">		
	
		</style>
	</head>	
	<body>
				Add new comment: <br/>
		<form action="./addComment.php" method="GET">
			Movie:	<select name="mid">
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
				
		
			Your Name:	<input type="text" name="yourname" value="Mr. Anonymous" maxlength="20"><br/>
			Rating:	<select name="rating">
						<option value="5"> 5 - Excellent </option>
						<option value="4"> 4 - Good </option>
						<option value="3"> 3 - It's ok~ </option>
						<option value="2"> 2 - Not worth </option>
						<option value="1"> 1 - I hate it </option>
					</select>
			<br/>
			Comments: <br/>
			<textarea name="comment" cols="80" rows="10"></textarea>
			<br/>
			<input type="submit" value="Rate it!!"/>
		</form>
		<hr/>
<?php
$movieID = $_GET['mid'];
$n = $_GET['yourname'];
$r= $_GET['rating'];
$c = $_GET['comment'];

$db_connection = mysql_connect("localhost", "cs143", "");
mysql_select_db("CS143", $db_connection);



$insert = "insert into Review (name,time,mid,rating,comment) values ('$n', now() , $movieID, $r, '$c')";
mysql_query($insert, $db_connection);


mysql_close($db_connection);
?>				
	</body>
</html>

