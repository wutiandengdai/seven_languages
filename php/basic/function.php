<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
  <head>
    <title>Function and Debug PHP</title>
  </head>
  <body>
      <?php
        //function with return
        function say_hello_to($name){
            //Debugging information
            var_dump(debug_backtrace());

            return "<br>Hello {$name}! <br>";
        }
        $name = "John Josh";
        echo say_hello_to($name);

        function constellation($month){
            switch($month){
                case 4: return "Aries";
                case 5: return "Taurus";
                case 6: return "Gemini";
                case 7: return "Cancer";
                case 8: return "Leo";
                case 9: return "Virgo";
                case 10: return "Libra";
                case 11: return "Scorpio";
                case 12: return "Sagittarius";
                case 1: return "Capricorn";
                case 2: return "Aquarius";
                case 3: return "Pisces";
            }
        }
        $month_of_birth=3;
        echo "Month ". $month_of_birth . " is ". constellation($month_of_birth). "<br>";

        //multiple returns
        function add_sub($arg1,$arg2){
            return array($arg1+$arg2, $arg1-$arg2);
        }
        list($sum, $diff) = add_sub(16, 9);
        echo "Sum : {$sum}<br>";
        echo "Diff : {$diff}<br>";

        //globa variable
        $bar = "outside";
        function foo(){
            global $bar;
            if(isset($bar)){
                echo "foo: {$bar} <br>";
            }
            $bar = "inside";
        }
        echo "global: {$bar}<br>";
        foo();
        echo "global: {$bar}<br>";

        //argument default value
        function paint($room="living room", $color="pink"){
            echo "The {$room} is painted {$color}. <br>";
        }
        paint();    //will take the default
        paint("dinning room", "");  //will replace
        paint("bedroom", null); //will replace
        paint("bathroom", "green");     //will replace 
        
        /**
         * Argument of default value 
         * in this case, both arguments need to be provided.
         * so good practice is to put the argument with default value at last.
         */
        function paint_livingroom($room="living room", $color){
            echo "The {$room} is painted {$color}. <br>";
        }

        //debug
        echo "<br> <h2>Var Dump </h2><p>";
        var_dump($bar);
        echo "</p> <h2>Get Defined Vars </h2><p>";
        print_r(get_defined_vars());
        echo "</p>";
      ?>
  </body>
  </html>