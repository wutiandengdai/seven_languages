<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>Control PHP</title>
  </head>
  <body>
      <?php
      $new_user = "student";
      //logical operater: equal(123=="123"), identical(123===123), <>
      if(empty($new_user)){
        echo "<h1>Welcome</h1>";
        echo "<p>We are glad that you finally decided to join us!</p>";
      }elseif($new_user = "student"){
        echo "<h1>Welcome</h1>";
        echo "<p>Students may have a discount of 50% with their academic email address.<p>";
      }else{
        echo "<h1>Welcome Back</h1>";
        echo "<p>We have 80% discount for our old customers, ship now.<p>";
      }

      //leave out while, for, as it's identical with java

      $person= array("first_name" => "Jojo",
                "last_name" => "Darma" ,
                "age" => 22,
                "nationality"  => "India");
      foreach($person as $attr=>$data){
          echo strtoupper(str_replace ("_", " ",$attr)) . ": ";
          echo $data;
          echo "<br>";
      }

      $numbers = [32, 11, 91, 30, 49, 17];
      for($i = 0; $i < count($numbers); $i ++){
          if ($numbers[$i]%7 == 0){
              continue;
            //   break;
          }
          echo "{$numbers[$i]} - ";
          for($j = $i; $j < count($person); $j++){
            if ($numbers[$j]%5 == 0){
                //continue at two levels up loop
                continue(2);
                // breaks at two loops
                // break(2);
            }
            echo "{$numbers[$j]}<br>";
          }
      }

      //Array advanced - pointer
      //Null would return if the pointer is out of the range
      echo "<br>";
      echo "1: " . current($numbers). "<br>";  
      next($numbers);
      echo "2: " . current($numbers). "<br>";
      end($numbers);
      echo "3: " . current($numbers). "<br>";
      prev($numbers);
      echo "4: " . current($numbers). "<br>";
      reset($numbers);
      echo "5: " . current($numbers). "<br>";
      ?>
  </body>
  </html>