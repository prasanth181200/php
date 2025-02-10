<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Time Cookie!</title>
</head>
<body style="text-align: center; font-size:2rem;">
    <h2>Cookie! Demo Program</h2>
    <br>
</body>
</html>
<?php
    $date = new DateTime();
    if (isset($_COOKIE['last_visit'])) {
        echo "You have Last Visited on:<br>".$date->format('Y-m-d H:i:s');
        setcookie('last_visit', $date->format('Y-m-d H:i:s'), time() + (10 * 365 * 24 * 60 * 60), "/");
    } else {
        echo "This is your first time visiting!";
        setcookie('last_visit', $date->format('Y-m-d H:i:s'), time() + (10 * 365 * 24 * 60 * 60), "/");
    }

    unset($date, $time);
    
    echo '<a href="/"><p style="text-align: left; font-size: 1.5rem;">return</p></a>';
?>
