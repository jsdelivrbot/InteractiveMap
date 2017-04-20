var appThis = function(){
	var table = new TableMain('tablebuild')

 	if(appglobal.frontMap){
 		if(appglobal.map==undefined){
			var posObj; // object position of building
			maphandler.init(posObj,false) //disables the map controls
		}
		maphandler.setControl()

		$('#buildModal #b-map').hide()
		$('#b-img').show()
 	}

 	// console.log(
 	// 	)

 	$.ajax({
      type: 'GET',
      dataType: 'JSON',
      url: '/b',
      success: function(buildings){
      	appglobal.queried = buildings;
		table.supply(buildings);
		if(appglobal.map!=undefined){
			maphandler.addOSM(appglobal.buildFeature(appglobal.queried))
		}
	  }
    });

 	sampleName = [{id:1,name:"whoisthis"},{id:2,name:'areyouhere'}];

 	appglobal.search = new Bloodhound({
	  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	  queryTokenizer: Bloodhound.tokenizers.whitespace,
	  prefetch: '/b',
	  remote: {
	    url: '/b'
	  }
 	})


$('#typeahead').typeahead({
  minLength: 0
  // ,highlight: true
},
{
  // name: 'sampleName',
  source: function(q,process){
  	// console.log(q,process);
  	return $.get('/autocomplete',{query:q},function(data){
  		console.log("queried",data);
  		table.reset();
  		table.supply(data);
  		// return process(data);
  	})
    // });
  	// console.log(results)
  },
  // display:function(q,x,y){
  // 	console.log(q,x,y);
  // },
  templates: {
  	suggestion: function(x){
	  	console.log(x, this);
	}
  }
});

 	// $('.sidebar-toggle').on('click',function(){
 	// 	console.log('clicked')
 	// 	// appglobal.map.appendTo(str);
 	// })
 	// console.log(table.buildObjs);
 	 	$('#cardlist,#tablelist').on('click', function(){
 		if($(this).hasClass('disabled')){
 			return;
 		}
 		var p = $(this).is('#tablelist')?"table":"card"
 		var _p = !$(this).is('#tablelist')?"table":"card"
 		// console.log("show",p,"hide",_p)
 		// var o = $(this).is('#tablelist') ? { list:$(this),build:$('#tablebuild')}: { list:$('#cardlist'),build:$('#cardbuild')}
 		// var o = !$(this).is('#tablelist') ? { list:$('#cardlist'),build:$('#cardbuild')} : { list:$(this),build:$('#tablebuild')}
 		$('#'+_p+'build').hide()
 		$('#'+_p+'list').removeClass('disabled')
 		$('#'+p+'build').show()
 		$('#'+p+'list').addClass('disabled')
 		// console.log($(this).is('#'+p+'list'));
 	})

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
		var modal =$('#buildModal')
		modifyModal(modal,obj,table)
	})
	
	$('#addButton').on('click',function(){ //remove add button
		// var addobj;
		// $('#addBuild').on('shown.bs.modal',function(e){
		// 	if(appglobal.map==undefined){
		// 		appglobal.map = new MapBase('map_build',false)
		// 	}

		// 	//test
		// 	appglobal.map.supply(appglobal.buildFeature(table.buildObjs))
			
		// }).on('hidden.bs.modal',function(e){
		// 	// console.log('closed',e)
		// 	//complete info here.
		// 	// Post addobj
		// }).modal()
	})

} //end appThis

$(document).ready(appThis)


