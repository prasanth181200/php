<?php
// Create a blank image
$image = imagecreatetruecolor(400, 400);

// Allocate colors
$backgroundColor = imagecolorallocate($image, 255, 255, 255); // White background
$skinColor = imagecolorallocate($image, 255, 224, 189); // Skin color
$eyeColor = imagecolorallocate($image, 0, 0, 0); // Black color for eyes
$hairColor = imagecolorallocate($image, 0, 0, 0); // Black color for hair
$mouthColor = imagecolorallocate($image, 255, 105, 180); // Pinkish color for mouth
$tear = imagecolorallocate($image, 0, 100, 180); //blue

// Fill the background with white color
imagefill($image, 0, 0, $backgroundColor);

// Draw the face (circle)
imagefilledellipse($image, 200, 200, 250, 250, $skinColor);

// Draw the eyes (circles)
imagefilledellipse($image, 150, 170, 50, 50, $eyeColor); // Left eye
imagefilledarc($image, 250, 205, 14, 40, 180, 180, $tear, IMG_ARC_PIE);
imagefilledellipse($image, 250, 170, 50, 50, $eyeColor); // Right eye

// Draw the mouth (arc)
imagefilledarc($image, 200, 240, 120, 70, 0, 180, $mouthColor, IMG_ARC_PIE);

// Draw the hair (using a black ellipse for simplicity)
//imagefilledellipse($image, 200, 100, 250, 150, $hairColor);

// Output the image to the browser
header('Content-Type: image/png');
imagepng($image);

// Free up memory
imagedestroy($image);
?>
