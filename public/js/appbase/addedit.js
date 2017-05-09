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
	  },
	  error:function(jqerror,str,error){
	  	// console.log(jqerror,str,error)
	  		$('#accordion').hide()
	  		$('#con-warning').show()
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
		//test
		others = appglobal.queried.filter(function(el){
			return el.id != id;
		});; 
		// target = others.splice(id-1,1);
		target = appglobal.queried.filter(function(el){
			return el.id == id;
		});
		obj = {
			others: others,
			target: target
		}

		// console.log(others,target,appglobal.queried,obj);
		var modal =$('#addBuild')
		modifyModal(modal,obj) //original
	})


	// 
	$('#addButton').on('click',function(){
		var modal =$('#addBuild')
		// just get all data
		modifyModal(modal) //original
	})

} //end appThis

$(document).ready(appThis)

//reform this modal
function modifyModal(modal,obj){

	var target, //set as feature
		others, // set as geofeature
		id; 

	// console.log(target,others,id,obj.target[0]);

	if(obj){
		target = {
	        type: "Feature", 
	        geometry: {
	          type: "Polygon",
	          coordinates:  JSON.parse("" + obj.target[0].polygon +"")
	        },
	        properties: {
	          id:  obj.target[0].id,
	          name:  obj.target[0].name,
	          roofColor: obj.target[0].roofcolor,
	          height: obj.target[0].height,
	          wallColor: obj.target[0].wallcolor
	        }
	    }
	    id = obj.target[0].id;
		others = appglobal.buildFeature(obj.others);

		$('#buildform').attr('action','modify/update/'+id+'/')
    	$('#name').val(obj.target[0].name);
		$('#keyname').val(obj.target[0].keyname);
		$("#height").val(obj.target[0].height)
		$("#wallcolor").val(obj.target[0].wallcolor)
		$("#roofcolor").val(obj.target[0].roofcolor)
		$('#desc').val(obj.target[0].description);
		// $('#polygon').val();
		// $('#area_').val();
    	// console.log(obj);
    	$('#deletebutton').show();
	} else {
		target = id = undefined;
		others = appglobal.buildFeature(appglobal.queried);

		// console.log('id missing, default form');
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
	}
	
	modal
	.on('shown.bs.modal',function(e){ //process map on modal
		// console.log(modal,e);
		// e.preventDefault();

		if(appglobal.map2==undefined){
			maphandler.init() //initiate map and controls
		}
		// var osm = appglobal.buildFeature(appglobal.queried)  //add all osm to map.
		maphandler.addOSM(others) //should add all except(only if edit) target osm to map
		// console.log(others,target,'where is this?');

		maphandler.setTarget(target)


		// console.log(appglobal.map2)
	}).on('hidden.bs.modal',function(){
		$('#area').html("No building selected")
		appglobal.target = null;
	})
	.modal()

	// $('#postSubmit').on('click',function(){ //Use this for empty polygon //does really nothing
	// 	var name = $('input[name=name]'),
	// 		area;
	// })

	$('#deletebutton').on('click',function(e){
		e.preventDefault();
		// $(this).popover('show');
		$('#bdelete').on('click',function(u){
			// $('#buildform').attr('method','delete');	
			$('#buildform').attr('action','modify/remove/'+id)
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

		// console.log(str, "setview");
	},addOSM:function(obj){
		if(appglobal.osmb==null){
			// console.log("not found osmb");
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


