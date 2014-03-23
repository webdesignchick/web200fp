<?php include 'include/top.php';?>

<article class="patprocess">

<h4> Please review the information and submit to the office below.</h4>
<form>
<?php
	
	foreach($_POST as $item => $val)
	{
		echo '<p>'.nl2br(strtoupper($item).": ". $val).'</p>';
		
	}

?>
<h4>If everything is correct please submit.</h4>
<h4><a href="patient411.php">If you found errors click here to return to the previous page. </a></h4>
<br>
<input type="submit" value="Submit">


</form>

</article>
<footer>
		<small>
			 © 2013-2014 All Rights Reserved <a href="http://edison.seattlecentral.edu/~etacke01/web120/index.html">E.Tackett </a>|
			<a href="http://validator.w3.org/check/referer" target="_blank"> Valid HTML</a> |
			<a href="http://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank"> Valid CSS</a>
			</small>
</footer>
<script src="include/jquery.js"></script>
<script src="include/text-effect.js"></script>
<script type="text/javascript" src=”previewForm / previewForm.js"></script>

</body>
</html>