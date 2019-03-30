<?php
require_once('../path.inc');
require_once('../get_host_info.inc');
require_once('../rabbitMQLib.inc');


function recipe_ingredients($ingredients)
{
	$client = new rabbitMQClient("../testRabbitMQ.ini","testServer");

	$request = array();
	$request['type'] = "ingredients";
	$request['ingredients'] = $ingredients;

	$response = $client->send_request($request);

	$size = count($response["body"]);
	
	for ($x = 0 ; $x < $size ; $x++) {

		$id = ($response["body"][$x]["id"]);
		$title = ($response["body"][$x]["title"]);
		$image = ($response["body"][$x]["image"]);
		$useIngredients = ($response["body"][$x]["usedIngredientCount"]);
		$missedIngredients = ($response["body"][$x]["missedIngredientCount"]);

		echo "Option ".($x+1)."<br>";
		echo "ID:  ".$id."<br>";
		echo "Title:  ".$title."<br>";
		echo "UsedIngredients:  ".$useIngredients."<br>";
		echo "MissedIngredients:  ".$missedIngredients."<br>";		
		
		echo "<img src='$image' alt='ingredients' />";

		echo "<br><br><br>"; 
	}
}

/*Different output for week option*/
function recipe_daily_calories($calories,$time_frame,$diet)
{
	$client = new rabbitMQClient("../testRabbitMQ.ini","testServer");

	$request = array();
	$request['type'] = "calories";
	$request['calories'] = $calories;
	$request['time_frame'] = $time_frame;
	$request['diet'] = $diet;


	$response = $client->send_request($request); 
	
	$size = count($response["body"]["meals"]);

	$calories= ($response["body"]["nutrients"]["calories"]);
	$protein= ($response["body"]["nutrients"]["protein"]);
	$fat= ($response["body"]["nutrients"]["fat"]);
	$carbohydrates= ($response["body"]["nutrients"]["carbohydrates"]);

	echo "Nutrients  "."<br>";
	echo "Calories:  ".$calories."<br>";
	echo "Protein:  ".$protein."<br>";
	echo "Fat:  ".$fat."<br>";
	echo "Carbs:  ".$carbohydrates."<br><br>";


	for ($x = 0 ; $x < $size ; $x++) {
		$id = ($response["body"]["meals"][$x]["id"]);
		$title = ($response["body"]["meals"][$x]["title"]);
		$mins = ($response["body"]["meals"][$x]["readyInMinutes"]);
		$image = ($response["body"]["meals"][$x]["image"]);
		
		echo "Option ".($x+1)."<br>";
		echo "ID:  ".$id."<br>";
		echo "Title:  ".$title."<br>";
		echo "Time:  ".$mins." mins"."<br>";
	
		echo "<img src='https://spoonacular.com/recipeImages/$id-480x360.jpg' alt='ingredients' alt='recipe' />";

		echo "<br><br><br>";	
	}
	
}

function convert_amounts($ingredient_convert,$source_unit,$source_amount,$target_unit){

	$client = new rabbitMQClient("../testRabbitMQ.ini","testServer");

	$request = array();
	$request['type'] = "convert";
	$request['ingredient_convert'] = $ingredient_convert;
	$request['source_unit'] = $source_unit;
	$request['source_amount'] = $source_amount;
	$request['target_unit'] = $target_unit;

	$response = $client->send_request($request); 

	$answer = $response["body"]["answer"];
	echo $answer;


}


function search_food_videos($query,$includeingredients,$excludeingredients,$number){

	$client = new rabbitMQClient("../testRabbitMQ.ini","testServer");

	$request = array();
	$request['type'] = "videos";
	$request['query'] = $query;
	$request['includeingredients'] = $includeingredients;
	$request['excludeingredients'] = $excludeingredients;
	$request['number'] = $number;

	$response = $client->send_request($request); 

	if (!empty($number)){
		$size = $number;
	}
	else{
		$size = count($response["body"]["videos"]);
	}
		
		for ($x = 0 ; $x < $size ; $x++) {
		 	$title = ($response["body"]["videos"][$x]["title"]);
		 	$shortTitle = ($response["body"]["videos"][$x]["shortTitle"]);
		 	$rating = ($response["body"]["videos"][$x]["rating"]);
		 	$length = ($response["body"]["videos"][$x]["length"]);
		 	//$thumbnail = ($response["body"]["videos"][$x]["thumbnail"]);
		 	$views = ($response["body"]["videos"][$x]["views"]);
		 	$youtubeId = ($response["body"]["videos"][$x]["youTubeId"]);

		 	echo "Option ".($x+1)."<br>";
		 	echo "Title: ".$title."<br>";
		 	echo "Short title: ".$shortTitle."<br>";
		 	echo "Rating: ".round($rating,2)."<br>";
		 	echo "Views: ".$views."<br>";
		 	echo "Length:  ".gmdate("i:s",$length)."<br>.<br>";

		 	//echo "<img src='$thumbnail' alt='thumbnail' />"; echo"<br>";

		 	echo "<iframe src='http://www.youtube.com/embed/$youtubeId' width='560' height='315' ></iframe>";

		 	echo "<br><br><br><br>";
		}
}

function get_macro_nutrients($dish){

	$client = new rabbitMQClient("../testRabbitMQ.ini","testServer");

	$request = array();
	$request['type'] = "macro";
	$request['dish'] = $dish;

	$response = $client->send_request($request); 


	$valueCalories = ($response["body"]["calories"]["value"]);
	$unitCalories = ($response["body"]["calories"]["unit"]);

	echo "Calories:  ".$valueCalories." ".$unitCalories."<br>";

	$valueFat= ($response["body"]["fat"]["value"]);
	$unitFat = ($response["body"]["fat"]["unit"]);

	echo "Fat:  ".$valueFat." ".$unitFat."<br>";

	$valueProtein = ($response["body"]["protein"]["value"]);
	$unitProtein = ($response["body"]["protein"]["unit"]);

	echo "Protein:  ".$valueProtein." ".$unitProtein."<br>";

	$valueCarbs= ($response["body"]["carbs"]["value"]);
	$unitCarbs = ($response["body"]["carbs"]["unit"]);

	echo "Carbs:  ".$valueCarbs." ".$unitCarbs."<br>";

	echo "<a type='button' name='b_share'  href='https://www.facebook.com/sharer/sharer.php?u=example.org' target='_blank'>
      	Share on Facebook
      	</a";
}

function ingredient_replace($ingredient_replace){

	$client = new rabbitMQClient("../testRabbitMQ.ini","testServer");

	$request = array();
	$request['type'] = "replace";
	$request['ingredient_replace'] = $ingredient_replace;

	$response = $client->send_request($request); 

	var_dump($response);
}

function autocomplete_menu_item($auto_menu,$auto_number){

	$client = new rabbitMQClient("../testRabbitMQ.ini","testServer");

	$request = array();
	$request['type'] = "auto";
	$request['auto_menu'] = $auto_menu;
	$request['auto_number'] = $auto_number;

	$response = $client->send_request($request); 

	var_dump($response);
}


function random_recipes($random_number,$random_tags){

	$client = new rabbitMQClient("../testRabbitMQ.ini","testServer");

	$request = array();
	$request['type'] = "random";
	$request['random_number'] = $random_number;
	$request['random_tags'] = $random_tags;

	$response = $client->send_request($request); 

	var_dump($response);

}


?>
