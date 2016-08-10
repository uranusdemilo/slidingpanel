app.directive("bikeDirective", function() {
	var linkFunction = function(scope, element, attributes) {
    scope.bikeIndex = attributes["bikeDirective"];
  };
    return {
		restrict:'EA',
        template: "<div>" +
		"<div>{{bikes[$index].bikenum}}</div>" +
		"<div>{{bikes[$index].biketitle}}</div>" +
		"<div>{{bikes[$index].bikeprice}}</div>" +
		"<img ng-src=\"admin/icons/editbutton.jpg\" id=\"{{ 'clickEdit' + indexNumber }}\"> " +
		"<img ng-src='admin/icons/nukebutton.jpg' id=\"{{ 'clickHide' + indexNumber }}\">" +
		"</div>" +
		"<div id=\"{{'panel' + indexNumber}}\" class=\"slider\">" +
		"<table>" +
			"<tr><td>Make: </td><td><input type='text' width = '30' value='{{ bikes[$index].biketitle }}'></input></td></tr>" +
         "<tr><td>Model: </td><td><input type='text' width = '30' value='{{ bikes[$index].biketype }}'></input></td></tr>" +
         "<tr><td>Price: $</td><td><input type='text' width = '30' value='{{ bikes[$index].bikeprice }}'></td></tr></input>" +	
      "</table>" +
		"<button type='button' id=\"{{'submitEdit' + indexNumber }}\">Submit Edit</button>" +
      "<button type='button' id=\"{{'cancelButton' + indexNumber }}\">Cancel</button>" +
		"</div><br>",
      link: linkFunction
    };
}); 
