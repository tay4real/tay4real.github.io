<?php


function log_action($action, $message="") 
{
  $logfile = 'log.txt';
  $new = file_exists($logfile) ? false : true;
  
  if($handle = fopen($logfile, 'a')) 
  { // append
    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
		$content = "{$timestamp} | {$action}: {$message}\n\r";
    fwrite($handle, $content);
    fclose($handle);
	
    if($new) 
  	{ 
  	  chmod($logfile, 0755); 
  	}
  } 
  else 
  {
    echo "Could not open log file for writing.";
  }
}



?>