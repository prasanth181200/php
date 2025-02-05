<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Factorial</title>
</head>
<body style="text-align: center; font-size:2rem;">
    <h2>Factorial Program</h2>
    <form action="factorial.php" method="post">
        <lable>Enter number</lable><br>
        <input type="number" name="number" style="margin:10px 5px; padding:10px 5px;"><br>
        <input type="submit" value="Submit" name="submit" style="font-size: 2rem;">
    </form>
    <br>
</body>
</html>
<?php
    if (isset($_POST["number"]) && $_POST["number"] !== "" ){
        $num = $_POST["number"];
        $result = 1;
        for ($i = $num ; $i >0; $i--){
            $result *= $i;
        };
        echo "factorial of $num = $result";
    unset($num, $result);
    }
    echo '<a href="/"><p style="text-align: left; font-size: 1.5rem;">return</p></a>';
?>
