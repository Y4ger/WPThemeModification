function float_sidebar(){
  // When the user scrolls the page, execute myFunction
	window.onscroll = function() {myFunction()};

	// Get the sidebar
	var sidebar = document.getElementById("secondary");
	var header = document.getElementById("navigation-top");
	// Get the offset position of the navbar
	var sticky = header.offsetTop;

	// Add the sticky class to the sidebar and remove bottom border of nav when you reach its scroll position. Remove "sticky" when you leave the scroll position
	function myFunction() {
		if (window.pageYOffset >= sticky) {
			sidebar.classList.add("sticky-sidebar");
			header.style.border = "0px black solid";
		} else {
			sidebar.classList.remove("sticky-sidebar");
			header.style.border = "1px solid #eee";
		}
	}
}
function toggle_selected (){
  jQuery(function($) {
      var split = window.location.href.split('/');
      var check = split.pop() || split.pop();
      if (~check.indexOf("+")){
        split = check.split('+');
        split.forEach(element => {
          document.getElementById(element).classList.toggle("selected");
        })
      }
      else {
        document.getElementById(check).classList.toggle("selected");
      }
  });
}
function category_pathfinder(){
  jQuery(function($) {
    $('.category-selector').click(function(){
      var split = window.location.href.split('/');
      var check = split.pop() || split.pop();
      var add = $(this).text().replace(/\s+/g, '-').toLowerCase();
      if (check == add ){
        var url = window.location.href;
      }else if (~check.indexOf(add)){
        url = window.location.href.replace(add,'');
        if (~url.indexOf("+/")){
          url = url.replace("+/", '');
        }else if (~url.indexOf("++")){
          url = url.replace("++", '');
        }else{
          url = url.replace("/+",'/');
        }
      }else {
        var current = window.location.href.slice(0,-1);
        url = current.concat('+', add);
        document.getElementById(add).classList.toggle('selected');
      }
      window.location.href = url;
    });
  });
}
