@extends('layouts.app')

@section('added-css-scripts')
  @include('main.scripts.css-leaflet')
  @include('main.scripts.css-create')
@endsection

@section('contentheader_title')
	Buildings
@endsection

@section('main-content')
	<div class="row">
    <div class="col-md-5">

      <div class="box box-success">
        <div class="box-header">
          <h3 class="box-title">Add New Building</h3>
          <div class="box-tools pull-right">
          </div>
        </div>

        <div class="box-body">
          {!! Form::open(['url' => 'buildings']) !!}
            
            <div class="form-group col-md-9">
            {!! Form::label('name', 'Name') !!}
              {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-md-3">
              {!! Form::label('height', 'Height (1 floor = 2)') !!}
                {!! Form::text('height', null, ['class' => 'form-control', 'maxlength' => '4', 'size' => '4' ]) !!}
            </div>

            <div class="form-group col-md-6">
            {!! Form::label('description', 'Description') !!}
              {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '12']) !!}
            </div>

            <div class="form-group col-md-6">
            {!! Form::label('polygon', 'Coordinates') !!}
              {!! Form::textarea('polygon', null, ['id' => 'resultarea', 'class' => 'form-control', 'rows' => '12']) !!}
            </div> 

            <div class="form-group col-md-6">
              {!! Form::label('wallcolor', 'Wall Color') !!}
                {!! Form::text('wallcolor', null, ['class' => 'form-control my-colorpicker1', 'placeholder' => '#ff0000']) !!}
            </div>

            <div class="form-group col-md-6">
              {!! Form::label('roofcolor', 'Roof Color') !!}
                {!! Form::text('roofcolor', null, ['class' => 'form-control my-colorpicker1', 'placeholder' => '#ff8000']) !!}
            </div>
            
            <div class="form-group col-md-6">
              {!! Form::label('image', 'Image Name') !!}
              <p><small>Save your image at public\img\buildings</small></p>
              <div class="input-group">
                {!! Form::text('image', null, ['class' => 'form-control', 'placeholder' => 'building-name']) !!}
                <div class="input-group-addon">.jpg</div>
              </div>
            </div>

        </div><!-- /.box-body -->

        <div class="box-footer">
          <div class="box-tools pull-right">
            <a href="{{{ URL::previous() }}}" type="button" class="btn btn-default">Cancel</a>
            {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
          </div>
        </div>
          
      </div><!-- /.box -->

    </div>

    <div class="col-md-7">

      <!-- <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        You cannot edit the building polygon after this, make sure you do this seriously.      
      </div> -->

      <div id="map-canvas" class="box box-solid"></div>
    </div>
  </div>
@endsection

@section('added_js_scripts')
  @include('main.scripts.js-leaflet')
  @include('main.scripts.js-create')


  <script>
  
    //color picker with addon
    $(".my-colorpicker1").colorpicker();

    // create map engine 
    var map = new L.Map('map-canvas');
    map.setView([8.241354685854704, 124.24500435590743], 17, false);

    new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.kbpalbpk/{z}/{x}/{y}.png', {
      attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>'
    }).addTo(map);

    function style(feature) {
      return {
        weight: 2,
        color: '#222D32',
        fillOpacity: 0.8,
        fillColor: '#00A65A'
      };
    }

    function highlightFeature(e) {
      var layer = e.target;

      layer.setStyle({
        weight: 5,
        color: 'black'
      });

      if (!L.Browser.ie && !L.Browser.opera) {
          layer.bringToFront();
      }
    }

    var geojsonLayer;

    function resetHighlight(e) {
      geojsonLayer.resetStyle(e.target);
    }

    function zoomToFeature(e) {
      map.fitBounds(e.target.getBounds());
      //alert(feature.properties.id);
    }

    function onEachFeature(feature, layer) {
      layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
      });

      if (feature.properties) {
        var popupString = '<div class="popup">';
        for (var k in feature.properties) {
            var v = feature.properties[k];
            popupString += k + ': ' + v + '<br>';
        }
        popupString += '</div>';
        layer.bindPopup(popupString, {
            maxHeight: 200
        });
      }
    }

    //Strictly add per call to map
    var geojson = null;
    //convert string to array
    function convertToArray(string){
      var array = JSON.parse("" + string +"");
      return array;
    }
    var valid = JSON.stringify(geojson);

    $(function(){

      $.ajax({
      type: 'GET',
      dataType: 'JSON',
      url: '/buildingdata',
      success: function(buildings){
        //console.log(buildings);
        // console.log('success', building);
        var features = new Array();
          $.each(buildings, function(i, building){
            //console.log(building);

            features[i] = {
                type: "Feature", 
                geometry: {
                  type: "Polygon",
                  coordinates: convertToArray(building.polygon)
                },
                properties: {
                  id:  building.id,
                  name:  building.name,
                  roofColor: building.roofcolor,
                  height: building.height,
                  wallColor: building.wallcolor
                }
            }
        });

       geojson = {
          type: "FeatureCollection", 
          features: features
        }

        // SHOW BUILDINGS
        geojsonLayer = L.geoJson(geojson, {style:style,onEachFeature:onEachFeature}).addTo(map);
        }
      });
    }); //end strictly add


    var drawnItems = new L.FeatureGroup();
    map.addLayer(drawnItems);

    var drawControl = new L.Control.Draw({
      draw: {
        position: 'topleft',
        polygon: {
          allowIntersection: false,
          drawError: {
            color: '#b00b00',
            timeout: 1000
          },
          shapeOptions: {
            color: '#bada55'
          },
          showArea: true
        },
        polyline: false,
        circle: false,
        rectangle: false,
        marker: false
      },
      edit: {
        featureGroup: drawnItems
      }
    });
    map.addControl(drawControl);

    map.on('draw:created', function (e) {
    var type = e.layerType,
        layer = e.layer;

    if (type === 'polygon') {

      // export the coordinates from the layer
      coordinates = [];
      latlngs = layer.getLatLngs();
      for (var i = 0; i < latlngs.length; i++) {
        coordinates.push([latlngs[i].lng, latlngs[i].lat])
      }

      coordinates.splice((latlngs.length + 1), 0, [latlngs[0].lng, latlngs[0].lat]); 

      var coordinates_result = JSON.stringify(coordinates, null, 4);

      var final_result = "&#91" + coordinates_result +  "&#93";

      document.getElementById("resultarea").innerHTML = final_result;

      }
    drawnItems.addLayer(layer);
    });

    map.on('draw:edited', function (e) {
      var layers = e.layers;
      layers.eachLayer(function (layer) {
        if (layer instanceof L.Polyline) {
          coordinates = [];
          latlngs = layer.getLatLngs();
          for (var i = 0; i < latlngs.length; i++) {
            coordinates.push([latlngs[i].lng, latlngs[i].lat])
          }

          coordinates.splice((latlngs.length + 1), 0, [latlngs[0].lng, latlngs[0].lat]); 

          var coordinates_result = JSON.stringify(coordinates, null, 4);

          var final_result = "&#91" + coordinates_result +  "&#93";

          document.getElementById("resultarea").innerHTML = final_result;
        }
      });
    });
  </script>
  
@endsection