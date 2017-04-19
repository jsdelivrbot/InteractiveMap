var appglobal = { //required
  queried:null,
  frontMap:false,
	map:null, //OSM 3D
	map2: null, // OSM-Leaflet,
  osmb: null,
  target: null,
  drawnItems: null,
  controlGroup:null,
	buildFeature: function(objs){
		var features = [];
      $.each(objs, function(i, obj){
        features[i] = {
          type: "Feature", 
          geometry: {
            type: "Polygon",
            coordinates: JSON.parse("" + obj.polygon +"")
            // convertToArray(obj.polygon)
          },
          properties: {
            id:  obj.id,
            roofColor: obj.roofcolor,
            height: obj.height,
            wallColor: obj.wallcolor
          }
        }
      });
      xGeo = {
        type: "FeatureCollection", 
        features: features
      }
		return xGeo 
	}
  // ,feature: function(feature){
  //   if (!feature) {
  //     return;
  //   }
  //   feature.properties = {
  //     roofColor: defaultBuilding.roofcolor,
  //     wallColor: defaultBuilding.wallcolor,
  //     height: defaultBuilding.height
  //   };
  //   // var geoJson = {
  //   //   type: 'FeatureCollection',
  //   //   features: [feature]
  //   // };
  // },geo:function(features){
  //   if(!features){
  //     return;
  //   }
  //   return {
  //     type: "FeatureCollection",
  //     features:[features]
  //   }
  // }
}

defaultBuilding = {
  height:1,
  roofcolor:"#00AABB",
  wallcolor: "#20fed2",
  default: {
      height:1,
      roofcolor:"#00AABB",
      wallcolor: "#00AABB"
  }
}

function setHeight(el) {
  h = parseInt(el.value);
  if(h == NaN){
    defaultBuilding.height = defaultBuilding.default.height;
    return 
  }
  defaultBuilding.height = h;
}

function setWallcolor(el){
  if(typeof el == "string"){
    defaultBuilding.wallcolor = defaultBuilding.default.wallcolor
    return
  }
  defaultBuilding.wallcolor = el;
}

function setRoofcolor(el){
  if(typeof el == "string"){
    defaultBuilding.roofcolor = defaultBuilding.default.roofcolor
    return
  }
  defaultBuilding.roofcolor = el;
}
