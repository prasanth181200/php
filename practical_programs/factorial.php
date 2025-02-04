<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Factorial</title>
</head>
<body>
    <form action="factorial.php" method="post">
        <input type="number" name="number">
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
<?php
    $num = $_POST["number"];
    
    if ( $num ){
        $result = 1;
        for ($i = $num ; $i >0; $i--){
            $result *= $i;
        };
        echo "factorial of $num = $result";
    }
    unset($num, $result)
?>