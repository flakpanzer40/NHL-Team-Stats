<?php
$process = $_POST["process"];
if(isset($_GET['process']))
	{
	$process = $_GET['process'];
	}
if($process == "4")
	{
	$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("nhl",$db) or die (mysql_error());
$SQL1="SELECT * FROM stats"; 
# run query on database and save the results in an array
$result1=mysql_query($SQL1) or die(mysql_error());

$num_results1=mysql_num_rows($result1);
mysql_close($db);



echo "<TABLE border = 4>";
echo "<TR>";
echo "<TD>";
echo "Last_Name";	
echo "</TD>";
echo "<TD>";
echo "First_Name";
echo "</TD>";
echo "<TD>";
echo "Team";
echo "</TD>";
echo "<TD>";
echo "Pos";
echo "</TD>";
echo "<TD>";
echo "GP";
echo "</TD>";
echo "<TD>";
echo "G";
echo "</TD>";
echo "<TD>";
echo "A";
echo "</TD>";
echo "<TD>";
echo "PIM";
echo "</TD>";
echo "<TD>";
echo "Hits";
echo "</TD>";
echo "<TD>";
echo "PPG";
echo "</TD>";
echo "<TD>";
echo "PPA";
echo "</TD>";
echo "<TD>";
echo "SHG";
echo "</TD>";
echo "<TD>";
echo "SHA";
echo "</TD>";
echo "<TD>";
echo "GW";
echo "</TD>";
echo "<TD>";
echo "SOG";
echo "</TD>";
echo "</TR>";
	for ($i=0;$i<$num_results1;$i++)
		{
		$row1=mysql_fetch_array($result1);
		echo "<TR>";
		echo "<TD>";
		echo "<br>".$row1["Last_Name"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["First_Name"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["Team"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["Pos"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["GP"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["G"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["A"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["PIM"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["Hits"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["PPG"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["PPA"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["SHG"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["SHA"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["GW"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["SOG"];
		echo "</TD>";
		echo "</TR>";
		}
echo "</TABLE>";
echo "<a href=PROJECT4FORM.php>Go Back</a>";

	}
if($process == "1")
	{
	$Teams = $_POST['Teams'];
$Select = $_POST["select"];
//$Asc = $_POST["ascending"];
//$Dsc = $_POST["descending"];
$Position = $_POST["Position"];
//$Integers = $_POST["Integers"];

$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("nhl",$db) or die (mysql_error());

# select a database to use

	
# count the number of records returned from the query


if($Select == "teams")
	{
	if($Teams=="x")
		{
			echo "You did not select a team.";
			echo "<a href=PROJECT4FORM.php>Go Back</a>";
			exit();
		}
	else
		{	
	echo "All Players from ".$Teams." Team";
//SET @lol = $Integers;
$SQL1="SELECT * FROM stats
WHERE Team LIKE '$Teams'
ORDER BY Last_Name ASC, First_Name ASC";
mysql_select_db("nhl",$db) or die (mysql_error());

$result1=mysql_query($SQL1) or die(mysql_error());
$num_results1=mysql_num_rows($result1);
echo "<TABLE border = 4>";
echo "<TR>";
echo "<TD>";
echo "<br>"."<strong>"."Last_Name"."</strong>";
echo "</TD>";
echo "<TD>";
echo "<br>"."<strong>"."First_Name"."</strong>";
echo "</TD>";
echo "</TR>";
	for ($i=0;$i<$num_results1;$i++)
		{
		$row1=mysql_fetch_array($result1);
		echo "<TR>";
		echo "<TD>";
		echo "<br>".$row1["Last_Name"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row1["First_Name"];
		echo "</TD>";
		echo "</TR>";
		}
echo "</TABLE>";
echo "<a href=PROJECT4FORM.php>Go Back</a>";
		}
	}
if ($Select== "pos")
	{
		if($Position == "x")
			{
			echo "You did not select your position.";
			echo "<a href=PROJECT4FORM.php>Go Back</a>";
			exit();
			}
		else
			{
	echo "All players from ".$Position." position";
//SET @lol = $Integers;
$SQL2="SELECT * FROM stats 
WHERE Pos LIKE '$Position'
ORDER BY Last_Name ASC, First_Name ASC";
mysql_select_db("nhl",$db) or die (mysql_error());

$result2=mysql_query($SQL2) or die(mysql_error());
$num_results2=mysql_num_rows($result2);
echo "<TABLE border = 4>";
echo "<TR>";
echo "<TD>";
echo "<br>"."<strong>"."Last_Name"."</strong>";
echo "</TD>";
echo "<TD>";
echo "<br>"."<strong>"."First_Name"."</strong>";
echo "</TD>";
echo "</TR>";

	for ($i=0;$i<$num_results2;$i++)
		{
$row2=mysql_fetch_array($result2);
	echo "<TR>";
		echo "<TD>";
		echo "<br>".$row2["Last_Name"];
		echo "</TD>";
		echo "<TD>";
		echo "<br>".$row2["First_Name"];
		echo "</TD>";
		echo "</TR>";
		}
echo"</TABLE>";
echo "<a href=PROJECT4FORM.php>Go Back</a>";
		}
	}
if($Select =="")
{
echo "You did not select your choice of displaying team players or position players.";
echo "<a href=PROJECT4FORM.php>Go Back</a>"."<br>";
exit();

}
$process = 4;
	echo "<a href=PROJECT4PROCESS.php?process=$process>Show Table</a>";
	}
if($process == "2")
	{
	$Categories = $_POST['categories'];
//$PIM = $_POST['PIM'];
//$Hits = $_POST['Hits'];
//$SOG = $_POST['SOG'];
$Integers = $_POST["Integers"];

$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("nhl",$db) or die (mysql_error());

if($Categories == "PIM")
	{
		if($Integers =="x")
			{
				echo "You did not select the number of results you want displayed.";
				echo "<a href=PROJECT4FORM.php>Go Back</a>";
				exit();
			}
		else
			{
				echo "Players listed by ".$Categories." in top ".$Integers." record(s)";
//SET @lol = $Integers;
				$SQL1="SELECT * FROM stats
				ORDER BY PIM DESC, Last_Name DESC, First_Name DESC
				LIMIT 0, $Integers";
				mysql_select_db("nhl",$db) or die (mysql_error());

				$result1=mysql_query($SQL1) or die(mysql_error());
				$num_results1=mysql_num_rows($result1);
				echo "<TABLE border = 4>";
				echo "<TR>";
				echo "<TD>";
				echo "<br>"."<strong>"."Last_Name"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."First_Name"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."Team"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."Position"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."PIM"."</strong>";
				echo "</TD>";
				echo "</TR>";
					for ($i=0;$i<$num_results1;$i++)
						{
							$row1=mysql_fetch_array($result1);
							echo "<TR>";
							echo "<TD>";
							echo "<br>".$row1["Last_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["First_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Team"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Pos"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["PIM"];
							echo "</TD>";
							echo "</TR>";
						}
			echo "</TABLE>";
			echo "<a href=PROJECT4FORM.php>Go Back</a>";
		}
	}
if ($Categories == "Hits")
	{
		if($Integers =="x")
			{
				echo "You did not select the number of results you want displayed.";
				echo "<a href=PROJECT4FORM.php>Go Back</a>";
				exit();
			}
		else
			{
				echo "Players listed by ".$Categories." in top ".$Integers." record(s)";
//SET @lol = $Integers;
				$SQL2="SELECT * FROM stats
				ORDER BY Hits DESC, Last_Name DESC, First_Name DESC
				LIMIT 0, $Integers";
				mysql_select_db("nhl",$db) or die (mysql_error());
				
				$result2=mysql_query($SQL2) or die(mysql_error());
				$num_results2=mysql_num_rows($result2);
				echo "<TABLE border = 4>";
				echo "<TR>";
				echo "<TD>";
				echo "<br>"."<strong>"."Last_Name"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."First_Name"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."Team"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."Position"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."Hits"."</strong>";
				echo "</TD>";
				echo "</TR>";
					for ($i=0;$i<$num_results2;$i++)
						{
							$row2=mysql_fetch_array($result2);
							echo "<TR>";
							echo "<TD>";
							echo "<br>".$row2["Last_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row2["First_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row2["Team"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row2["Pos"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row2["Hits"];
							echo "</TD>";
							echo "</TR>";
						}
			echo"</TABLE>";
			echo "<a href=PROJECT4FORM.php>Go Back</a>";
			}
	}
if($Categories == "SOG")
	{
		if($Integers =="x")
			{
		echo "You did not select the number of results you want displayed.";
		echo "<a href=PROJECT4FORM.php>Go Back</a>";
		exit();
			}
		else
			{
				echo "Players listed by ".$Categories." in top ".$Integers." record(s)";	
			//SET @lol = $Integers;
				$SQL3="SELECT * FROM stats
				ORDER BY SOG DESC, Last_Name DESC, First_Name DESC
				LIMIT 0, $Integers";
				mysql_select_db("nhl",$db) or die (mysql_error());
				$result3=mysql_query($SQL3) or die(mysql_error());
				$num_results3=mysql_num_rows($result3);
				echo "<TABLE border = 4>";
				echo "<TR>";
				echo "<TD>";
				echo "<br>"."<strong>"."Last_Name"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."First_Name"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."Team"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."Position"."</strong>";
				echo "</TD>";
				echo "<TD>";
				echo "<br>"."<strong>"."SOG"."</strong>";
				echo "</TD>";
				echo "</TR>";
					for ($i=0;$i<$num_results3;$i++)
						{
							$row3=mysql_fetch_array($result3);
							echo "<TR>";
							echo "<TD>";
							echo "<br>".$row3["Last_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row3["First_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row3["Team"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row3["Pos"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row3["SOG"];
							echo "</TD>";
							echo "</TR>";
						}
		echo"</TABLE>";
		echo "<a href=PROJECT4FORM.php>Go Back</a>";
	}
}
if($Categories == "")
	{
		echo "**You did not select your category.";
		echo "<a href=PROJECT4FORM.php>Go Back</a>"."<br>";
		exit();
	}
	$process = 4;
	echo "<a href=PROJECT4PROCESS.php?process=$process>Show Table</a>";
	}
if($process == "3")
	{
	$Action = $_POST["Action"];
$option = $_POST["option"];
$Math = $_POST["Math"];
$Numvalues = $_POST['NumberValues'];
$Range1 = $_POST["Range1"];
$Range2 = $_POST["Range2"];

$db=mysql_connect("localhost","root") or die('Not connected : ' . mysql_error());
mysql_select_db("nhl",$db) or die (mysql_error());

if($Action == "Points")
	{
	if($option == "option1")
		{
			if($Math == "x" or $Numvalues == "x")
			{
			echo "You did not select your action and/or your values."."<br>";
			echo "<a href=PROJECT4FORM.php>Go Back</a>";
			exit();
			}
			else
				{
					$SQL1="SELECT *, (G + A) as Points FROM stats
					HAVING Points $Math $Numvalues
					ORDER BY Points DESC, G DESC, GP DESC";
					mysql_select_db("nhl",$db) or die (mysql_error());

					$result1=mysql_query($SQL1) or die(mysql_error());
					$num_results1=mysql_num_rows($result1);	
					if($num_results1 == 0)
						{
						echo "Your search returned no results."."<br>";
						echo "<a href=PROJECT4FORM.php>Go Back</a>";
						exit();
						}
					else
						{
					echo "You have ".$num_results1." number of results";
					echo "<TABLE border = 4>";
								echo "<TR>";
								echo "<TD>";
								echo "<br>"."<strong>"."Last_Name"."</strong>";
								echo "</TD>";
								echo "<TD>";
								echo "<br>"."<strong>"."First_Name"."</strong>";
								echo "</TD>";
								echo "<TD>";
								echo "<br>"."<strong>"."Team"."</strong>";
								echo "</TD>";
								echo "<TD>";
								echo "<br>"."<strong>"."Pos"."</strong>";
								echo "</TD>";
								echo "<TD>";
								echo "<br>"."<strong>"."GP"."</strong>";
								echo "</TD>";
								echo "<TD>";
								echo "<br>"."<strong>"."G"."</strong>";
								echo "</TD>";
								echo "<TD>";
								echo "<br>"."<strong>"."A"."</strong>";
								echo "</TD>";
								echo "<TD>";
								echo "<br>"."<strong>"."Points"."</strong>";
								echo "</TD>";
								echo "</TR>";
					for ($i=0;$i<$num_results1;$i++)
							{
								$row1=mysql_fetch_array($result1);
								echo "<TR>";
								echo "<TD>";
								echo "<br>".$row1["Last_Name"];
								echo "</TD>";
								echo "<TD>";
								echo "<br>".$row1["First_Name"];
								echo "</TD>";
								echo "<TD>";
								echo "<br>".$row1["Team"];
								echo "</TD>";
								echo "<TD>";
								echo "<br>".$row1["Pos"];
								echo "</TD>";
								echo "<TD>";
								echo "<br>".$row1["GP"];
								echo "</TD>";
								echo "<TD>";
								echo "<br>".$row1["G"];
								echo "</TD>";
								echo "<TD>";
								echo "<br>".$row1["A"];
								echo "</TD>";
								echo "<TD>";
								echo "<br>".$row1["Points"];
								echo "</TD>";
								echo "</TR>";
								
							}
						echo "</TABLE>";	
						}
					}
			}
			/*else
				{
				echo "You did not select your operation of comparing results";
				echo "<a href=PROJECT4FORM.php>Go Back</a>";
				}*/
		
		
		
		
	if($option == "option2")
		{
			if($Range1 == "x" or $Range2 == "x")
				{
				echo "You did not select your range."."<br>";
				echo "<a href=PROJECT4FORM.php>Go Back</a>";
				exit();
				}
			else
				{
					if($Range1 > $Range2)
						{
						echo "Your first value is bigger than your first. Make it smaller than your first."."<br>";
						echo "<a href=PROJECT4FORM.php>Go Back</a>";
						exit();
						}
					else
						{
		$SQL1="SELECT *, (G + A) as Points FROM stats
				HAVING Points >= $Range1 AND Points <= $Range2
				ORDER BY Points DESC, G DESC, GP DESC";
				mysql_select_db("nhl",$db) or die (mysql_error());

				$result1=mysql_query($SQL1) or die(mysql_error());
				$num_results1=mysql_num_rows($result1);	
				if($num_results1 == 0)
						{
						echo "Your search returned no results."."<br>";
						echo "<a href=PROJECT4FORM.php>Go Back</a>";
						exit();
						}
					else
						{
				echo "You have ".$num_results1." number of results";
				echo "<TABLE border = 4>";
				echo "<TR>";
							echo "<TD>";
							echo "<br>"."<strong>"."Last_Name"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."First_Name"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."Team"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."Pos"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."GP"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."G"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."A"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."Points"."</strong>";
							echo "</TD>";
							echo "</TR>";
				for ($i=0;$i<$num_results1;$i++)
						{
							$row1=mysql_fetch_array($result1);
							echo "<TR>";
							echo "<TD>";
							echo "<br>".$row1["Last_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["First_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Team"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Pos"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["GP"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["G"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["A"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Points"];
							echo "</TD>";
							echo "</TR>";
							
						}
					echo "</TABLE>";	
						}
					}
				}
		}
	if($option == "")
				{
					echo "You did not select your option radio button."."<br>";
					echo "<a href=PROJECT4FORM.php>Go Back</a>";
					exit();
				}		
	
	}
if($Action == "Games Played")
	{
	if($option == "option1")
		{	
			if($Math == "x" or $Numvalues == "x")
			{
			echo "You did not select your action and/or your values."."<br>";
			echo "<a href=PROJECT4FORM.php>Go Back</a>";
			exit();
			}
			else
				{
			/*else
				{
				echo "You did not select your operation of comparing results";
				echo "<a href=PROJECT4FORM.php>Go Back</a>";
				}*/
				$SQL1="SELECT *, G + A as Points FROM stats
				HAVING GP $Math $Numvalues
				ORDER BY GP DESC, Last_Name DESC, First_Name DESC";
				mysql_select_db("nhl",$db) or die (mysql_error());

				$result1=mysql_query($SQL1) or die(mysql_error());
				$num_results1=mysql_num_rows($result1);	
				if($num_results1 == 0)
						{
						echo "Your search returned no results."."<br>";
						echo "<a href=PROJECT4FORM.php>Go Back</a>";
						exit();
						}
					else
						{
				echo "You have ".$num_results1." number of results";
				echo "<TABLE border = 4>";
				echo "<TR>";
							echo "<TD>";
							echo "<br>"."<strong>"."Last_Name"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."First_Name"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."Team"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."Pos"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."GP"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."G"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."A"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."Points"."</strong>";
							echo "</TD>";
							echo "</TR>";
				for ($i=0;$i<$num_results1;$i++)
						{
							$row1=mysql_fetch_array($result1);
							echo "<TR>";
							echo "<TD>";
							echo "<br>".$row1["Last_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["First_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Team"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Pos"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["GP"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["G"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["A"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Points"];
							echo "</TD>";
							echo "</TR>";
							
						}
					echo "</TABLE>";		
					}
				}
		}
		
	if($option == "option2")
		{
			if($Range1 == "x" or $Range2 == "x")
				{
				echo "You did not select your range."."<br>";
				echo "<a href=PROJECT4FORM.php>Go Back</a>";
				exit();
				}
			else
				{
					if($Range1 > $Range2)
						{
						echo "Your first value is bigger than your first. Make it smaller than your first."."<br>";
						echo "<a href=PROJECT4FORM.php>Go Back</a>";
						exit();
						}
					else
						{
				$SQL1="SELECT *, G + A as Points FROM stats
				HAVING GP >= $Range1 AND GP <= $Range2
				ORDER BY GP DESC, Last_Name DESC, First_Name DESC";
				mysql_select_db("nhl",$db) or die (mysql_error());

				$result1=mysql_query($SQL1) or die(mysql_error());
				$num_results1=mysql_num_rows($result1);	
				if($num_results1 == 0)
						{
						echo "Your search returned no results."."<br>";
						echo "<a href=PROJECT4FORM.php>Go Back</a>";
						exit();
						}
					else
						{
				echo "You have ".$num_results1." number of results";
				echo "<TABLE border = 4>";
				echo "<TR>";
							echo "<TD>";
							echo "<br>"."<strong>"."Last_Name"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."First_Name"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."Team"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."Pos"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."GP"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."G"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."A"."</strong>";
							echo "</TD>";
							echo "<TD>";
							echo "<br>"."<strong>"."Points"."</strong>";
							echo "</TD>";
							echo "</TR>";
				for ($i=0;$i<$num_results1;$i++)
						{
							$row1=mysql_fetch_array($result1);
							echo "<TR>";
							echo "<TD>";
							echo "<br>".$row1["Last_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["First_Name"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Team"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Pos"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["GP"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["G"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["A"];
							echo "</TD>";
							echo "<TD>";
							echo "<br>".$row1["Points"];
							echo "</TD>";
							echo "</TR>";
							
						}
					echo "</TABLE>";
						}
					}	
				}
		}
	if($option == "")
				{
					echo "You did not select your option radio button."."<br>";
					echo "<a href=PROJECT4FORM.php>Go Back</a>";
					exit();
					
				}		

	}
if($Action == "x")
	{
	echo "You did not select your Categories list."."<br>";
	echo "<a href=PROJECT4FORM.php>Go Back</a>";
	exit();
	
	}
	echo "<a href=PROJECT4FORM.php>Go Back</a>"."<br>";
	$process = 4;
	echo "<a href=PROJECT4PROCESS.php?process=$process>Show Table</a>";
	}


?>