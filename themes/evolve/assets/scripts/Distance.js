var Rk = 6373; // mean radius of the earth (km) at 39 degrees from the equator
var numberOfLaw = 5; // initial value for sample result

/* Return the distance from current location 
 * to targeted point of latitude, longitude
 * calculation is this 
 * ----------------------------
 * dlon = lon2 - lon1 
 * dlat = lat2 - lat1 
 * a = (sin(dlat/2))^2 + cos(lat1) * cos(lat2) * (sin(dlon/2))^2 
 * c = 2 * atan2( sqrt(a), sqrt(1-a) ) 
 * d = R * c (where R is the radius of the Earth)
*/
function distance(target_lon, target_lat) {
	var dlon = deg2rad(current_lon - target_lon);
	var dlat = deg2rad(current_lat - target_lat);
	var calA = Math.pow(Math.sin(dlat/2),2) + Math.cos(deg2rad(current_lat)) * 
				Math.cos(deg2rad(target_lat)) * Math.pow(Math.sin(dlon/2),2);
	// great circle distance in radian
	var calB = 2 * Math.atan2(Math.sqrt(calA),Math.sqrt(1-calA)); 
	var calC = Rk * calB;
	return Math.round( calC * 1000) / 1000;
}

// convert degrees to radians
function deg2rad(deg) {
	rad = deg * Math.PI / 180; // radians = degrees * pi/180
	return rad;
}

// Replace latitude, longitude values to distance by it's ID
function replace_value($id){ 
   var cell = document.getElementById($id);
   var two_different = cell.innerHTML.split(" ");
   var dist = distance(two_different[two_different.length-1], two_different[0]);   
   cell.innerHTML = dist + " km";
} 

// Convert every table's item to distance
function runEveryThing() {
	for (var a = 1; a <= numberOfLaw;a++) {
		replace_value("val" + a);
	}
}

// To change number of line on table
function numberOfLawChange(NumLaw) {
	numberOfLaw = NumLaw;
}

 function SortOption(values) {
	 var urls = "https://" + window.location.hostname + window.location.pathname;
	 //var urls = "http://" + window.location.hostname + ":" + window.location.port + window.location.pathname;
	 var param = window.location.href.replace(urls ,"");
	 var paramPass = ParamSortOutput(param, "ASCDESC");
	 paramPass = paramPass.replace("CrData=y",""); // when Sort by name is triggered, sort distance will be gone.
	 urls += "?" + paramPass;
	 if(values == 0) {
		 window.location.href= urls;
	 } else if(values == 1) {
		 window.location.href= urls + "ASCDESC=ASC";
	 } else {
		 window.location.href= urls + "ASCDESC=DESC";
	 }
 }
 
function NumItemOption(values) {
	var urls = "https://" + window.location.hostname + window.location.pathname;
	//var urls = "http://" + window.location.hostname + ":" + window.location.port + window.location.pathname;
	var param = window.location.href.replace(urls ,"");
	var paramPass = ParamSortOutput(param, "NumItem");
	urls += "?" + paramPass;
	if(values == 1) {
		 window.location.href= urls + "NumItem=6";
	 } else {
		 window.location.href= urls + "NumItem=12";
	 }
}

function ParamSortOutput (paramurl, ownValue) {
	var outputString = "";
	var params = paramurl.substring(1);
	var eachParams = params.split("&");
	for(var i = 0; i < eachParams.length; i++) {
		var pair = eachParams[i].split("=");
		if(pair[0] != ownValue && pair[0] != "page") {
			outputString += eachParams[i];
			if(outputString != "") { outputString += "&"; }
		}
	}
	return outputString;
}