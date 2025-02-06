<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find GCD of Two Numbers!</title>
</head>
<body style="text-align: center; font-size:2rem;">
    <h2>GCD Program</h2>
    <form action="find_gcd.php" method="post">
        <lable>Enter Number 1:</lable>
        <input type="number" name="number1" style="margin:10px 5px; padding:10px 5px; font-size: 1.5rem;"><br>
        <lable>Enter Number 2:</lable>
        <input type="number" name="number2" style="margin:10px 5px; padding:10px 5px; font-size: 1.5rem;"><br><br>
        <input type="submit" value="Submit" name="submit" style="font-size: 2rem;">
    </form>
    <br>
</body>
</html>
<?php
    function calc_gcd($num1, $num2){
        while ($num2 != 0) {
            $tmp = $num2;
            $num2 = $num1 % $num2;
            $num1 = $tmp;
        };
        return $num1;
    };
    if ((isset($_POST["number1"]) && $_POST["number1"] !== "") && (isset($_POST["number2"]) && $_POST["number2"] !== "")) {
        $num1 = $_POST["number1"];
        $num2 = $_POST["number2"];
        $gcd = 0;
        $gcd = calc_gcd($num1, $num2);
        echo "GCD of $num1 and $num2 = $gcd";
    unset($num1, $num2, $gcd);
    }
    echo '<a href="/"><p style="text-align: left; font-size: 1.5rem;">return</p></a>';
?>
