<?php
require_once 'unirest-php/src/Unirest.php';
$response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/mealplans/generate?targetCalories=2000&timeFrame=day",
  array(
    "X-RapidAPI-Key" => "1bd8955bb5msh20153e7d105e2d5p1138c1jsn920fe71fc5d4"
  )
);

//echo $response->body;
//echo "<br>";

var_dump($response);


//var_dump($response);
?>
