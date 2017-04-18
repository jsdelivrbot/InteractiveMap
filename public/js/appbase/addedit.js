/*
	Mainly uses leaflet.js and other functions.
*/

var appThis = function(){
	var table = new TableMain('tablebuild')
	// var mainmap;
	// console.log(table.domObj)
 	$.getJSON('query/buildingquery.json',function(json){ //just sample.. query or ajax function starts here
      
 		appglobal.queried = json;
      table.supply(json);
      // console.log(json)
 	}); //ends sample function

 	// console.log(table.buildObjs);
 	$('#cardlist,#tablelist').on('click', function(){
 		if($(this).hasClass('disabled')){
 			return;
 		}
 		var _p = !$(this).is('#tablelist')?"table":"card"
 		var p = $(this).is('#tablelist')?"table":"card"
 		$('#'+_p+'build').hide()
 		$('#'+_p+'list').removeClass('disabled')
 		$('#'+p+'build').show()
 		$('#'+p+'list').addClass('disabled')
 	})
 	
 	 // Joined cardbuild,tbody //not the same above
 	 $('#cardbuild,tbody').on('click','.msc',function(){
		var layout,id;
		if($(this).is('#cardbuild .msc')){
			layout = $(this).closest('.msc')
			id = layout.attr('id')
		} else {
			layout = $(this).closest('tr')
			id = layout.children()[0].innerHTML
		}
	    var obj=table.buildObjs[id-1]
		var modal =$('#addBuild')
		modifyModal(modal,obj,table)
	})


	// 
	$('#addButton').on('click',function(){
		var addobj;
		var modal =$('#addBuild')
		modifyModal(modal,null,table)
	})

} //end appThis

$(document).ready(appThis)

//reform this modal
function modifyModal(modal,obj,table){
	// var bodystate = true

	modal.on('show.bs.modal',function(e){ //process modal text data //set height and color
		$("#height").val(defaultBuilding.height)
		$("#wallcolor").val(defaultBuilding.wallcolor)
		$("#roofcolor").val(defaultBuilding.roofcolor)
	}).on('shown.bs.modal',function(e){ //process map on modal
		if(appglobal.map2==undefined){
			var posObj; // object position of building
			maphandler.init(posObj)
		}
		maphandler.addOSM(appglobal.buildFeature(appglobal.queried)) //add all osm to map. //should add all except(only if edit) target osm to map

		maphandler.initControls() //initiate controls on target osm, null if add

		$('.colorpicker-component').colorpicker();

		// console.log(appglobal.map2)
	}).on('hidden.bs.modal',function(e){
			// console.log('closed',e)
			//complete info here.
			// Post addobj
			// $('#buildform').form()
			// console.log($('#buildform'))
			// var s = $('#buildform').form("get fields");
		// console.log(s);
	})
	.modal()
	// $('#postSubmit').addClass("disabled")

	function checkValues(){

	}

	$('#postSubmit').on('click',function(){
		var name = $('input[name=name]'),
			area;
		console.log('summited',this);

		// return false;

		$.post('/verify',{poly:'this'}).done(function(d){
			alert('Data:'+ d);
		})

		 // $.ajax({
   //          type: "POST",
   //          url:'/bSumbit',
   //          // data: {title: title, body: body, published_at: published_at},
   //          success: function( msg ) {
   //          	console.log(msg)
   //              // $("#ajaxResponse").append("<div>"+msg+"</div>");
   //          }
   //      });
	})
}

/*
	Uses OSMBuildings 2.5D
	With Leaflet and others
*/

var str = 'map_build'
// leaflet = L.noConflict;
	// targetobj //object still visible.

