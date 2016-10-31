<<<<<<< HEAD
define([
	"../core"
], function( jQuery ) {

// Support: Android 2.3
// Workaround failure to string-cast null input
jQuery.parseJSON = function( data ) {
	return JSON.parse( data + "" );
};

return jQuery.parseJSON;

});
=======
define( [
	"../core"
], function( jQuery ) {

// Support: Android 2.3
// Workaround failure to string-cast null input
jQuery.parseJSON = function( data ) {
	return JSON.parse( data + "" );
};

return jQuery.parseJSON;

} );
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
