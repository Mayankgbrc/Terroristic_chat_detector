<?php 
    include 'db.php';
    
    $tscore = 0;
    $sql = "SELECT * FROM (SELECT * FROM chat ORDER BY id DESC LIMIT 8) sub ORDER BY id ASC"; 
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_assoc($result)){
          $score = $row['score'];
          $tscore += $score;
          
?>

<div id="chat_data"> 
    <span style="color:green;"><?php echo $row['name']; ?> : </span> 
    <span style="color:brown;"><?php echo $row['msg']; ?></span> 
    <span style="float:right;"><?php echo $score; ?></span> 
</div> 
    <?php 
}

echo "Score level is <b>".$tscore."</b>";
?>