maphandler = {
	init:function(obj){
		if(appglobal.map2!=null){
			//do obj here instead
			return;
		}

		// console.log(L.Control.Draw)
		appglobal.map2 = new L.Map(str,{
			center:[8.24107, 124.24392],
			zoom:17,
		})
		new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.kbpalbpk/{z}/{x}/{y}.png').addTo(appglobal.map2);

		appglobal.osmb = new OSMBuildings(appglobal.map2,{
		    zoom: 17.8,
		    tilt: 45,
		})

	},
	setView:function(obj){
	// body...

		console.log(str, "setview");
	},addOSM:function(obj){
		if(appglobal.osmb==null){
			console.log("not found osmb");
			return;
		}
		appglobal.osmb.set(obj);
	},initControls:function(str){
		if(appglobal.controlGroup!=null){
			return
		}

		var color = '#ffcc00',
		  height = 100,
		  feature;

		function setGeoJson() {
		  if (!feature) {
		    return;
		  }
		  feature.properties = {
		  	roofColor: defaultBuilding.roofcolor,
		    wallColor: defaultBuilding.wallcolor,
		    height: defaultBuilding.height
		  };
		  var geoJson = {
		    type: 'FeatureCollection',
		    features: [feature]
		  };
		  appglobal.osmb.set(geoJson);
		}

		var drawnItems = new L.FeatureGroup();
     		appglobal.map2.addLayer(drawnItems);

     		console.log(drawnItems); 

     	var tentObj = new OSMBuildings()
     		//Other controls
     	// var tentControl = L.control.layers({},{'Leaflet polygon':drawnItems,"Osm Object":tentObj},{ position: 'topleft', collapsed: false }).addTo(appglobal.map2);
     	// console.log(tentControl)
     		// appglobal.map2.addLayer(tentControl)

		appglobal.controlGroup = new L.Control.Draw({
		    draw: {
		      polyline: false,
		      polygon: {
		        allowIntersection: false,
		        shapeOptions: { color:color },
		        showArea:true
		      },
		      rectangle: {
		        shapeOptions: { color:color },
		        showArea:true
		      },
		      circle: false,
		      marker: false
		    },
		    edit:{
		    	featureGroup: drawnItems
		    }
		});

		function drawInfos(layer){
			coordinates = [];
			latlngs = appglobal.target.getLatLngs();
		    for (var i = 0; i < latlngs.length; i++) {
		        coordinates.push([latlngs[i].lng, latlngs[i].lat])
		    }
			coordinates.splice((latlngs.length + 1), 0, [latlngs[0].lng, latlngs[0].lat]); 
			var coordinates_result = JSON.stringify(coordinates); //were as polyline
			var final_result = "[" + coordinates_result +  "]"; //treat as polygon
			$('#polygon').val(final_result);

	    	var seeArea = L.GeometryUtil.geodesicArea(layer.getLatLngs());
	    	var c = "<strong>"+ seeArea.toFixed(2) +"</strong> Meters sq."
	    	$('#area_').val(seeArea.toFixed(2));

	    	$('#area').html(c)
		}
			
			appglobal.map2.addControl(appglobal.controlGroup);
		  // console.log(drawControl)

		  appglobal.map2.on('draw:created', function (e) {
		  	if(appglobal.target!=null){
		  		return
		  	}
		    appglobal.target = e.layer;
		    // console.log(e.layer);
		    if(e.layerType =="polygon"){
			    drawInfos(e.layer);
		    	e.layer.TargetBuilding = "this";
		    	drawnItems.addLayer(e.layer); //not geoJson atm.
		    }
		    // setGeoJson();
		  }).on('draw:edited',function(e){
		  	// console.log("done edit",e)
				e.layers.eachLayer(function(layer){
					drawInfos(layer)
				});

		  }).on('draw:editstart',function(e){
		  	// console.log("start edit",e)
		  }).on('draw:deleted',function(e){
		  	// console.log("deleted a layer",e)
		  	$('#polygon').val('');
		  	$('#area_').val('');
		  	e.layers.eachLayer(function(layer){
			  	if(layer.TargetBuilding=="this"){
			  		// console.log("feature deleted")
			  		var c = "Building removed. Must create new."
					$('#area').html(c)
			  		appglobal.target = null;
			  	}
			});
		  })
		  // .on('click',function(e){
		  // 	console.log("check map",this)
		  // })
		  ;
	}
	
}


