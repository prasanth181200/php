<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Maximum Value</title>
</head>
<body style="text-align: center; font-size:2rem;">
    <h2>Find Maximum</h2>
    <form action="find_maximum.php" method="post">
        <lable>Enter multi dimensional array:</lable><br>
        <input type="text" name="string" placeholder="[[0,1,2],[3,4,5],[6,7,8]]" style="margin:10px 5px; padding:5px 5px; width:500px; font-size: 2rem;"><br>
        <input type="submit" value="Submit" name="submit" style="font-size: 2rem;">
    </form>
    <br>
</body>
</html>
<?php
    if(isset($_POST["string"]) && $_POST["string"]){
        $string = $_POST["string"];
        $string = trim($string,);
        $string =  str_replace(['[',']'], "", $string);
        $array = [];
        $max = -INF;
        
        $clean_string = preg_replace("/[[]]/", "", $string);
        $array[] = array_map('intval', explode(',', $clean_string) );
        foreach ($array as $nums) {
            foreach ($nums as $num){
                if ($num > $max){
                    $max = $num;
                }
            }
        }
        echo "Maximum Value = $max.";
    };
    echo '<a href="/"><p style="text-align: left; font-size: 1.5rem;">return</p></a>';
?>
