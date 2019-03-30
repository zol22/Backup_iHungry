<?php 

session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);    
ini_set( 'display_errors' , 1 );  


require ('../ApiType/API_type.php');#contains login client function --GOOD!!!


if (isset($_POST["submit_ingredients"])) {

	$ingredients = $_POST [ "ingredients" ] ;

	recipe_ingredients($ingredients); 


	
}

if (isset($_POST["submit_calories"])) {

	$calories = $_POST [ "calories" ] ;
	$time_frame = $_POST [ "time_frame" ] ;
	$diet = $_POST[ "diet" ];

	recipe_daily_calories($calories,$time_frame,$diet); 

	
}

if (isset($_POST["submit_convert"])) {

	$ingredient_convert = $_POST [ "ingredient_convert" ] ;
	$source_unit = $_POST [ "source_unit" ] ;
	$source_amount = $_POST [ "source_amount" ] ;
	$target_unit = $_POST [ "target_unit" ] ;

	convert_amounts($ingredient_convert,$source_unit,$source_amount,$target_unit); 
	
}

if (isset($_POST["submit_food_video"])) {

	$query = $_POST [ "query" ] ;
	$includeingredients = $_POST [ "includeingredients" ] ;
	$excludeingredients = $_POST [ "excludeingredients" ] ;
	$number = $_POST [ "number" ] ;

	search_food_videos($query,$includeingredients,$excludeingredients,$number); 
	
}

if (isset($_POST["submit_macro"])) {

	$dish= $_POST [ "dish" ] ;

	get_macro_nutrients($dish); 
	
}

if (isset($_POST["submit_replace"])) {

	$ingredient_replace= $_POST [ "ingredient_replace" ] ;

	ingredient_replace($ingredient_replace); 
	
}


if (isset($_POST["submit_auto_menu"])) {

	$auto_menu= $_POST [ "auto_menu" ] ;
	$auto_number= $_POST [ "auto_number" ] ;

	autocomplete_menu_item($auto_menu,$auto_number); 
	
}

if (isset($_POST["submit_random_recipes"])) {

	$random_number= $_POST [ "random_number" ] ;
	$random_tags= $_POST [ "random_tags" ] ;

	random_recipes($random_number,$random_tags); 
	
}




?>
