<!DOCTYYPE html>
<head>
</head>
<body>
    <form action="index.php" method="post">
        <lable>uname:</lable>
        <input type="text" name="uname"><br>
        <label>passwd:</lable>
        <input type="password" name="passwd"><br>
        <input type="submit" value="Log in">
    </form>
</body>
</html>

<?php
    echo $_POST["uname"];
    echo $_POST["passwd"];    
?>

