 

<?php include 'include/top.php';?>

<article class="pat411">

<h3>Patient Information Form</h3>

    <form action="process.php" method="post">

<h6>Personal Information:</h6>

<section>

    <label>Name:</label>
	<div class="form-group">
    	<input type="text" name="firstname" required class="form-control" placeholder="First Name">
    </div>
    
    <div class="form-group">
        <input type="text" name="middlename" class="form-control" placeholder="Middle Name">
    </div>
    
    <div class="form-group">
    	<input type="text" name="lastname" required class="form-control" placeholder="Last Name">
	</div>
    
    <div class="form-group">
    	<input type="text" name="nickname" class="form-control" placeholder="Nick Name">
	</div>
    
    
    <label>Date of Birth:</label>
    <div class="form-group">
    	<input type="text" name="dob" class="form-control" placeholder="mm/dd/yyyy">
    </div>
     <div class="form-gourp">
    	<label> Sex:</label>
    	<input type="radio" name="sex" value="male">Male
    	<input type="radio" name="sex" value="female">Female
     </div>
   
    <div class="form-group">
    <label> Address: </label><br>
    <div class="form-group">
    	<input type="text" name="streetaddress" required class="form-control" placeholder="Street Address">
    </div>
    
    <div class="form-group">
        <input type="text" name="citystatezip" class="form-control" placeholder="City, State Zip">
    </div>
    
    <div class="form-group">
    <label>Contact:</label><br>
	</div>
    
    <div class="form-group">
    <input type="text" name="homephone"   class="form-control" placeholder="206-555-4321">
	</div>
    
    <div class="form-group">
    <input type="text" name="mobilephone" class="form-control" placeholder="206-555-1234">
	</div>

    <div class="form-group">
     <input type="text" name="email" class="form-control" placeholder="email@email.com">
	</div>

    <div class="form-group">
    <label> Preferred Contact Method:</label>
    <input type="radio" name="preferredcontactmethod" value="home">Home
    <input type="radio" name="preferredcontactmethod" value="mobile">Mobile
    <input type="radio" name="preferredcontactmethod" value="email">Email<br>
    </div>

    <div class="form-group">
    <label> Marital Status:</label>
    <input type="radio" name="maritalstatus" value="single">Single
    <input type="radio" name="maritalstatus" value="married">Married/Living with Partner
    <input type="radio" name="maritalstatus" value="single">Divorced
    <input type="radio" name="maritalstatus" value="widowed">Widowed
    </div>
    
    <div class="form-group">
    <label> Family:</label><br>
	<input type="text" name="spousename" class="form-control" placeholder="Spouse Name">
  	</div>
    
    <div class="form-group">
	Children(s) Name and Ages
    <textarea rows="4" cols="30" name="childrennames" class="form-control" > </textarea>
    </div>
    
    <div class="form-group">
    <label> Emergency Contact:</label><br>
	
    Name <input type="text" name="ecname"  class="form-control" placeholder="Emergency Contact Name" required> 
	</div>
    
    <div class="form-group">
    Number <input type="text" name="ecnumber" class="form-control" placeholder="Emergency Contact Number" required> 
	</div>

</section>

<section>
    
    <h6>Current Health Information:</h6>
    
    <label>Current Symptoms </label><br>
	
    <div class="form-group">
    <textarea rows="4" cols="60" name="currentsymptoms" class="form-control" > </textarea><br>
    Date Symptoms Began <input type="text" name="symptomdate" class="form-control" placeholder="mm/dd/yyyy"> 
    </div>
    <div class="form-group">
    Have you had a massage before?
    </div>
    <div class="form-group">
    <input type="radio" name="otherpractitioner" value="yes">Yes
    <input type="radio" name="otherpractitioner" value="no">No
    </div>
    
    <div class="form-group">
     <label> Additional	Notes</label><br>
    <textarea rows="4" cols="60" name="additionalnotes" class="form-control" > </textarea><br>
	</div>
</section>

<section>
<label>Allergies  <small>Please list any allergies past or present.</small></label>
     <textarea rows="4" cols="60" class="form-control" > </textarea>
</section>
<section>
	<input type="submit" value="Submit">
</section>

</form>
</article>



<?php include 'include/bottom.php';?>