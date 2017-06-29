<?php
	session_start();

	$flag =1;

	if(isset($_SESSION['user_id'])){
		$flag = 0;
	}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>About</title>

    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/animate.css" rel="stylesheet">
  
    </head>
   <body>
    <div class="container-fluid">
			
			<?php require 'navigation-links.php' ?>

			<div class="row about-us-content">
				<div class="col-md-12"><h1 class="text-align-left text-color-555">About us</h1></div>
            </div>


			<div class="">
					<p class="fs-16">
						The Agenda 21 adopted in United Nations Conference on Environment and Development (UNCED) in 1992 emphasises the need to adopt the concept of Integrated Coastal Zone Management (ICZM) for sustainable utilisation of coastal and marine resources and prevention of degradation of marine environment. This can best be achieved through integration of activities prevalent in the land, coastal and marine areas.
					</p>

					<p class="fs-16">
					The Ministry of Earth Sciences (erstwhile Department of Ocean Development) which is responsible for preservation and conservation of marine environment in India established the ICMAM Project Directorate on 2nd January 1998 at Chennai (Madras) with the objective of <br>
					(i)Developing capacity towards accomplishing the coastal and ocean related objectives of UNCED <br> 
					(ii) To carry out R&amp;D on application of scientific tools and techniques that are helpful in the development of integrated management solutions to address the issues and problems prevalent in the coastal marine areas. The Capacity Building activities in 4 major areas related to Integrated Coastal and Marine Area Management (ICMAM), funded by the International Development Association (World Bank) initiated in Sep.1997 was completed in June 2003.
					The ministry with its own funding developed infrastructure during this period for long-term R&amp;D and Training. At present the Project Directorate is engaged in a number of coastal zone R&amp;D activities involving several National and State institutions in the country.
					</p>
			</div>
	

			<div class="map">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6824.715392924495!2d80.19897268852446!3d12.952155444473133!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a525db599c659bb%3A0x3836c80555797310!2sICMAM!5e0!3m2!1sen!2sin!4v1490212238191" class="map-dimension" frameborder="0" style="border:0" allowfullscreen></iframe>
		    </div>
	
			<!-- <div class="row margin-top-20px branch-div">
					<div class="col-sm-4 thumbnail custom-about-thumbnail adjustment zeropadding" style="margin: auto;">
						
						<div class="Branch-name">
							<p>Head Branch</p>
						</div>
						
						<div class="col-sm-6 text-color-555">
							<h4> Contact </h4>
							<p> Tel: +91 44 66783599<br>
							Fax: +91 44 66783487<br>
							Email: icmam@icmam.gov.in</p>
						</div>
						
						<div class=" col-sm-6 text-color-555">
							<h4> Address </h4>
							<p>2nd Floor, NIOT Campus,<br>
						   		Velacherry-Tambaram<br> 
						   		Main Road, Pallikkaranai, <br>Chennai - 600100, India </p>
				        </div>
			  		</div>
			</div> -->

			<div class="row margin-top-20px branch-div col-md-12" id="last-div" style="opacity: 0">
					<div class="col-md-6 zeropadding animated" id="left-div">
						<div class="thumbnail custom-about-thumbnail">
							<div class="Branch-name">
								<p>Head Branch</p>
							</div>
							
							<div class="col-sm-6 text-color-555">
								<h4> Contact </h4>
								<p> Tel: +91 44 66783599<br>
								Fax: +91 44 66783487<br>
								Email: icmam@icmam.gov.in</p>
							</div>
							
							<div class=" col-sm-6 text-color-555">
								<h4> Address </h4>
								<p>2nd Floor, NIOT Campus,<br>
							   		Velacherry-Tambaram<br> 
							   		Main Road, Pallikkaranai, <br>Chennai - 600100, India </p>
					        </div>
					    </div>
			  		</div>


			  		 <div class="col-md-6 thumbnail login-thumbnail about-us-form animated" id="right-div">
	  					<div class="">
					      	<div class="bottom-top"> 
					  			<h2 class="text-color-555 text-align-center fs-22">Contact Us</h2>
					  		</div>
					  	
		  					<form method="POST" action="Functions/Query.php" autocomplete="off">
								
									<div class="form-group has-feedback has-feedback-left foot">
										<input type="text" class="form-control custom-input" placeholder="Name" name="name">
										
									</div>

									<div class="form-group has-feedback has-feedback-left margin-bottom-20 foot">
										<input type="email" class="form-control custom-input" placeholder="Email id" name="email">
									
									</div>

									<div class="form-group margin-bottom-20">
										<textarea placeholder="Message" class="form-control textarea-box" rows="5" width="30" name="message"></textarea>
									</div>


									<div class="form-group foot">
										<button type="submit" class="btn login-submit-btn btn-block" name="submit" style="color: #fff;">Submit</button>
										
									</div>
									
							</form>							
			
					</div>
			</div>





    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>

    <script type="text/javascript">
    	$(document).scroll(function () {
		var y = $(this).scrollTop();
		var x = $("#last-div").position();
		

		if (y > (x.top-550)) { 
			$('#last-div').css('opacity','1');
		    $("#left-div").addClass(
		        "fadeInLeft");
			$("#right-div").addClass(
		        "fadeInRight");
		}
		
});
    </script>

    </body>
</html>