function modifyModal(modal,obj){
	modal.find('.modal-title').text(obj.name)

	// console.log(obj)
	var handler = {
		doOne: function(){
			// console.log('do 1,orig content')
			// bodydetails.hide()
			var c = "<p><strong>Name: </strong><span class='text-muted'>"+obj.name+"</span></p>"
				+ "<p><strong>Dates: </strong><span class='text-muted'>"+"obj.dates" +"</span></p>"
				+ "<p><strong>Address: </strong><span class='text-muted'>"+ "obj.address" +"</span></p>"
				+ "<strong>Description: </strong><p class='text-muted text-justify'>" +obj.description+"</p>"
			bodystate = false
			return c
		},
		doTwo:function(){
			// console.log('do 2,change content')
			// bodydetails.show()
			var c = "<p><strong>BuildingID: </strong><span class='text-muted'>"+obj.id+"</span></p>"
				+ "<p><strong>Colors: </strong><span style='color:"+obj.roofcolor+";'> Roof </span><span style='color:"+obj.wallcolor+";'> Wall </span></p>"
				+ "<p><strong>Floors: </strong><span class='text-muted'>"+obj.height/2+" </span></p>"
				+ "<p><strong>Added: </strong><span class='text-muted'>"+obj.created_at+" </span><strong class='margin-r-2'>Updated: </strong><span class='text-muted'>"+obj.updated_at+"</span></p>"
				// + "<p></p>"
				+ "<strong>PolygonText: </strong><p><span class='text-muted'>"+obj.polygon+"</span></p>"
			bodystate = true;
			return c
		}
	}

	var bodystate = true
	modal.on('show.bs.modal',function(e){ //process modal text data
		var bodydetails = modal.find('.body1')
		bodydetails.html(handler.doOne())
		
		$('#moreDetails').on('click',function(){
			bodydetails.html(bodystate ? handler.doOne(): handler.doTwo())
		})

	}).on('shown.bs.modal',function(e){ //process map on modal
		if(appglobal.map==undefined){
			// appglobal.map = new MapBase('b-map',true) 
			var posObj; // object position of building
			maphandler.init(posObj,true) //disables the map controls
		}
		// appglobal.map.supply(appglobal.buildFeature(table.buildObjs))
		maphandler.addOSM(appglobal.buildFeature(appglobal.queried))
		// appglobal.map.c_buildTarget("obj") //put building objects here
		// console.log(appglobal.buildFeature(appglobal.queried))
	})
	.modal()
}

/*
	Uses OSMBuildings 3D
	With GLMap and
*/

var str = 'b-map'

maphandler = {
	init:function(obj,ifDis){
		if(appglobal.map!=null){
			//do obj here instead
			return;
		}

		appglobal.map = new OSMBuildings({
		    position: {latitude: 8.241097198309157, longitude: 124.24392879009247},
		    zoom: 17.8,
		    tilt: 45,
		    disabled: ifDis
		});
		appglobal.map.appendTo(str);
		appglobal.map.addMapTiles(
		    'https://{s}.tiles.mapbox.com/v3/osmbuildings.kbpalbpk/{z}/{x}/{y}.png',
		);

	},
	setView:function(obj){
	// body...
	/* obj={position:{lat,long},rotation,tilt,zoom}
	*/ 
	// this.osmb.setPosition(); 
	// this.osmb.setRotation(); 
	// this.osmb.setTilt(); 
	// this.osmb.setZoom(); 
	console.log(str, "setview");
	},addOSM:function(obj){
		appglobal.map.addGeoJSON(obj);
	},setControl:function(){
		/* For Clicking Objects in the map
		*/
		appglobal.map.on('pointerdown',function(e){
			var modal =$('#buildModal')
			var asObj = appglobal.map.getTarget(e.detail.x, e.detail.y, function(id) {
				function findId(obj){
					return obj.id === id;
				}
		        if (id) {
		        	obj = appglobal.queried.find(findId)
		        	modifyModal(modal,obj)
		        }
		    })
			console.log("after", asObj)
		})
		.on('pointermove',function(e){
			var asObj = appglobal.map.getTarget(e.detail.x, e.detail.y, function(id) {
		        if (id) {
		        	document.body.style.cursor = 'pointer';
          			appglobal.map.highlight(id, '#f08000');
		        } else{
		        	document.body.style.cursor = 'default';
					appglobal.map.highlight(null);
		        }
		      })
		})
	}
}

// function setView(obj) 

