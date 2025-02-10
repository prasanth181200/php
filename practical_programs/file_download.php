<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Downloader Program!</title>
</head>
<body style="text-align: center; font-size:2rem;">
    <h2>File Downloader</h2>
    <form action="file_download.php" method="post">
        <lable>Past URL:</lable>
        <input type="text" name="url" style="margin:10px 5px; padding:10px 5px; font-size: 1.5rem;"><br>
        <lable>Save as:</lable>
        <input type="text" name="filename" style="margin:10px 5px; padding:10px 5px; font-size: 1.5rem;"><br><br>
        <input type="submit" value="Download" name="submit" style="font-size: 2rem;">
    </form>
    <br>
</body>
</html>
<?php
    function getFile($url, $filename) {
        $fileContent = file_get_contents($url);
        if ($fileContent !== false) {
            $file = fopen($filename, 'wb');
            fwrite($file, $fileContent);
            fclose($file);
            echo "File downloaded successfully and saved as $filename";
        } else {
            echo "Failed to download the file.";
        }
    }
    
    if ((isset($_POST["url"]) && $_POST["url"] !== "") && (isset($_POST["filename"]) && $_POST["filename"] !== "")) {
        $url = $_POST["url"];
        $filename = $_POST["filename"];
        if (strpos($filename, ".") !== false) {
            getFile($url, $filename);
        } else {
            echo "Please enter file name with extension! example: <i style=\"font-size: 1.4rem\">image.png</i>";
        }
        unset($url, $filename);
    } else {
        echo "Please fill Both URL and file name.";
    }
    echo '<a href="/"><p style="text-align: left; font-size: 1.5rem;">return</p></a>';
?>
