<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator!</title>
</head>
<body style="text-align: center; font-size:2rem;">
    <h2>Calculator!</h2>
    <form action="calculator.php" method="post">

        <input type="text" name="expresion" placeholder="  0-1+2/3*4**5" style="margin:10px 5px; padding:10px 5px; font-size: 1.5rem; text-align: right;"><br>
        <input type="submit" value="Submit" name="submit" style="font-size: 2rem;">
    </form>
    <br>
</body>
</html>
<?php
    if (isset($_POST["expresion"]) && $_POST["expresion"] !== "") {
        $expr = $_POST["expresion"];
        $result = eval("return $expr;");
        echo "= $result";
    unset($expr, $POST["expression"], $result);
    }
    echo '<a href="/"><p style="text-align: left; font-size: 1.5rem;">return</p></a>';
?>
