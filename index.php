<?php
include 'db.php';
    
    function checkScore($string){


  $words1 = array("kill"=>0.15,"gun"=>0.1,"bullet"=>0.1,"attack"=>0.1,"blast"=>0.1,"awm"=>0.1,"m249"=>0.1,"flaregun"=>0.1,"mini14"=>0.1,"m24"=>0.1,"sks"=>0.1,"kar98"=>0.1,"groza"=>0.1,"slr"=>0.1,"ak47"=>0.1,"sniper"=>0.1,"akm"=>0.1,"m16a4"=>0.1,"m416"=>0.1,"m762"=>0.1,"microuzi"=>0.1,"micro"=>0.1,"mk47"=>0.1,"mutant"=>0.1,"qbz95"=>0.1,"s12k"=>0.1,"s1897"=>0.1,"s686"=>0.1,"scar-l"=>0.1,"sawed"=>0.05,"winchester"=>0.05,"worst"=>0.05,"dp-28"=>0.1,"vss"=>0.1,"vector"=>0.05,"vintorez"=>0.1,"ump9"=>0.1,"uzi"=>0.1,"tommygun"=>0.1,"gun"=>0.1,"p18c"=>0.1,"p1911"=>0.1,"p92"=>0.1,"r1895"=>0.1,"r45"=>0.1,"crossbow"=>0.1,"shoot"=>0.1,"murder"=>0.1,"rape"=>0.05,"kidnap"=>0.05,"mission"=>0.05,"fuel"=>0.05,"kerosine"=>0.05,"petrol"=>0.05,"compass"=>0.03,"eaves"=>0.05,"abide"=>0.05,"abjure"=>0.05,"adamant"=>0.05,"church gate"=>0.05,"temple gate"=>0.05,"map"=>0.05,"grenade"=>0.1,"smokes"=>0.05,"molotov"=>0.05,"molly"=>0.05,"pan"=>0.01,"knife"=>0.05,"bomb"=>0.1,"missile"=>0.1,"launcher"=>0.1,"blackmail"=>0.08,"hazard"=>0.05,"intimidation"=>0.03,"menace"=>0.05,"peril"=>0.05,"risk"=>0.05,"bluff"=>0.05,"commination"=>0.05,"foreboding"=>0.05,"foreshadowing"=>0.05,"fulmination"=>0.05,"impendence"=>0.05,"omen"=>0.05,"protent"=>0.05,"presage"=>0.05,"terror"=>0.1,"attack"=>0.15,"boom"=>0.05,"terrorist"=>0.1,"dread"=>0.05,"horror"=>0.05,"fear"=>0.05,"trembling"=>0.05,"fright"=>0.05,"trepidation"=>0.05,"alarm"=>0.01,"panic"=>0.02,"shock"=>0.03,"rascal"=>0.05,"impwretch"=>0.05,"scamp"=>0.05,"troublemaker"=>0.05,"dead"=>0.03,"assassination"=>0.1,"bloodshed"=>0.1,"crime"=>0.08,"destruction"=>0.08,"felony"=>0.05,"homicide"=>0.05,"lynching"=>0.05,"manslaughter"=>0.05,"massacre"=>0.1,"shooting"=>0.08,"slaying"=>0.05,"annihilation"=>0.05,"blood"=>0.08,"butchery"=>0.05,"carnage"=>0.05,"dispatching"=>0.02,"hit"=>0.08,"knifing"=>0.05,"liquidation"=>0.05,"offing"=>0.1,"terrorism"=>0.08,"terrorization"=>0.08,"threat"=>0.08);

  $words2 = array("kill people" =>  0.3,"supply bomb" =>  0.2,"kill anything" => 0.2,"kill all" => 0.2,"shoot them" => 0.2,"shoot him" => 0.2,"shoot her" => 0.2,"shoot all" => 0.2,"throw grenades" => 0.3,"give grenade" => 0.3,"bring grenade" => 0.3,"arrange bullets" =>  0.3);

  $words3 = array("drop a bomb" =>  0.3,"plant a bomb" =>  0.3,"drop the bomb" =>  0.3,"plant the bomb" =>  0.3,"i kill you" => 0.2,"kill them all" =>  0.3,"slaughter alive people" =>  0.2,"fuck those bastard" =>  0.1,"supply ak 47" =>  0.2,"give me gun" => 0.3,"shoot the girl" => 0.3,"shoot the boy" => 0.3,"throw the grenade" => 0.4,"give me grenade" => 0.35,"bring the grenade" => 0.35,"bring my gun" => 0.35,"i will murder"=>0.35);

  $words4 = array("if anyone moves shoot" => 0.35,"hail terrorism and longlive" =>  0.2,"attack our enemy country" =>  0.2,"give me my gun" => 0.35,"where is my gun" => 0.35,"i will kill you" => 0.2,"train terrorist for attack" => 0.35);

  $string = strtolower($string);
  # Eliminating Symbols

  $string = strtr($string, array('.' => ' ', ',' => ' ', ':' => ' ', '-' => ' ', '=' => ' ', '+' => ' ', '-' => ' ', '*' => ' ', '!' => ' ', '(' => ' ', ')' => ' ', '[' => ' ', ']' => ' ', '{' => ' ', '}' => ' ', '?' => ' ', '/' => ' ', '<' => ' ', '>' => ' ', '@' => ' ', '#' => ' ', '%' => ' ', '&' => ' ', '$' => ' ',"'" => ' '));

  # Eliminating the blank spaces

  $len = strlen($string);
  $count = 0;
  for ($j=0; $j < $len-1; $j++) { 
    if ($string[$j]==" " && $string[$j+1]==" "){
      for ($i=$j; $i < strlen($string)-1; $i++) { 
        $string[$i]=$string[$i+1];
      }
      $count +=1;
      
    }

  }
  #new length of string
  $string = substr($string, 0, $len - $count);

  # Breaking the string from spaces
  $string = explode(" ",$string);
  $stri3 = array();
   $stri2 = array();
     $stri4 = array();
  $stri1 = $string;
  # Performing bigram 
  if (count($string) >= 2){
    for ($i=0; $i < count($string)-1; $i++) { 
      $stri2[$i] = $string[$i]." ".$string[$i+1];
    }
  }

  # Performing Trigram
  if (count($string) >= 3){
    for ($i=0; $i < count($string)-2; $i++) { 
      $stri3[$i] = $string[$i]." ".$string[$i+1]." ".$string[$i+2];
    }
  }

  # Pergorming Quadgram
  if (count($string) >= 4){
    for ($i=0; $i < count($string)-3; $i++) { 
      $stri4[$i] = $string[$i]." ".$string[$i+1]." ".$string[$i+2]." ".$string[$i+3];
    }
  }


  $score = 0;

  $num = 0; 
  for ($i=0; $i < count($stri4); $i += 1){
    $str = $stri4[$i];
    if ($str != ' ' && isset($words4[$str])){
      $score += $words4[$str];
      $num+=1;
    }
  }

  
  for ($i=0; $i < count($stri3); $i += 1){
    if ($num > 1) {
      break;
    }
    $str = $stri3[$i];
    if ($str != ' ' && isset($words3[$str])){
      $score += $words3[$str];
      $num+=1;
    }
  }
  

  for ($i=0; $i < count($stri2); $i += 1){
    if ($num > 2) {
      break;
    }
    $str = $stri2[$i];
    if ($str != ' ' && isset($words2[$str])){
      $score += $words2[$str];
      $num+=1;
    }
  }


  
  for ($i=0; $i < count($stri1); $i += 1){
    if ($num > 3) {
      break;
    }
    $str = $stri1[$i];
    if ($str != ' ' && isset($words1[$str])){
      $score += $words1[$str];
      $num+=1;
    }
  }
  
  return $score;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Chat App</title>
        <link rel="stylesheet" href="style.css" media="all" />
        <script> 
            function chat_ajax(){ 
                var req = new XMLHttpRequest(); 
                req.onreadystatechange = function() { 
                    if(req.readyState == 4 && req.status == 200){ 
                        document.getElementById('chat').innerHTML = req.responseText; 
                    } 
                } 
                req.open('GET', 'chat.php', true); 
                req.send(); 
            } 
             setInterval(function(){chat_ajax()}, 1000) 
        </script>
    </head>
    
    <body>
        <div id="container">
            <div style="width:100%">
                <h2 style="text-align:center">Terroristic Chat Detector</h2>
            </div>
            <br>
            <div id="chat_box">
                <div id="chat_data">
                    <span style="color:green;">Mayank: </span>
                    <span style="color:brown;">Hey, text here </span>
                    <span style="float:right;">12.30PM</span>
                </div>
                <div id="chat"> </div>
            </div>
            
            
            
            <form method="post" action="index.php">
                <input type="text" name="name" placeholder="Enter Name: " />
                <textarea name="enter message" placeholder="Enter Message"></textarea>
                <input type="submit" name="submit" value="Send!" />
            </form>

            <?php 
                if(isset($_POST['submit'])){ 
                    $name = $_POST['name']; 
                    $msg = $_POST['enter_message']; 
                    $score = checkScore($msg);
                    $query = "INSERT INTO chat (name,msg,score) VALUES ('$name','$msg','$score')"; 
                    $run = $con->query($query); 
                } ?>

        </div>
    </body>
</html>

