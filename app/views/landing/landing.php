		<div id="header_container">
			<div id="header">
				<h1>Start Learning Now,<br></h1>
				<h2>Online, for free!</h2>
				<h3>
					Join <?php echo $data['num_students']; ?> Students<br>
					Learn from <?php echo $data['num_courses']; ?> courses created by over <?php echo $data['num_teachers']; ?> professors<br>
					<a href="#"><span style="color: yellow">Get started now >></span></a>
				</h3>
			</div>
		</div>
		<div id="join_cards_container">
		<center>
			<h2 id="card_head">Be one of the <?php echo $data['num_students']; ?> learners on E-LEARING</h2>
			<div id="join_c">
				<div class="card" id="card1">
					<img src="app/templates/landing/images/profile1.png" style="height: 90px;">
					<div class="perc_back spacing"><div class="perc1"><h6>Web Design | 90%</h6></div></div>
					<div class="perc_back"><div class="perc2"><h6>Web Development | 60%</h6></div></div>
					<div class="perc_back"><div class="perc3"><h6>Prezentare | 80%</h6></div></div>
					<div class="perc_back"><div class="perc4"><h6>Liceu | 75%</h6></div></div>
				</div>
				<div class="card" id="card2">
					<img src="app/templates/landing/images/profile1.png" style="height: 90px;">
					<div class="perc_back spacing"><div class="perc1"><h6>Web Design | 90%</h6></div></div>
					<div class="perc_back"><div class="perc2"><h6>Web Development | 60%</h6></div></div>
					<div class="perc_back"><div class="perc3"><h6>Prezentare | 80%</h6></div></div>
					<div class="perc_back"><div class="perc4"><h6>Liceu | 75%</h6></div></div>
				</div>
				<div class="card" id="card3">
					<img src="app/templates/landing/images/profile1.png" style="height: 90px;">
					<div class="perc_back spacing"><div class="perc1"><h6>Web Design | 90%</h6></div></div>
					<div class="perc_back"><div class="perc2"><h6>Web Development | 60%</h6></div></div>
					<div class="perc_back"><div class="perc3"><h6>Prezentare | 80%</h6></div></div>
					<div class="perc_back"><div class="perc4"><h6>Liceu | 75%</h6></div></div>
				</div>
			</div>
		</center>
		</div>
		<div id="featured_courses_container">
			<div id="featured_courses">
				<center>
					<p id="featured_heading">Featured Courses</p>
					<div class="featured_collumn" >
						<div id="featured1" class="featured">
							
						</div>
						<a href="#"><p class="courseName">Course Name</p></a>
						<p class="courseAuthor">Course Author</p>
					</div>
					<div class="featured_collumn" >
						<div id="featured2" class="featured">
							
						</div>						
						<a href="#"><p class="courseName">Course Name</p></a>
						<p class="courseAuthor">Course Author</p>
					</div>
					<div class="featured_collumn" >
						<div id="featured3" class="featured">
							
						</div>
						<a href="#"><p class="courseName">Course Name</p></a>
						<p class="courseAuthor">Course Author</p>
					</div>
					<div class="featured_collumn" >
						<div id="featured4" class="featured">
							
						</div>
						<a href="#"><p class="courseName">Course Name</p></a>
						<p class="courseAuthor">Course Author</p>
					</div>
				</center>
			</div>
			<div id="featured_courses2">
				<center>
					<div class="featured_collumn">
						<div id="featured5" class="featured">
							
						</div>
						<a href="#"><p class="courseName">Course Name</p></a>
						<p class="courseAuthor">Course Author</p>
					</div>
					<div class="featured_collumn" >
						<div id="featured6" class="featured">
							
						</div>						
						<a href="#"><p class="courseName">Course Name</p></a>
						<p class="courseAuthor">Course Author</p>
					</div>
					<div class="featured_collumn" >
						<div id="featured7" class="featured">
							
						</div>
						<a href="#"><p class="courseName">Course Name</p></a>
						<p class="courseAuthor">Course Author</p>
					</div>
					<div class="featured_collumn" >
						<div id="featured8" class="featured">
							
						</div>	
						<a href="#"><p class="courseName">Course Name</p></a>
						<p class="courseAuthor">Course Author</p>
					</div>
				</center>
			</div>
		</div>
		<center>
			<div id="view_courses" onclick="openS()">
				<< Get Started >>
			</div>
		</center>
		<hr style="width: 86%; margin-top: 20px;">
		<div id="footer_container">
			<div id="footer">
				<center>
						<div id="footer_descr" class="footer_col">
							<h4>E-LEARNING</h4>
							<p style="font-size: 0.8em">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua.</p>
							<p style="font-size: 1em">&copy;Copyright 2015 E-LEARNING Inc. All rights reserved</p>
						</div>
						<div class="footer_col" id="footer_social">
							<h5>Social Networks</h5>
							<div style="color: rgba(0, 50, 255, 1);">FaceBook</div>
							<div style="color: red;">Pinterest</div>
							<div style="color: rgba(0, 137, 255, 1);">Twitter</div>
						</div>
						<div class="footer_col" id="footer_contact">
							<h5>CONTACT</h5>
							<div>Phone: 0736354481</div>
							<div>E-mail: carmocanueduard@gmail.com</div>
							<div>Adress: Ale. Crizantemelor Nr 6</div>
						</div>
				</center>
			</div>
		</div>
		<script>
		var sl = document.getElementById("sl");
var l = document.getElementById("sl_login");
var s = document.getElementById("sl_signup");
var slClass = document.getElementsByClassName("s_l");
var arrow = document.getElementsByClassName("arrown_down");

<?php
	if (isset($data['script']))
		echo 'window.onload = ' . $data['script'] . ';';
?>

function close_sl(){
	sl.style.display = "none";
};

function openL(){
	sl.style.display = "block";
	s.style.display = "none";
	l.style.display = "block";
	slClass[0].classList.add("slOn");
	slClass[1].classList.remove("slOn");
	arrow[0].style.opacity = 1;
	arrow[1].style.opacity = 0;
};

function openS(){
	sl.style.display = "block";
	s.style.display = "block";
	l.style.display = "none";
	slClass[1].classList.add("slOn");
	slClass[0].classList.remove("slOn");
	arrow[1].style.opacity = 1;
	arrow[0].style.opacity = 0;
};

function showL(){
	s.style.display = "none";
	l.style.display = "block";
	slClass[0].classList.add("slOn");
	slClass[1].classList.remove("slOn");
	arrow[0].style.opacity = 1;
	arrow[1].style.opacity = 0;
};

function showS(){
	s.style.display = "block";
	l.style.display = "none";
	slClass[1].classList.add("slOn");
	slClass[0].classList.remove("slOn");
	arrow[1].style.opacity = 1;
	arrow[0].style.opacity = 0;
};
</script>

	</body>
</html>