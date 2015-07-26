
		<center>
		<div id="howwork_container">
				<div id="howwork_header">
					<h1 id="first_heading">Our Platform</h1>
					<hr>
					<p>We created a platform for free online learning and management of students and courses offered by our helping professors</p>
					<hr>
					<h1 style="margin-top: 100px; margin-bottom: 100px;">How it Works</h1>
					<hr>
					<p>You visit our site and start browsing our courses to see what would you like to learn and enroll on you chosen courses</p>
				</div>
		</div>
		</center>
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