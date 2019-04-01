<?php  if (count($errors) > 0) : ?>
  <div class="error">
  	<?php foreach ($errors as $error) : ?>
  	<?php 
  	$ip = $_SERVER["REMOTE_ADDR"];
    	$date=date("Y-m-d H:i:s");
  	$myfile = fopen("logErrors.txt","a");
    	fwrite($myfile,$error."   ".$ip."   ".$date."\n");
    	fclose($myfile); ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
