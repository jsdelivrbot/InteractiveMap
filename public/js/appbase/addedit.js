/*
	Mainly uses leaflet.js and other functions.
*/

var appThis = function(){
	var table = new TableMain('tablebuild')
	$('.colorpicker-component').colorpicker();
	$('[data-toggle="popover"]').popover();


 	$.ajax({
      type: 'GET',
      dataType: 'JSON',
      url: '/b',
      ajax:false,
      success: function(buildings){
      	appglobal.queried = buildings;
		table.supply(buildings);
	    }
    });

    // var b= $.get('/b');
    // console.log(b)

    $('#typeahead').typeahead({
	  minLength: 0
	  // ,highlight: true
	  ,classNames: {
	  	input:''
	  }
	},
	{
	  // name: 'sampleName',
	  source: function(q,process){
	  	// console.log(q,process);
	  	return $.get('/autocomplete',{query:q},function(data){
	  		// console.log("queried",data,q);
	  		table.reset();
	  		table.supply(data);
	  	})
	  }
	});

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
		var modal =$('#addBuild')
		modifyModal(modal,id)
	})


	// 
	$('#addButton').on('click',function(){
		var modal =$('#addBuild')
		modifyModal(modal)
	})

} //end appThis

$(document).ready(appThis)

//reform this modal
function modifyModal(modal,id){

	var target,
		others;

	$.get('/b/'+id,function(building){
		target = {
            type: "Feature", 
            geometry: {
              type: "Polygon",
              coordinates:  JSON.parse("" + building.polygon +"")
            },
            properties: {
              id:  building.id,
              name:  building.name,
              roofColor: building.roofcolor,
              height: building.height,
              wallColor: building.wallcolor
            }
        }
	})

    $.ajax({
      type: 'GET',
      dataType: 'JSON',
      url: '/b/not/'+id,
      success: function(buildings){
		// console.log('other',buildings)
		others = appglobal.buildFeature(buildings);
		// console.log('others',others)
	  }
    });
	
	modal
	.on('shown.bs.modal',function(e){ //process map on modal
		// console.log(modal,e);
		// e.preventDefault();

		if(appglobal.map2==undefined){
			maphandler.init() //initiate map and controls
		}
		// var osm = appglobal.buildFeature(appglobal.queried)  //add all osm to map.
		maphandler.addOSM(others) //should add all except(only if edit) target osm to map
		console.log(others,target,'where is this?');

		maphandler.setTarget(target)


		// console.log(appglobal.map2)
	}).on('hidden.bs.modal',function(){
		$('#area').html("No building selected")
		appglobal.target = null;
	})
	.modal()

	$('#postSubmit').on('click',function(){ //Use this for empty polygon //does really nothing
		var name = $('input[name=name]'),
			area;
	})

	if(id){
		// console.log('id present, modify form');
		$('#buildform').attr('action','modify/update/'+id+'/')
		function findId(obj){
			return obj.id == id;
		}
    	obj = appglobal.queried.find(findId)

    	$('#name').val(obj.name);
		$('#keyname').val(obj.keyname);
		$("#height").val(obj.height)
		$("#wallcolor").val(obj.wallcolor)
		$("#roofcolor").val(obj.roofcolor)
		$('#desc').val(obj.description);
		// $('#polygon').val();
		// $('#area_').val();
    	// console.log(obj);
    	$('#deletebutton').show();
	} else {
		console.log('id missing, default form');
		$('#buildform').attr('action','modify/added')
		$('#name').val('');
		$('#keyname').val('');
		$("#height").val(defaultBuilding.height)
		$("#wallcolor").val(defaultBuilding.wallcolor)
		// $('#cp1').colorpicker('update');
		$("#roofcolor").val(defaultBuilding.roofcolor)
		// $('#cp2').colorpicker('update');
		$('#desc').val('');
		$('#polygon').val('');
		$('#area_').val('');
		$('#deletebutton').hide();
		target = null;
	}


	$('#deletebutton').on('click',function(e){
		e.preventDefault();
		// $(this).popover('show');
		$('#bdelete').on('click',function(e){
			$('#buildform').attr('action','modify/remove/'+id+'/')
		})
	})


} //end modal

/*
	Uses OSMBuildings 2.5D
	With Leaflet and others
*/

var str = 'map_build'

maphandler = {
	init:function(){
		if(appglobal.map2!=null){
			return;
		}
		appglobal.map2 = new L.Map(str,{
			center:[8.24107, 124.24392],
			zoom:17,
			maxZoom:19,
			minZoom:16
		})
		new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.kbpalbpk/{z}/{x}/{y}.png').addTo(appglobal.map2);

		appglobal.osmb = new OSMBuildings(appglobal.map2,{
		    zoom: 17.8,
		    tilt: 45,
		})

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

		// var formpanel = L.DomUtil.get('addBuild');
		// console.log(formpanel)
		  /*
			Controls Events
		  */
		appglobal.map2.on('draw:created', function (e) {
		  	if(appglobal.target!=null){
		  		return
		  	}
		    appglobal.target = e.layer;
		    if(e.layerType =="polygon"){
			    drawInfos(e.layer);
		    	e.layer.TargetBuilding = "this";
		    	appglobal.drawnItems.addLayer(e.layer); //not geoJson atm.
		    }
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
					$('#area').html("Building removed. Must create new.")
			  		appglobal.target = null;
			  	}
			});
		});
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
	},setTarget:function(t){
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


