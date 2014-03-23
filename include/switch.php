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
  $myTitle  = "Meet the Masseuse";
  break; 
  
  case "techniques.php":
  $myTitle  = "Techniques";
  break;
  
  case "patient411.php":
  $myTitle  = "Patient Information";
  break;
  
  case "testimonials.php":
  $myTitle  = "Testimonials";
  break;        

  //fallback values for undefined pages
  default:
  $myTitle = THIS_PAGE; #the file name is unique  
  $myPageID = "Massage Therapy";
}
//--------------END CONFIG AREA --------------------------------
/*
makeLinks function will create our dynamic nav when called.
Call like this:
echo makeLinks($nav1); #in which $nav1 is an associative array of links
*/
function makeLinks($linkArray)
{
    $myReturn = '';

    foreach($linkArray as $url => $text)
    {
        if($url == THIS_PAGE)
        {//current page - add class reference
	    	$myReturn .= '<li class="current"><a href="' . $url . '">' . $text . '</a></li>' . PHP_EOL;
    	}else{
	    	$myReturn .= '<li><a href="' . $url . '">' . $text . '</a></li>'  . PHP_EOL;
    	}    
    }
      
    return $myReturn;    
}


#uncomment to test:

/*echo 'THIS_PAGE is: ' . THIS_PAGE . '<br />';
echo '$myTitle is: ' . $myTitle . '<br />';
echo '$myPageID is: ' . $myPageID . '<br />';
echo '$myPic is: ' . $myPic . '<br />';
echo 'Nav:<br />';*/
//echo makeLinks($nav1);
//die;


/*

saved below as the original HTML for the nav:

<nav class="main clearfix">
		<ul class="clearfix">
		<li class="current"><a href="index.php">Home</a></li>
		<li><a href="meet.php">Meet the Masseuse</a></li>
		<li><a href="techsandspecs.php">Techniques </a></li>
		<li><a href="patient411.php  ">Patient Information</a></li>
		<li><a href="testimonials.php">Testimonials</a></li>
		<li><a href="#contact">Contact</a></li>
		</ul>
		<a href="#" id="pull">Menu</a>
</nav>


*/


?>