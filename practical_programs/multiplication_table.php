<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Multiplication Table Number!</title>
</head>
<body style="text-align: center; font-size:2rem;">
    <h2>Generate Multiplication Table</h2>
    <form action="multiplication_table.php" method="post">
        <lable>Enter Number :</lable>
        <input type="number" name="number" style="margin:10px 5px; padding:10px 5px; font-size: 1.5rem;"><br><br>
        <input type="submit" value="Submit" name="submit" style="font-size: 2rem;">
    </form>
    <br>
</body>
</html>
<?php
    if (isset($_POST["number"]) && $_POST["number"] !== "") {
        $num = $_POST["number"];
        for ($i =1; $i<=10; $i++){
            echo $i." x ".$num." = ".($i * $num)."<br>";
        }
    unset($num);
    }
    else {
        echo "";
    }
    echo '<a href="/"><p style="text-align: left; font-size: 1.5rem;">return</p></a>';
?>
