<?php // begin width a php open tag.
    echo "Hello World\n";
    print("Hello quickref.me\n");
    $url = 'quickref.com';
    echo "I'm learning PHP at ".$url."\n"; //concatenating
    $hello = "Hello,";
    echo "\$hello=".$hello."\n";
    $hello .= " World!";
    echo "\$hello=".$hello."\n";
    unset($hello, $url); //de-alocating used vars in this block

    echo "\n\n#basic var declaration\n";
    $num = [1,3,5,7,9]; // var declaretion
    echo "after declaration \$num="; print_r($num); echo "\n";
    unset($num[2]); // Delete variable
    echo "after unset(\$num[2])="; print_r($num); echo "\n";
    unset($num); //de-alocating used vars in this block

    $x = 1; $y = 2;
    $sum = $x + $y;
    echo "\$x=".$x.", \$y=".$y."; \$sum = \$x + \$y; sum = ".$sum."\n";
    unset($x, $y, $sum); //de-alocating used vars in this block

    echo "\n\n#include or importing";
    echo "\nimporting vars.php and store its return value in variable called \$vars .\n";
    $vars = include('vars.php'); // importing vars.php
    echo "\n\$vars=".$vars."\n";
    unset($vars); //de-alocating used vars in this block

    echo "\n#function\n";
    function add($num1, $num2 = 1){
        return $num1 + $num2;
    }
    echo "function name add it tacks two inputs & one has default value of 1 and returns the sum of inputs";
    echo "\nadd(10)=".add(10);
    echo "\nadd(10, 5)=".add(10, 5);

    echo "\n\n#comments\n";
    echo "\"#\" this is for single line comment. (shell-style)\n";
    echo "\"//\" this is for single line comment. (c++ style)\n";
    echo "\"/* some line of text */\" this is for multi line comment.\n";

    echo "\n#constants\n";
    echo "declaring constant variable called MY_CONST\n";
    const MY_CONST = "hello\n";
    echo "MY_CONST is :".MY_CONST."\n";

    echo "\n#class";
    echo "declaring class named Student.\n";
    echo "defining a cunstructer with argumet \$name.\n";
    class Student {
        public function __construct($name) {
            $this->Name = $name;
        }
    }
    echo "initializing new object \$alex with a parameter \"Alex\".";
    $alex = new Student("Alex");
    echo "\n\$alex->Name=".$alex->Name;
    unset($alex); //de-alocating used vars in this block

    echo "\n\n#php types\n";
    echo "#boolean\n";
    $bool1 = true; $BOOL1 = TRUE;
    echo "\$bool1:true =".$bool1." \$BOOL1:TRUE =".$BOOL1."\n";
    $bool2 = false; $BOOL2 = FALSE;
    echo "\$bool2:false =".$bool2." \$BOOL2:FALSE =".$BOOL2."\n";
    $bool3 = (boolean) 1; # true
    echo "(boolean) 1; =".$bool3."\n";
    $bool4 = (boolean) 0; # false
    echo "(boolean) 0; =".$bool4."\n";
    unset($bool1, $BOOL1, $bool2, $BOOL2, $bool3, $bool4); //de-alocating used vars in this block

    echo "\n#integer\n";
    $int1 = 28;
    echo "unsigned int \$int1=".$int1."\n";
    $int2 = -32;
    echo "signed int \$int2=".$int2."\n";
    $int3 = 012;
    echo "octal int \$int3=".$int3."\n";
    $int4 = 0x0f;
    echo "hex int \$int4=".$int4."\n";
    $int5 = 0b101;
    echo "binary int \$int5=".$int5."\n";
    $int6 = 2_000_100_000;
    echo "_ seperated int \$int6=".$int6."\n";
    unset($int1, $int2, $int3, $int4, $int5, $int6); //de-alocating used vars in this block

    echo "\n#array\n";
    $arr = array("hello", "world", "!");
    echo '$arr  = array("hello", "world", "!")';
    unset($arr); //de-alocating used vars in this block

    echo "\n\n#float(double)\n";
    $float1 = 1.234;
    echo "\$float1=".$float1."\n";
    $float2 = 1.2e7;
    echo "\$float2=".$float2."\n";
    $float3 = 7E-10;
    echo "\$float3=".$float3."\n";
    $float4 = 1_234.567;
    echo "\$float=";
    var_dump($float4);
    $float5 = 1 + "10.5";
    echo "\$float5=".$float5."\n";
    $float6 = 1 + "-1.3e3";
    echo "\$float6=".$float6."\n";
    unset($float1, $float2, $float3, $float4, $float5, $float6); //de-alocating used vars in this block

    echo "\n\n#null\n";
    $a = null;
    echo "\$a = null\n";
    $b = "helo php!";
    echo '$b = "'.$b.'"'."\n";
    echo "\$a ?? ".'"somthing" ='; echo $a ?? '$a is null (or) unset'."\n";
    echo "\$b ?? ".'"somthing" =';echo $b."\n" ?? '$b is null (or) unset'."\n";
    $arr = array();
    echo "\$arr is an empty array\n";
    echo "\$arr == null :".($arr == null)."\n";
    echo "\$arr === null :".($arr === null)."\n";
    echo "is_null(\$arr)".is_null($arr)."\n";
    echo "\$a === null :".($a === null)."\n";
    echo "is_null(\$a) =".is_null($a)."\n";
?>
