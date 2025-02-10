<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Calculator!</title>
</head>
<body style="text-align: center; font-size:2rem;">
    <h2>Age Calculator!</h2>
    <form action="age_calculator.php" method="post">
        <lable>Pick DOB:</lable><br>
        <input type="date" name="dob" style="margin:10px 5px; padding:10px 5px; font-size: 1.5rem;"><br><br>
        <input type="submit" value="Calculate" name="submit" style="font-size: 2rem;">
    </form>
    <br>
</body>
</html>
<?php
    if ((isset($_POST["dob"]) && $_POST["dob"] !== "")) {
        $dob = explode("-", $_POST["dob"]);
        $date = explode("-", date("Y-m-d"));
        $years = $date[0] - $dob[0];
        $months = $date[1] - $dob[1];
        $days = $date[2] - $dob[2];

        if ($days < 0) {
            $days += ($date[1] == 2) ? 28 : (($date[1]%2 == 0) ? 30 : 31);
            $months --;
        }
        if ($months < 0) {
            $months += 12;
            $years--;
        }

        if ($years < 0) {
            echo "Invalid input!";
        } else {
            echo "You are ".$years." years, ".$months." months and ".$days." days Old!";
        }
        unset($dob, $date);
    }
    echo '<a href="/"><p style="text-align: left; font-size: 1.5rem;">return</p></a>';
?>
