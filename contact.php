<?php
/**
 * contact.php is a postback application designed to provide a 
 * contact form for users to email our clients.  contact.php references 
 * recaptchalib.php as an include file which provides all the web service plumbing 
 * to connect and serve up the CAPTCHA image and verify we have a human entering data.
 *
 * See document in package for installation instructions.
 *
 * @package nmCAPTCHA
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.0 2013/01/28
 * @link http://www.newmanix.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see contact_include.php 
 * @see recaptchalib.php
 * @see util.js 
 * @todo none
 */

# For each customer/domain, get a key from http://www.google.com/recaptcha/whyrecaptcha (DON'T LET A CUSTOMER USE YOUR KEY) 
# edison ONLY reCAPTCHA keys are below:
$publickey = "6Lf8FMkSAAAAAIR0DTQO4f0zjP-hlyBVcVTjRNB-";
$privatekey = "6Lf8FMkSAAAAAKsfveeLDuVJBWTNOm8PvRqL9lNm";

# zephir ONLY reCAPTCHA keys are below:
//$publickey = "6Ld11wYAAAAAAMqyo-I6NvENfuD3VJOXRBLG_8cE";
//$privatekey = "6Ld11wYAAAAAAEbf282RKWoikILiUBE7U1QJzfmO";

#EDIT THE FOLLOWING:
$toAddress = "etacke01@seattlecentral.edu";  //place your/your client's email address here - EDISON/ZEPHIR WILL ONLY EMAIL seattlecentral.edu ADDRESSES!
$toName = "Crystal"; //place your client's name here
$website = "Crystal Massage";  //place NAME of your client's website here
$sendEmail = TRUE; //if true, will send an email, otherwise just show user data.
//$header = 'header.php'; #UNCOMMENT & PLACE REFERENCE TO YOUR HEADER FILE HERE
//$footer = 'footer.php'; #UNCOMMENT & PLACE REFERENCE TO YOUR FOOTER FILE HERE
#--------------END CONFIG AREA ------------------------#
$resp = ""; # the response from reCAPTCHA
$error = ""; # the error code from reCAPTCHA, if any
$skipFields = "recaptcha_challenge_field,recaptcha_response_field,Email"; #comma separated list of form elements NOT to store.
$fromDomain = $_SERVER["SERVER_NAME"];
$fromAddress = "noreply@" . $fromDomain; //form always submits from domain where form resides
if(isset($header)){ include $header;}#include header file if provided
include 'include/recaptchalib.php'; #required reCAPTCHA class code
include 'include/contact_include.php'; #complex unsightly code moved here

?>
<script type="text/javascript" src="include/util.js"></script>

<!-- Edit Required Form Elements via JavaScript Here -->
<script type="text/javascript">
	//here we make sure the user has entered valid data	
	function checkForm(thisForm)
	{//check form data for valid info
		if(empty(thisForm.Name,"Please Enter Your Name")){return false;}
		if(!isEmail(thisForm.Email,"Please enter a valid Email Address")){return false;}
		return true;//if all is passed, submit!
	}
	
	//var RecaptchaOptions = { theme : "blackglass"}; //reCAPTCHA color themes: https://developers.google.com/recaptcha/docs/customization
</script>

<!-- CSS class for required field elements.  Move to your CSS? (or not) -->
<style type="text/css">
	.required {font-style:italic;color:#FF0000;font-weight:bold;}
	.contact-feedback {}
	.contact-table{}
</style>

<form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return checkForm(this);">
<?php
if (isset($_POST["recaptcha_response_field"]))
{# Check for reCAPTCHA response
    $resp = recaptcha_check_answer ($privatekey,$_SERVER["REMOTE_ADDR"],$_POST["recaptcha_challenge_field"],$_POST["recaptcha_response_field"]);
	if ($resp->is_valid)
	{#reCAPTCHA agrees data is valid (PROCESS FORM & SEND EMAIL)
         handle_POST($skipFields,$sendEmail,$toName,$fromAddress,$toAddress,$website,$fromDomain);#process form elements, format and send email.
        
         #Here we can enter the data sent into a database in a later version of this file
?>
        <!-- format HTML here to be your 'thank you' message -->
		<div class="contact-feedback">
			<h2>Thank you!</h2>
	        <p>Your comment will be reviewed and if we have any questions we will email you within 48 hours.</p>
	    </div>    
            
<?php
    }else{#reCATPCHA response says data not valid - prepare for feedback
            $error = $resp->error;
            send_POSTtoJS($skipFields); #function for sending POST data to JS array to reload form elements
    }
}

#show form, either for first time, or if data not valid per reCAPTCHA    
if(!isset($_POST["recaptcha_response_field"])|| $error != "")
{#separate code block to deal with returning failed data, or no data sent yet	
	?>
	<!-- below change the HTML to accommodate your form elements - only 'Name' & 'Email' are significant -->

	<table class="contact-table">
		<tr><!-- the form elements 'Name' and 'Email' are sigificant to the app, any others can be added/deleted -->
			<td>
				Name:<br />
				<input type="text" name="Name" required="true" placeholder="Name" title="Name is required" />
			</td>
		</tr>
		<tr>
			<td>
				Email:<br />
				<input type="email" name="Email" required="true" placeholder="Email" title="A valid email is required" />
			</td>
		</tr>
		<tr>
			<td>
				Comments:<br />
				<textarea name="Comments" cols="30" rows="4" wrap="virtual" placeholder="Your comments are important to us!"></textarea>
			</td>
		</tr>
		<tr><!-- reCAPTCHA icon appears here: -->
			<td><?php echo recaptcha_get_html($publickey, $error); ?></td>
		</tr>
		<tr>
			<td><input type="submit" value="submit" /></td>
		</tr>
    </table>
    </form>
<?php
}
if(isset($footer)){ include $footer;}#include footer file if provided
?>