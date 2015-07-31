//Sidebar functionality
	var sidebar = document.getElementById("sidebar-wrapper");		
	function toggleSidebar(){		
		var sidebar = document.getElementById("sidebar-wrapper");
			sidebar.style.display = "block";


		function display(){
			sidebar.style.opacity = 1;
		};
		setTimeout(display, 0);
	};

	function closeSidebar(){	
		sidebar.style.opacity = 0;


		function display(){
			sidebar.style.display = "none";
		};
		setTimeout(display, 200);
	};