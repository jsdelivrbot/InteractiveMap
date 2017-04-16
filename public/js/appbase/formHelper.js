$.fn.form = function(){
	// console.log(this,"something");
	var
	    $allModules      = $(this), //selector object
	    moduleSelector   = $allModules.selector || '', //selector dom name or class or something

	    time             = new Date().getTime(),
	    performance      = [],

	    query            = arguments[0], //first string
	    legacyParameters = arguments[1], //second-end string
	    methodInvoked    = (typeof query == 'string'),
	    queryArguments   = [].slice.call(arguments, 1),
	    returnedValue
	  ;

	// console.log($allModules,moduleSelector,time,performance,query,legacyParameters,methodInvoked,queryArguments,returnedValue)

	this.validate =function(){

	}

	// this.get = function(id){

	// }

	// this.set = function(id,string){

	// }

	// this.getAll = function(){

	// }

	// this.set
}

