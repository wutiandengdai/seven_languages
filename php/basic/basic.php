<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>Basic PHP</title>
  </head>
  <body>
    <?php 
    //single line comment
    # Single line comment 
    /* Multiline
       comments
    */ 
    ?>
    <?php echo 'Hello World!'; ?><br>
    <?php echo "Hello". " World!"; ?><br>
    <?php echo 2+12; ?><br>
    <?php
        $val = 66;
        echo $val;
        echo "<br>";

        //Has to be double quotes when text contains a variable
        $val2 = "Hello";
        echo "$val2 Kitty!";
        //A curly braces needed for sticky text
        echo "{$val2}oooo";
        echo "<br>";

        $str1 = "Jesfer has a cat, ";
        $str2 = "wears a green hat.";
        $str3 = $str1;
        $str3 .= $str2;
        echo $str3;
    ?>
    <br>

    [String]<br>
    Lowercase: <?php echo strtolower($str3);?><br>
    Uppercase: <?php echo strtoupper($str3);?><br>
    Uppercase First: <?php echo ucfirst($str3);?><br>
    Uppercase Words: <?php echo ucwords($str3);?><br>
    String Length: <?php echo strlen($str3);?><br>
    Trim: <?php echo "A ".trim("B C D")." E";?><br>
    Find: <?php echo strstr($str3, "green");?><br>
    Replace: <?php echo str_replace("green", "red", $str3);?><br>
    Repeat: <?php echo str_repeat($str3, 2);?><br>
    Substring: <?php echo substr($str3, 3, 9);?><br>
    Find Position: <?php echo strpos($str3, "green");?><br>
    Find Charactor: <?php echo strchr($str3, "w");?><br>
   <br>

    [Number]<br>
    Increment: <?php echo $val++;?><br>
    Mod: <?php echo fmod($val, 9);?><br>
    Random: <?php echo rand();?><br>
    Random Min Max: <?php echo rand(1, 10); ?><br>

    <?php $pi = 3.14; ?>
    Round: <?php echo round($pi, 1);?><br>
    Floor: <?php echo floor($pi+4);?><br>
    Ceil: <?php echo ceil($pi);?><br>
    
    <?php echo "Is {$val} Integer : " . is_int($val); ?><br>
    <?php echo "Is {$pi} Integer : " . is_int($pi); ?><br>
    <?php echo "Is {$pi} Numberic : " . is_numeric($pi); ?><br>
    <br>
    [Array]<br>
    <?php 
      $mixed = array(3, 4, "Litte", array("goat","bull","horse")); 
      //php5.4 short way
      $short = ["Sally", 5, "London"];
    ?>
    <?php echo $mixed[1]; ?><br>
    <?php echo $mixed[3][2]; ?><br>
    <?php echo $short[0]; ?><br>
    <?php 
      //assign value to array
      $mixed[1] = "Road";
      //apend at the end
      $mixed[] = "hope";
    ?>
    <pre>
      <?php echo print_r($mixed); ?>
    </pre>

    <?php
      //Associate array , key-value
      $assoc = array("name"=>"Sally", "age"=>5, "address"=>"London");
      echo $assoc["name"];
      echo "<br>";
      $assoc["age"] = 25;
      echo $assoc["age"];
    ?><br>

    <?php $numbers=[23, 77, 23, 104, 18]; ?>
    Count: <?php echo count($numbers); ?><br>
    Max: <?php echo max($numbers); ?><br>
    Min: <?php echo min($numbers); ?><br>
    Sort: <?php sort($numbers); echo print_r($numbers);?><br>
    RSort: <?php rsort($numbers); echo print_r($numbers);?><br>
    Implode: <?php $numstr = implode("*", $numbers); echo $numstr; ?><br>
    Explode: <?php $numbers = explode("*", $numstr); echo print_r($numbers); ?><br>
    In Array: <?php echo in_array(77, $numbers); ?><br>
    <br>

    [Boolean]<br>
    <?php $result = false;
      $result2 = TRUE;
      if(is_bool($result)){
        echo "the result is valid.";
      }?><br>
      <br>

    [Null]<br>
    <?php $val1 = null; $val2 = ""; 
      $val4=0; $val5=0.0; $val6="0"; $val7=False; $val8=array();?>
    Is-null-null: <?php echo is_null($val1);?><br>
    Is-null-empty: <?php echo is_null($val2);?><br>
    Is-null-nudifined: <?php echo is_null($val3);?><br>
    Is-set-null: <?php echo isset($val1);?><br>
    Is-set-empty: <?php echo isset($val2);?><br>
    Is-set-undifined: <?php echo isset($val3);?><br>
    Is-empty-null:   <?php echo empty($val1);?><br>
    Is-empty-empty:   <?php echo empty($val2);?><br>
    Is-empty-undifine:   <?php echo empty($val3);?><br>
    Is-empty-0:  <?php echo empty($val4);?><br>
    Is-empty-0.0:   <?php echo empty($val5);?><br>
    Is-empty-"0":   <?php echo empty($val6);?><br>
    Is-empty-false:   <?php echo empty($val7);?><br>
    Is-empty-array:   <?php echo empty($val8);?><br>
    <br>

    [Type and Casting] <br>
    <?php $val1 = "3"; $val2=2;?>
    <?php echo gettype($val1);?>
    <?php echo gettype($val2);?><br>
    String + Integer: <?php echo gettype($val1 + $val2);?><br>
    Settype: <?php settype($val1, "integer"); echo gettype($val1);?><br>
    Casting: <?php 
      //can be casted with interger/int, float, array, bool/boolean
      $val3 = (string)$val2; 
      echo gettype($val3);?><br>
    <?php $val3 = (float)$val2; echo $val3; echo gettype($val3);?><br> 
    <?php $val3 = (array)$val2; echo print_r($val3); ?><br> 
    <?php $val3 = (bool)$val2; echo $val3; ?><br> 
    <br>

    [Constant] <br>
    <?php
      define("MAX_LENGTH", 980);
      echo MAX_LENGTH;
      //can't change the value, can't redefine.
    ?>
</html>
