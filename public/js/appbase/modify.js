/*
	Mainly uses leaflet.js and other functions.
	refer to addedit for original functions
*/

var appThis = function(){
	// var table = new TableMain('tablebuild')
	$('.colorpicker-component').colorpicker();
	$('[data-toggle="popover"]').popover();


 	$.ajax({
      type: 'GET',
      dataType: 'JSON',
      url: '/b',
      ajax:false,
      success: function(buildings){
      	appglobal.queried = buildings;
		maphandler.init()
		others = appglobal.buildFeature(appglobal.queried);
		maphandler.addOSM(others)
	  },
	  error:function(jqerror,str,error){
	  	// console.log(jqerror,str,error)
	  		$('#con-warning').show()
	  }
    });

	$('#deletebutton').on('click',function(e){
		e.preventDefault();
		// $(this).popover('show');
		$('#bdelete').on('click',function(u){
			// $('#buildform').attr('method','delete');	
			if(tent.t_ID == null){
				return;
			}
			$('#buildform').attr('action','modify/remove/'+tent.t_ID)
		})
	})

	$('#refresh').on('click',function(e){
		if(tent.hasChanges || tent.isCreated || tent.t_ID != null){
			//display warning modal give option to revert changes or cancel click;
			$('#warn2').modal('show')
			$('#warn2 .btn.btn-default').click(function(u){
				apphandler.clear()
				others = appglobal.buildFeature(appglobal.queried);
		    	apphandler.setup(others);
				tent.hasChanges = false;
				tent.isCreated = false;
				tent.t_ID = null;
				$('#warn2').modal('hide')
			})
		}
	})

	$('#tutorial').modal('show')
} //end appThis

$(document).ready(appThis)

apphandler = {
	/* 
	app handler: 
		this should be used to control html/js data
	*/
	editbuilding:function(obj){
		appglobal.drawnItems.clearLayers();
		$('#buildform').attr('action','modify/update/'+obj.id+'/')
    	$('#name').val(obj.name)
		$('#keyname').val(obj.keyname)
		$("#height").val(obj.height)
		$("#wallcolor").val(obj.wallcolor)
		$("#roofcolor").val(obj.roofcolor)
		$('#desc').val(obj.description)
		$('#deletebutton').show()
		tent.t_ID = obj.id;
	}
	,clear:function(){ // clear pre changes
		appglobal.drawnItems.clearLayers();
		tent.t_Id = null;
		$('#buildform').attr('action','modify/added')
		$('#name').val('');
		$('#keyname').val('');
		$("#height").val(defaultBuilding.height)
		$("#wallcolor").val(defaultBuilding.wallcolor)
		$("#roofcolor").val(defaultBuilding.roofcolor)
		$('#desc').val('');
		$('#polygon').val('');
		$('#area_').val('');
		$('#deletebutton').hide();
	},setup:function(ot,t){
		// appglobal.drawnItems.clearLayers();
		appglobal.osmb.set(ot);

		if(t){

			_t = {
		        type: "Feature", 
		        geometry: {
		          type: "Polygon",
		          coordinates:  JSON.parse("" + t.polygon +"")
		        },
		        properties: {
		          id:  t.id,
		          name:  t.name,
		          roofColor: t.roofcolor,
		          height: t.height,
		          wallColor: t.wallcolor
		        }
		    }

			L.geoJson(_t, {
	          onEachFeature: function (feature, layer) {
	            appglobal.drawnItems.addLayer(layer);
	          	tent.target = layer;
	          	drawInfos(layer); //reset later
	          }
	        });
		}
	}
}

tent = {
	others:null, //other features
	target:null, //target feature
	t_ID: null, //target to be edited/deleted
	modify: false, //if initiating modification ie. adding, editing, deleting polygon
	isCreated: false, // true when target is created polygon
	hasChanges:false
}

/*
	Uses OSMBuildings 2.5D
	With Leaflet and others
*/

var str = 'map_build'

