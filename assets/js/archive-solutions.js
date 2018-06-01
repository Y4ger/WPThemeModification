//float sidebar with navbar
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
//toggle style of selected categories
function toggle_selected (){
  jQuery(function($) {
      //get just the path
      var split = window.location.href.split('/');
      var check = split.pop() || split.pop();
			if ($.isNumeric(check)){
				check = split.pop();
				check = split.pop();
			}
			//if there are already multiple categories find/select them
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
//redirrect url to selected categories
function category_pathfinder(){
  jQuery(function($) {
    //listening to any clicks of the category list
    $('.category-selector').click(function(){
      var split = window.location.href.split('/');
      var check = split.pop() || split.pop();
			if ($.isNumeric(check)){
				var pageNumberCheck = 1;
				check = split.pop();
				check = split.pop();
				console.log(check);
			}
      var add = $(this).text().replace(/\s+/g, '-').toLowerCase();
      //if current and only is clicked just reload page
      if (check == add ){
        var url = window.location.href;
      }//deselect a category
      else if (~check.indexOf(add)){
        url = window.location.href.replace(add,'');
        if (~url.indexOf("+/")){
          url = url.replace("+/", '');
        }else if (~url.indexOf("++")){
          url = url.replace("++", '+');
        }else{
          url = url.replace("/+",'/');
        }
      }//append the new category onto the URL
      else {
				if (pageNumberCheck){
					var current = window.location.href.slice(0, -8);
				}
				else{
        	var current = window.location.href.slice(0,-1);
				}
				url = current.concat('+', add);
        document.getElementById(add).classList.toggle('selected');
      }
      //load new url
      window.location.href = url;
    });
  });
}
