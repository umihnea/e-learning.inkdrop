	<?php $path = DIR . 'app/templates/teacher-dashboard/'; ?>
	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<p class="sidebar-header" style="font-size: 1.5em; color: white;">Dashboard&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span id="close-sidebar" onclick="closeSidebar()">&times;</span></p><br>
			<a href="#" style="text-decoration: none;"><li><img src="<?=$path?>images/activity.png">&nbsp;&nbsp;Overview</li></a>
			<a href="#" style="text-decoration: none;"><li><img src="<?=$path?>images/mail.png">&nbsp;&nbsp;Messages</li></a>
			<a href="#" style="text-decoration: none;"><li><img src="<?=$path?>images/asignment.png">&nbsp;&nbsp;Asignments</li></a>
			<a href="#" style="text-decoration: none;"><li><img src="<?=$path?>images/exam.png">&nbsp;&nbsp;Exams</li></a>
			<a href="#" style="text-decoration: none;"><li><img src="<?=$path?>images/group.png">&nbsp;&nbsp;Groups</li></a>
			<a href="#" style="text-decoration: none;"><li><img src="<?=$path?>images/calendar.png">&nbsp;&nbsp;Calendar</li></a>
			<hr>
		</ul>
	</div>
<script type="text/javascript" src="<?=$path?>js/sidebar.js"></script>