maphandler = {
	init:function(){ //set up maps and controls
		if(appglobal.map2!=null){
			return;
		}
		appglobal.map2 = new L.Map(str,{
			center:[8.24107, 124.24392],
			zoom:17,
			maxZoom:18,
			minZoom:16
		})
		new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.kbpalbpk/{z}/{x}/{y}.png').addTo(appglobal.map2);

		appglobal.osmb = new OSMBuildings(appglobal.map2)

		if(appglobal.controlGroup!=null){
			return
		}

		appglobal.drawnItems = new L.FeatureGroup();
     	appglobal.map2.addLayer(appglobal.drawnItems);

		appglobal.controlGroup = new L.Control.Draw({
		    draw: {
		      polyline: false,
		      polygon: {
		        allowIntersection: false,
		        shapeOptions: { color:'#ffcc00' },
		        showArea:true
		      },
		      rectangle: {
		        shapeOptions: { color:'#ffcc00' },
		        showArea:true
		      },
		      circle: false,
		      marker: false
		    },
		    edit:{
		    	featureGroup: appglobal.drawnItems
		    }
		});

		appglobal.map2.addControl(appglobal.controlGroup);

		  /*
			Controls Events
		  */
		appglobal.map2.on('draw:created', function (e) {
			//'e' is new polygon. refer to addedit for changes.
			tent.modify = false; //disable osmb click
			tent.isCreated = true;
			if(e.layerType =="polygon"){
		    	apphandler.clear()
		    	appglobal.drawnItems.addLayer(e.layer); //not geoJson atm.
				tent.target = e.layer;
		    	 //** modify ui form data
		    	others = appglobal.buildFeature(appglobal.queried);
		    	apphandler.setup(others);
		    }
		}).on('draw:edited',function(e){
			//'e' is editable polygon. should only be one. refer to addedit for changes.
		  	tent.modify = false; //disable osmb click
		  	tent.isCreated = false;
		  	tent.hasChanges = true;
		  	e.layers.eachLayer(function(layer){
		  		tent.target = layer;
			});
		}).on('draw:deleted',function(e){
			tent.modify = false; //disable osmb click
			tent.isCreated = false;
			tent.hasChanges = true;

			tent.target = null;
			//**clear ui forms on page
			// console.log("called remove",e)

		}).on('draw:drawstart',function(e){
			tent.modify = true;
			tent.isCreated = false;
		}).on('draw:editstart',function(e){
			tent.modify = true;
			tent.isCreated = false;
		  	// console.log("start edit",e)
		}).on('draw:deletestart',function(e){
			tent.modify = true;
			tent.isCreated = false;
		  	// console.log("start edit",e)
		}).on('draw:drawstop',function(e){
			tent.modify = false; //disable osmb click
		}).on('draw:editstop',function(e){
			tent.modify = false;
			// tent.isCreated = false;
		  	// console.log("start edit",e)
		}).on('draw:deletestart',function(e){
			tent.modify = true;
			// tent.isCreated = false;
		  	// console.log("start edit",e)
		})
		;

		appglobal.osmb.click(function(e){ //clicks a building and set it to tent.target
			if(tent.modify){
				return;
			}

			others = appglobal.queried.filter(function(el){
				return el.id != e.feature;
			});
			target = appglobal.queried.filter(function(el){
				return el.id == e.feature;
			});

			// console.log(others,target[0]);

			ot = appglobal.buildFeature(others)

			if(tent.hasChanges || tent.isCreated){
				//display warning modal give option to revert changes or cancel click;
				$('#warn').modal('show')
				$('#warn .btn.btn-default').click(function(u){
					// console.log('Revert changes and set form')
					apphandler.editbuilding(target[0])
					$('#warn').modal('hide');
		    		apphandler.setup(ot,target[0]);
					tent.hasChanges = false;
					tent.isCreated = false;
				})
			} else {
				apphandler.editbuilding(target[0])
				apphandler.setup(ot,target[0]);
			}
		})
	},
	setView:function(obj){
	// body...

		// console.log(str, "setview");
	},addOSM:function(obj){
		if(appglobal.osmb==null){
			// console.log("not found osmb");
			return;
		}
		appglobal.osmb.set(obj);
	},setTarget:function(t){ // t is a target feature, used to set a layer as highlight
		appglobal.drawnItems.clearLayers(); //clears drawn layers which werent submitted
		if(t==null){
			return;
		}
		L.geoJson(t, {
          onEachFeature: function (feature, layer) {
            appglobal.drawnItems.addLayer(layer);
          	appglobal.target = layer;
          	drawInfos(layer);
          }
        });
	}
	
}


//extra
function drawInfos(layer){
	coordinates = [];
	latlngs = tent.target.getLatLngs();
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


/*
	NOTES

	Method					Instances				Requirement
	Add building			Refreshed page
							Polygon button			One building is-to one set-info policy. if a building is highlighted ie on drawnItems, 
													target will be replaced and form will be clear. changes of previous edit will be reverted.


	Edit a building			Click a osmb feature	must have feature, no other feature present or modify buttons werent initiated
													Optional: if a building was removed of polygon info, all data regarding that building will be remove IFF sumbitted.

	Delete a building		click a osmb feature	must have feature, no other feature present or modify buttons werent initiated
													Optional: if a building was stripped of polygon info, all data regarding that building will be remove IFF sumbitted. Should have warning


	ALL ARE ONE STEP PROCESS.
	if add building, must submit for storage.
	if edit building, must submit for changes.
	if delete building, must submit for removal.
*/