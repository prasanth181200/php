<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session views count!</title>
</head>
<body style="text-align: center; font-size:2rem;">
    <h2>Session views count! Program</h2>
    <br>
</body>
</html>
<?php
    session_start();
    
    if (!isset($_SESSION['count'])) {
        $_SESSION['count'] = 0;
    }
    
    $_SESSION['count'] += 1;
    
    echo "Views : ".$_SESSION['count'];
    
    echo '<br><br><a href="/"><p style="text-align: left; font-size: 1.5rem;">return</p></a>';
?>
