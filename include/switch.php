<?php

/*
switch.php - will allow us to swap html pieces dynamically
include this file at the top 'top.php'!
*/

//place URL & labels in array here for navigation:
$nav1['index.php'] = "Home";
$nav1['meet.php'] = "Meet the Masseuse";
$nav1['techsandspecs.php'] = "Techniques";
$nav1['patient411.php'] = "Patient Information";
$nav1['testimonials.php'] = "Testimonials";




//this line below identifies the current page
define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

/* below we can create 'case' statements to accommodate
 unique data items (title, a page id and an image) that will
reside in the 'top.php' file
*/
switch(THIS_PAGE)
{
  case "index.php":
  $myTitle = "Home!";
  break;
  
  case "meet.php":
  $myTitle  = "Meet the Doctor";
  break; 
  
  case "techspec.php":
  $myTitle  = "Techniques";
  break;
  
  case "patient411.php":
  $myTitle  = "Patient Information";
  break;

  case "patientintake.php":
  $myTitle  = "Patient Intake Form";
  break;
  
  
  case "informedconsent.php":
  $myTitle  = "Informed Consent";
  break;
  
    
  case "testimonials.php":
  $myTitle  = "Testimonials";
  break;        

  //fallback values for undefined pages
  default:
  $myTitle = THIS_PAGE; #the file name is unique  
  $myPageID = "Tillman Family Chiropractic";
}
//--------------END CONFIG AREA --------------------------------




?>