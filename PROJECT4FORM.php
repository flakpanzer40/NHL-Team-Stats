<form action = "PROJECT4PROCESS.php" method= "POST">
<input type='hidden' name="process" value="4">
<br><input type = "submit" value = "SHOW TABLE">
</form>
<form action = "PROJECT4PROCESS.php" method= "POST">
<strong>Level 1</strong><br>
<?php 
#--------Connect to Database------------

# connect to mysql using a username and password
$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());


# select a database to use
mysql_select_db("nhl",$db) or die (mysql_error());
	
#--------Run SQL Query------------

# create SQL statement 
$SQL1="SELECT DISTINCT Team FROM stats"; 
$SQL2="SELECT DISTINCT Pos FROM stats"; 
# run query on database and save the results in an array
$result1=mysql_query($SQL1) or die(mysql_error());
$result2=mysql_query($SQL2) or die(mysql_error());	
# count the number of records returned from the query
$num_results1=mysql_num_rows($result1);
$num_results2=mysql_num_rows($result2);	
#--------Close Database------------

# close the database
mysql_close($db);

#--------Loop through the Results Array------------
?>
<input type="radio" name="select" value="teams">
Teams
<select name="Teams">
<option value="x"> Select</option>
<?php
for ($i=0;$i<$num_results1;$i++)
	{
	$row1=mysql_fetch_array($result1);
	echo "<option value='".$row1["Team"]."'>".$row1["Team"]."</option>"."<br>";
	}
?>
</select>
<br>

<br>
<input type="radio" name="select" value="pos">

Position
<select name="Position">
<option value="x"> Select</option>
<?php
for ($i=0;$i<$num_results2;$i++)
	{
	$row2=mysql_fetch_array($result2);
	echo "<option value='".$row2["Pos"]."'>".$row2["Pos"]."</option>"."<br>";
	}
?>
</select>

<input type='hidden' name="process" value="1">





<br><input type = "submit" value = "GO">
</form>

<form action = "PROJECT4PROCESS.php" method= "POST">
<strong>Level 2</strong><br>
<?php 
#--------Connect to Database------------

# connect to mysql using a username and password
$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());

# select a database to use
mysql_select_db("nhl",$db) or die (mysql_error());
	
#--------Run SQL Query------------

# create SQL statement 
$SQL1="SELECT DISTINCT PIM FROM stats"; 
$SQL2="SELECT DISTINCT Hits FROM stats"; 
$SQL3="SELECT DISTINCT SOG FROM stats"; 
$SQL4="SELECT * FROM stats";
# run query on database and save the results in an array
$result1=mysql_query($SQL1) or die(mysql_error());
$result2=mysql_query($SQL2) or die(mysql_error());
$result3=mysql_query($SQL3) or die(mysql_error());	
$result4=mysql_query($SQL4) or die(mysql_error());	
# count the number of records returned from the query
$num_results1=mysql_num_rows($result1);
$num_results2=mysql_num_rows($result2);	
$num_results3=mysql_num_rows($result3);	
$num_results4=mysql_num_rows($result4);	
#--------Close Database------------

# close the database
mysql_close($db);

#--------Loop through the Results Array------------
?>
Show Top 10 from
Categories<br>
PIM<input type="radio" name="categories" value="PIM"><br>
Hits<input type="radio" name="categories" value="Hits"><br>
SOG<input type="radio" name="categories" value="SOG"><br>

Show the top
<select name="Integers">
<option value="x"> Select</option>
<option value="838"> All</option>
<?php
for ($j=0;$j<$num_results4-1;$j++)
	{
	
	echo "<option value='".$j."'>".$j."</option>"."<br>";
	}
?>

</select>
records
<input type='hidden' name="process" value="2">
<br><input type = "submit" value = "GO">
</form>

<form action = "PROJECT4PROCESS.php" method= "POST">
<strong>Level 3</strong><br>
<?php 
#--------Connect to Database------------

# connect to mysql using a username and password
$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());

# select a database to use
mysql_select_db("nhl",$db) or die (mysql_error());
	
#--------Run SQL Query------------

# create SQL statement 
$SQL1="SELECT DISTINCT GP FROM stats"; 
$SQL2="SELECT G + A as Points FROM stats";
$SQL3="SELECT * FROM stats";
# run query on database and save the results in an array
$result1=mysql_query($SQL1) or die(mysql_error());
$result2=mysql_query($SQL2) or die(mysql_error());
$result3=mysql_query($SQL3) or die(mysql_error());	

# count the number of records returned from the query
$num_results1=mysql_num_rows($result1);
//$num_results2=mysql_num_rows($result2);	
$num_results3=mysql_num_rows($result3);	

#--------Close Database------------

# close the database
mysql_close($db);

#--------Loop through the Results Array------------
?>
Categories
<select name="Action">
<option value="x"> Select</option>
<option value="Points"> Points</option>
<option value="Games Played"> Games Played</option>
<?php
/*for ($j=0;$j<$num_results4;$j++)
	{
	
	echo "<option value='".$j."'>".$j."</option>"."<br>";
	}*/
?>
</select>
<br>
1st Option<input type="radio" name="option" value="option1">
Action
<select name="Math">
<option value="x"> Select</option>
<option value=">">></option>
<option value=">=">>=</option>
<option value="=">=</option>
<option value="<="><=</option>
<option value="<"><</option>
</select>


<select name="NumberValues">
<option value="x"> Select</option>
<?php
for ($j=0;$j<61;$j++)
	{
	
	echo "<option value='".$j."'>".$j."</option>"."<br>";
	}
?>
</select>
values
<br>
2nd Option<input type="radio" name="option" value="option2">
between
<select name="Range1">
<option value="x"> Select</option>
<?php
for ($j=0;$j<61;$j++)
	{
	
	echo "<option value='".$j."'>".$j."</option>"."<br>";
	}
?>
</select>
and
<select name="Range2">
<option value="x"> Select</option>
<?php
for ($j=0;$j<61;$j++)
	{
	
	echo "<option value='".$j."'>".$j."</option>"."<br>";
	}
?>
</select>
<input type='hidden' name="process" value="3">
<br><input type = "submit" value = "GO">
</form>
