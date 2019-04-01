#!/usr/bin/php
<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');
//require_once('login.php.inc');

require_once ('../unirest-php/src/Unirest.php');

function doFavIngredients($ingredients)
{

//Get nutritional information from spoonacular
 $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/findByIngredients?ingredients=$ingredients",array( "X-RapidAPI-Key" => "f0de423a1fmshf077c4714bd76a2p131d6bjsn0818ef1f78e5"
    )
  );

  return $response;
}



function doCalories($calories,$time_frame,$diet)
{

 //Get recipe according to your diet requirements from spoonacular
 $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/mealplans/generate?targetCalories=$calories&timeFrame=$time_frame&diet=$diet",
  array(
    "X-RapidAPI-Key" => "f0de423a1fmshf077c4714bd76a2p131d6bjsn0818ef1f78e5",
  )
);
  return $response;

}

function doFridge($request)
{
  //Get recipe according to your fridge from spoonacular
  return 0;
}

function doConvertAmounts($ingredient_convert,$source_unit,$source_amount,$target_unit)
{
  $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/convert?sourceUnit=$source_unit&sourceAmount=$source_amount&ingredientName=$ingredient_convert&targetUnit=$target_unit",
  array(
    "X-RapidAPI-Key" => "f0de423a1fmshf077c4714bd76a2p131d6bjsn0818ef1f78e5"
  )
);

  return $response;
}

function doFoodVideos($query,$includeingredients,$excludeingredients,$number){

  $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/food/videos/search?query=$query&excludeingredients=$excludeingredients&includeingredients=$includeingredients&number=$number",
  array(
    "X-RapidAPI-Key" => "f0de423a1fmshf077c4714bd76a2p131d6bjsn0818ef1f78e5"
  )
);
  return $response;
}



function doMacro($dish)
{
  //Track your macros from spoonacular
  $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/guessNutrition?title=$dish",
  array(
    "X-RapidAPI-Key" => "f0de423a1fmshf077c4714bd76a2p131d6bjsn0818ef1f78e5"
  )
);
  return $response;
}

function doIngredientReplace($ingredient_replace){

  $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/food/ingredients/substitutes?ingredientName=$ingredient_replace",
  array(
    "X-RapidAPI-Key" => "f0de423a1fmshf077c4714bd76a2p131d6bjsn0818ef1f78e5"
  )
);
  return $response;
}

function doAutocompleteMenu($auto_menu,$auto_number){
    $response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/food/menuItems/suggest?number=$auto_number&query=$auto_menu",
  array(
    "X-RapidAPI-Key" => "f0de423a1fmshf077c4714bd76a2p131d6bjsn0818ef1f78e5"
  )
);
    return $response;
}

function doRandomRecipes($random_number,$random_tags){



$response = Unirest\Request::get("https://spoonacular-recipe-food-nutrition-v1.p.rapidapi.com/recipes/random?number=$random_number&tags=$random_tags",
  array(
    "X-RapidAPI-Key" => "f0de423a1fmshf077c4714bd76a2p131d6bjsn0818ef1f78e5"
  )
);

  return $response;

}




function requestProcessor($request)
{
  echo "received request".PHP_EOL;
  var_dump($request);
  if(!isset($request['type']))
  {
    return "ERROR: unsupported message type";
  }
  switch ($request['type'])
  {
    case "ingredients":
	   return doFavIngredients($request["ingredients"]);
    case "fridge":
	   return doFridge($request);
    case "calories":
  	 return doCalories($request["calories"], $request["time_frame"] , $request["diet"]);
    case "macro":
  	 return doMacro($request["dish"]);
    case "convert":
      return doConvertAmounts($request['ingredient_convert'],$request['source_unit'], $request['source_amount'],$request['target_unit'] );
    case "videos":
      return doFoodVideos($request["query"],$request["includeingredients"], $request["excludeingredients"],$request["number"]);
    case "replace":
     return doIngredientReplace($request["ingredient_replace"]);
    case "auto":
     return doAutocompleteMenu($request["auto_menu"],$request["auto_number"]);
    case "random":
     return doRandomRecipes($request["random_number"],$request["random_tags"]);
    case "validate_session":
      return doValidate($request['sessionId']);
  }
  return array("returnCode" => '0', 'message'=>"Server received request and processed");
}

$server = new rabbitMQServer("../testRabbitMQ.ini","testServer");

$server->process_requests('requestProcessor');
exit();
?>

