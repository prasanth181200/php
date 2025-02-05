<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditionals</title>
    <style>lable{font-weight:900;}.age{width:30px;}</style>
</head>
<body style="text-align: center; font-size:1.5rem;">
    <br>
    <h2>Mystery Dish Selector:</h2>
    <form action="conditions.php" method="post">
        <lable>Name</lable>
        <input type="text" name="name" style="margin:10px 5px; padding:10px 5px;">
        <lable>Age </lable>
        <input type="number" name="age" style="margin:10px 5px; padding:10px 5px;" class="age"><br>

        <lable>Prefrence:</lable><br>
        Vegetarian
        <input type="radio" name="preference" value="vegetarian" onclick="getVote(this.value)">
        Vegan
        <input type="radio" name="preference" value="vegan" onclick="getVote(this.value)">
        Gluten-free
        <input type="radio" name="preference" value="gluten-free" onclick="getVote(this.value)">
        Omnivore
        <input type="radio" name="preference" value="omnivore" onclick="getVote(this.value)"><br><br>

        <lable>Favorite:</lable><br>
        Italian
        <input type="radio" name="favorite" value="italian" onclick="getVote(this.value)">
        Indian
        <input type="radio" name="favorite" value="indian" onclick="getVote(this.value)">
        Mexican
        <input type="radio" name="favorite" value="mexican" onclick="getVote(this.value)">
        Japanese
        <input type="radio" name="favorite" value="japanese" onclick="getVote(this.value)"><br>
     
        <br><input type="submit" value="Submit" name="submit" style="font-size: 2rem;">
    </form>
    <br>
    <a href="/"><P style="text-align: left; font-size: 1.5rem;">return</p></a>
</body>
</html>

<?php
    $guest_name = $_POST["name"];
    $age = $_POST["age"];
    $preference = $_POST["preference"];
    $favorite = $_POST["favorite"];

    if ($preference == "vegetarian"){
        if ($favorite == "italian"){
            echo "Hey $guest_name, enjoy a delicious Veggie Lasagna!";
        } elseif ($favorite == "indian"){
            echo "Hey $guest_name, how about a classic Paneer Tikka Masala?";
        } elseif ($favorite == "mexican"){
            echo "Hey $guest_name, try our vegetarian Tacos with Guacamole!";
        }  elseif ($favorite == "japanese") {
            echo "Hey $guest_name, enjoy a Vegetarian Maki Roll with Asparagus and Avocado!";
        } else {
            echo "Hey $guest_name, how about a fresh vegetable stir-fry?";
        }
    }elseif ($preference == "vegan"){
        if ($favorite == "italian"){
            echo "Hey $guest_name, enjoy a Vegan Margherita Pizza!";
        } elseif ($favorite == "indian"){
            echo "Hey $guest_name, try a Vegan Chickpea Curry!";
        } elseif ($favorite == "mexican"){
            echo "Hey $guest_name, have some Vegan Burritos with Rice and Beans!";
        } elseif ($favorite == "japanese") {
            echo "Hey $guest_name, enjoy a Vegan Sushi Roll with Avocado and Cucumber!";
        } else {
            echo "Hey $guest_name, here's a hearty Vegan Buddha Bowl!";
        }
    }elseif ($preference == "gluten-free"){
        if ($favorite == "italian"){
            echo "Hey $guest_name, enjoy a delicious Veggie Lasagna!";
        } elseif ($favorite == "indian"){
            echo "Hey $guest_name, try a Gluten-Free Chicken Tikka!";
        } elseif ($favorite == "mexican"){
            echo "Hey $guest_name, try our vegetarian Tacos with Guacamole!";
        } elseif ($favorite == "japanese") {
            echo "Hey $guest_name, enjoy a Gluten-Free Teriyaki Chicken with Rice!";
        } else {
            echo "Hey $guest_name, how about a fresh vegetable stir-fry?";
        }
    }elseif ($preference == "omnivore"){
        if ($favorite == "italian"){
            echo "Hey $guest_name, enjoy a delicious Italian Spaghetti Carbonara!";
        } elseif ($favorite == "indian"){
            echo "Hey $guest_name, try a tasty Butter Chicken with Naan!";
        } elseif ($favorite == "mexican"){
            echo "Hey $guest_name, have some tasty Beef Tacos with Salsa!";
        } elseif ($favorite == "japanese") {
            echo "Hey $guest_name, enjoy a delicious Sushi Roll with Tuna and Salmon!";
        } else {
            echo "Hey $guest_name, here's a hearty Omnivore Platter with various delights!";
        }
    }else{
        echo "Hey $guest_name, we have many other options for you! Let us know your preference!";
    };

    unset($name, $age, $preference, $favorite)
?>
