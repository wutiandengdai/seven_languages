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
</html>
