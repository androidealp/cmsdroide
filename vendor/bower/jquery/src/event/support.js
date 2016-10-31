<<<<<<< HEAD
define([
	"../var/support"
], function( support ) {

support.focusinBubbles = "onfocusin" in window;

return support;

});
=======
define( [
	"../var/support"
], function( support ) {

support.focusin = "onfocusin" in window;

return support;

} );
>>>>>>> 2088f758f1e562a149fe831ca66f9ce355be4535
