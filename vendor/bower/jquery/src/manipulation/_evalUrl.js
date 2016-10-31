<<<<<<< HEAD
define([
	"../ajax"
], function( jQuery ) {

jQuery._evalUrl = function( url ) {
	return jQuery.ajax({
		url: url,
		type: "GET",
		dataType: "script",
		async: false,
		global: false,
		"throws": true
	});
};

return jQuery._evalUrl;

});
=======
define( [
	"../ajax"
], function( jQuery ) {

jQuery._evalUrl = function( url ) {
	return jQuery.ajax( {
		url: url,

		// Make this explicit, since user can override this through ajaxSetup (#11264)
		type: "GET",
		dataType: "script",
		async: false,
		global: false,
		"throws": true
	} );
};

return jQuery._evalUrl;

} );
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
