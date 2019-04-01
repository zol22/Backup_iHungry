<?php 

include ('../../LoginFiles/login_register_request.php'); 

//	If the user is not logged in, they cannot access this page
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	redirect("Redirecting to the login", "../login.php", 2);
  	//header('location: login.php');
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>iHungry</title>

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="css/stylish-portfolio.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <a class="menu-toggle rounded" href="#">
    <i class="fas fa-bars"></i>
  </a>

  <nav id="sidebar-wrapper">
    <ul class="sidebar-nav">

      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#page-top">Home</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#about">About</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#services">Services</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#portfolio">Features</a>
      </li>
      <li class="sidebar-nav-item">
        <a class="js-scroll-trigger" href="#contact">Contact</a>
      </li>
    </ul>
  </nav>

  <!-- Header -->
  <header class="masthead d-flex">

	<div class="content">

		<?php if (isset($_SESSION['success'])) : ?>
      	<div class="error success " >
      		<h3>
          		<?php 
          			echo $_SESSION['success']; 
          			unset($_SESSION['success']);
          		?>
      		</h3>
      	</div>
  		<?php endif ?>


  	    <!-- logged in user information -->
    	<?php  if (isset($_SESSION['username'])) : ?>
    		<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    		<p> <a href="website.php?logout='1'">logout</a> </p>
    	<?php endif ?>


	</div>


    <div class="container text-center my-auto">
      <h1 class="mb-1">iHungry</h1>
      <h3 class="mb-5">
        <em>Find your desired recipes!</em>
      </h3>
      <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a>
    </div>
    <div class="overlay"></div>
  </header>

  <!-- About -->
  <section class="content-section bg-light" id="about">
    <div class="container text-center">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h2>iHungry</h2>
          <p class="lead mb-5">... is a website that helps you prepare your meals according to <em>your</em> diet , and <em>your</em> nutritional requirements.</p>
        
          <a class="btn btn-dark btn-xl js-scroll-trigger" href="#services">What We Offer</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Services -->
  <section class="content-section bg-primary text-white text-center" id="services">
    <div class="container">
      <div class="content-section-heading">
        <h3 class="text-secondary mb-0">Check</h3>
        <h2 class="mb-5">What We Offer</h2>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class='fas fa-pizza-slice'></i>
          </span>
          <h4>
            <strong>Recipes</strong>
          </h4>
          <!--<p class="text-faded mb-0">Looks great on any screen size!</p>-->
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class='far fa-smile-wink'></i>
          </span>
          <h4>
            <strong>What is in your Fridge?</strong>
          </h4>
          <!--<p class="text-faded mb-0">Freshly redesigned for Bootstrap 4.</p>-->
        </div>
        <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class="fas fa-cocktail"></i>
          </span>
          <h4>
            <strong>Wines</strong>
          </h4>
          <!--<p class="text-faded mb-0">Millions of users
            <i class="fas fa-heart"></i>
            Start Bootstrap!</p>-->
        </div>
        <div class="col-lg-3 col-md-6">
          <span class="service-icon rounded-circle mx-auto mb-3">
            <i class='fas fa-at'></i>
          </span>
          <h4>
            <strong>Email</strong>
          </h4>
          <!--<p class="text-faded mb-0">I mustache you a question...</p>-->
        </div>       
      </div>
    </div>
  </section>

  <!-- Callout -->
  <section class="callout">
    <div class="container text-center">
      <h2 class="mx-auto mb-5">Eat Good<br>
        <em>and</em>
        Feel Good</h2>
    
    </div>
  </section>

   <!-- Portfolio -->
  <section class="content-section" id="portfolio">
    <div class="container">
      <div class="content-section-heading text-center">
        <h3 class="text-secondary mb-0">Features</h3>
        <h2 class="mb-5">services</h2>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6">
          <a class="portfolio-item" href="calories.php">
            <span class="caption">
              <span class="caption-content">
                <h2>Daily Calories</h2>
                <p class="mb-0">Find multiple recipes that reach your daily caloric needs.</p>
              </span>
            </span>
            <img class="img-fluid" src="img/calories.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item" href="ingredients.php">
            <span class="caption">
              <span class="caption-content">
                <h2>Ingredients</h2>
                <p class="mb-0">Find recipes that use as many as the given ingredients.</p>
              </span>
            </span>
            <img class="img-fluid" src="img/ingredients.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item" href="convert.php">
            <span class="caption">
              <span class="caption-content">
                <h2>Convert Amounts</h2>
                <p class="mb-0">Convert amounts like "2 cups of flour to grams"</p>
              </span>
            </span>
            <img class="img-fluid" src="img/convert.jpg" alt="">
          </a>
        </div>
        <div class="col-lg-6">
          <a class="portfolio-item" href="video.php">
            <span class="caption">
              <span class="caption-content">
                <h2>Food videos</h2>
                <p class="mb-0">Find recipes and other related videos</p>
              </span>
            </span>
            <img class="img-fluid" src="img/video.jpg" alt="">
          </a>
        </div>
          <div class="col-lg-6">
          <a class="portfolio-item" href="macro.php">
            <span class="caption">
              <span class="caption-content">
                <h2>Macro Nutrients</h2>
                <p class="mb-0">Find recipes that adhere to the given nutrients limits</p>
              </span>
            </span>
            <img class="img-fluid" src="img/macro.jpg" alt="">
          </a>
        </div>
          <div class="col-lg-6">
          <a class="portfolio-item" href="sub.php">
            <span class="caption">
              <span class="caption-content">
                <h2>Ingredients Subtitutes</h2>
                <p class="mb-0">Get ingredient substitute by ingredient name</p>
              </span>
            </span>
            <img class="img-fluid" src="img/sub.jpg" alt="">
          </a>
        </div>
         <div class="col-lg-6">
          <a class="portfolio-item" href="auto_menu.php">
            <span class="caption">
              <span class="caption-content">
                <h2>Autocomplete Menu Search</h2>
                <p class="mb-0">Generate suggestions for menu items based on a partial query</p>
              </span>
            </span>
            <img class="img-fluid" src="img/autocomplete_menu.jpg" alt="">
          </a>
        </div>
         <div class="col-lg-6">
          <a class="portfolio-item" href="random.php">
            <span class="caption">
              <span class="caption-content">
                <h2>Random Recipes</h2>
                <p class="mb-0">Find random (popular) recipes</p>
              </span>
            </span>
            <img class="img-fluid" src="img/random.jpg" alt="">
          </a>
        </div>
      </div>
    </div>
  </section>


  <!-- Call to Action -->
  <section class="content-section bg-primary text-white">
    <div class="container text-center">
      <h2 class="mb-4">Never skip a meal...</h2>
  
    </div>
  </section>

  <!-- Map -->
  <section id="contact" class="map">
    <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A&amp;output=embed"></iframe>
    <br />
    <small>
      <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=twitter&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=Twitter,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
    </small>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <ul class="list-inline mb-5">
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-facebook"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white mr-3" href="#">
            <i class="icon-social-twitter"></i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="social-link rounded-circle text-white" href="#">
            <i class="icon-social-github"></i>
          </a>
        </li>
      </ul>
      <p class="text-muted small mb-0">Copyright &copy; iHungry 2019</p>
    </div>
  </footer>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/stylish-portfolio.min.js"></script>

</body>

</html>
