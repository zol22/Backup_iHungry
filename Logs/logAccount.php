<?php  if (count($logs) > 0) : ?>
  <div class="log">
  	<?php foreach ($logs as $log) : ?>
  	<?php 
  	$ip2 = $_SERVER["REMOTE_ADDR"];
    $date2=date("Y-m-d H:i:s");
  	$myfile2 = fopen("logAccount.txt","a");
    fwrite($myfile2,$log."   ".$ip2."   ".$date2."\n");
    fclose($myfile2); ?>
   
  	<?php endforeach ?>
  </div>
<?php  endif ?>
