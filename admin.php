<?php
    session_start();
?>
<?php
include 'db.php';
    if(isset($_SESSION["logged"])){
        $thenTime = $_SESSION["logged"];

        $nowTime = time();

        if($nowTime - $thenTime > 300){
            header('location: login.php');
        }
        else{
            $_SESSION["logged"] = $nowTime;
        }
    }
    else{
        header('location: login.php');
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title> Chat Detector </title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <table class="w3-table-all w3-large">
    <tr class="w3-green">
      <th>Name</th>
      <th>Total Score</th>
      <th>Number of Messages</th>
      <th>Average score</th>
      <th>Maximum score</th>
    </tr>
	<?php 
	$sql = "SELECT name,SUM(score),COUNT(score),MAX(score) FROM chat GROUP BY name";
	$result = mysqli_query($con,$sql);
	$count = mysqli_num_rows($result);
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr><td>".$row['name']."</td><td>".$row['SUM(score)']."</td><td>".$row['COUNT(score)']."</td><td>".$row['SUM(score)']/$row['COUNT(score)']."</td><td>".$row['MAX(score)']."</td</tr>";
	}
	?>
</table>

</body>
</html>