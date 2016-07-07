<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  @section('htmlheader')
    @include('layouts.partials.htmlheader')
    @include('main.scripts.css-user-map') 
  @show     
  <style type="text/css">
/*   .typeahead-wrapper {
        display: block;
        margin: 50px 0;
      }
      .tt-dropdown-menu {
        background-color: #fff;
        border: 1px solid #000;
      }
      .tt-suggestion.tt-cursor {
        background-color: #ccc;
      }
      .triggered-events {
        float: right;
        width: 500px;
        height: 300px;
      }
*/
/**/
.autocomplete-suggestions { border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
.autocomplete-suggestion { padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-no-suggestion { padding: 2px 5px;}
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: bold; color: #000; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { font-weight: bold; font-size: 16px; color: #000; display: block; border-bottom: 1px solid #000; }
  </style>
</head>

<body class="skin-green sidebar-collapse">
<div class="wrapper">

  <div class="control tilt btn-group-vertical">
    <button type="button" class="btn btn-default dec" data-toggle="tooltip" data-placement="right" title="Tilt down">
      <i class="fa fa-long-arrow-up"></i>
    </button>
    <button type="button" class="btn btn-default inc" data-toggle="tooltip" data-placement="right" title="Tilt up">
      <i class="fa fa-long-arrow-down "></i>
    </button>
  </div>

  <div class="control rotation btn-group-vertical">
    <button type="button" class="btn btn-default inc" data-toggle="tooltip" data-placement="right" title="Rotate clockwise">
      <i class="fa fa-repeat"></i>
    </button>
    <button type="button" class="btn btn-default dec" data-toggle="tooltip" data-placement="right" title="Rotate counter clockwise">
      <i class="fa fa-undo"></i>
    </button>
  </div>

  <div class="control zoom btn-group-vertical">
    <button type="button" class="btn btn-default inc" data-toggle="tooltip" data-placement="right" title="Zoom in">
      <i class="fa fa-plus"></i>
    </button>
    <button type="button" class="btn btn-default dec"data-toggle="tooltip" data-placement="right" title="Zoom out">
      <i class="fa fa-minus"></i>
    </button>
  </div>

  <div id="login-box">
    <a href="{{url('/auth/login')}}">Login</a>
    <!-- <div class="alert alert-block alert-success"></div> -->
  </div>

<!--   <div id="search-box">
    <input id="demo4" type="text" class="col-md-12 form-control" placeholder="Search building" autocomplete="off" />
  </div>
 -->
  <div id="name-box" hidden>
    <span id="preview-name"></span>
  </div>
  <div id="info-box">
    <span id="preview-name">
    </span>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <span id="modal-id" style="font-size:20px;"></span>&nbsp;&#45;&nbsp;<span id="modal-title" style="font-size:20px;"></span>
        </div> 
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12" id="modal-image">
            </div>
            <div class="col-md-12" id="modal-description" style="text-align: justify; text-justify: inter-word;">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
        </div>
      </div>
    </div>
  </div>


              <div id="custom-search-input">
                <div class="input-group col-md-12" id="srch">
                    <input type="text" placeholder="Building or Event" id="searchString" class="form-control input-m typeahead" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>

                <!-- Result Display -->
<!--                 <div class="result-display" id="search-results">
                  <div class="res-buildings" id="res-building">
                    <h5># <strong>Buildings</strong> found.</h5>
                    <span class="data-container">
                      <img src="image.jpg" height="40" width="45" ><span class="data-name" id="building-name">Name</span>
                    </span>

                  </div>
                  <div class="res-events" id="res-event">
                    <h5># <strong>Events</strong> found.</h5>
                    <span class="data-container">
                      <img src="image.jpg" height="40" width="45" ><span class="data-name" id="building-name">Name</span>
                    </span>
                  </div>
                </div> -->

            </div><!-- End of custom search -->


  <div id="map-canvas" class="box box-solid"></div>

  <!-- Main Header -->
<!--     <header class="main-header">

        
        <a class="logo">
          
          <span class="logo-lg"><b>Virtual.ly</b></span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
           <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li>
                <a href="{{url('/login')}}" type="button">Login</a>
              </li>

            </ul>
          </div> 
        </nav>

    </header> -->



    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper">
    </div> --><!-- /.content-wrapper -->

</div><!-- ./wrapper -->

@section('scripts')
  @include('layouts.partials.scripts')
  @include('main.scripts.js-osm') 
  <script src="{{ asset('/js/typeahead/typeahead.bundle.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/js/jquery.autocomplete.js') }}" type="text/javascript"></script>

@show

  <script>

    // BASEMAP
    var map = new GLMap('map-canvas', {
      position: {latitude: 8.241097198309157, longitude: 124.24392879009247},
      zoom: 17.8,
      tilt: 45
    });

    // OSM BUILDINGS
    var osmb = new OSMBuildings({
      minZoom: 17,
      maxZoom: 20,
      effects: ['shadows']
    }).addTo(map);   

    // BASEMAP TILELAYER
    osmb.addMapTiles('http://{s}.tiles.mapbox.com/v3/osmbuildings.kbpalbpk/{z}/{x}/{y}.png'),
    {attribution: '© Data <a href=http://openstreetmap.org/copyright/>OpenStreetMap</a> · © Map <a href=http://mapbox.com>MapBox</a>'};

    osmb.addGeoJSON("{{ asset('/json/landarea.json') }}");

    //osmb.addOBJ('{{asset('obj/csm.obj')}}', { latitude: 8.24176613467753, longitude: 124.24443304538725}, {id: "my_object_1", scale: 1, rotation: 101, color: '#cccccc'});

    //building set
    // var buildingSet = null;

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
              console.log(building);

              features[i] = {
                  type: "Feature", 
                  geometry: {
                    type: "Polygon",
                    coordinates: convertToArray(building.polygon)
                  },
                  properties: {
                    id:  building.id,
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
        osmb.addGeoJSON(geojson);
    // console.log(buildingSet);
        }
      });
     }); //end strictly add
    
    // HIGHLIGHT
    map.on('pointermove', function(e) {
      var id = osmb.getTarget(e.x, e.y, function(id) {
        if (id) {
          document.body.style.cursor = 'pointer';
          osmb.highlight(id, '#f08000');
          getName(id);
          $('#name-box').show();
          $('#name-box').css({'top':e.y,'left':e.x}).fadeIn('slow');
        } else {
          document.body.style.cursor = 'default';
          osmb.highlight(null);
          $('#name-box').hide();
        }
      });
    });

    // SHOW MODAL
    map.on('pointerdown', function(e) {
      var id = osmb.getTarget(e.x, e.y, function(id) {
        if (id) {
          $('#myModal').modal('show');
          getBuilding(id);
        }
      });
    });

    function getName(id){
      $.ajax({
        type: 'GET',
      dataType: 'JSON',
      url: '/buildingdata/'+id,
      success: function(buildingData){
        $('#preview-name').html(buildingData.name);
        // $('.alert').show().html(buildingData.name);

      }
      });
    }

    function getBuilding(id){
      $.ajax({
        type: 'GET',
      dataType: 'JSON',
      url: '/buildingdata/'+id,
      success: function(buildingData){
        $('#modal-id').html(buildingData.id);
        $('#modal-title').html(buildingData.name);
        $('#modal-description').html(buildingData.description);
        $('#modal-image').html('<img src="/img/buildings/'+buildingData.image+'.jpg" width="570">');
      }
      });
    }
    
    // CONTROL BUTTONS
    var controlButtons = document.querySelectorAll('.control button');

    for (var i = 0; i < controlButtons.length; i++) {
      controlButtons[i].addEventListener('click', function(e) {
        var button = this;
        var parentClassList = button.parentNode.classList;
        var direction = button.classList.contains('inc') ? 1 : -1;
        var increment;
        var property;

        if (parentClassList.contains('tilt')) {
          property = 'Tilt';
          increment = direction*10;
        }
        if (parentClassList.contains('rotation')) {
          property = 'Rotation';
          increment = direction*10;
        }
        if (parentClassList.contains('zoom')) {
          property = 'Zoom';
          increment = direction*1;
        }
        if (parentClassList.contains('bend')) {
          property = 'Bend';
          increment = direction*1;
        }
        if (property) {
          map['set'+ property](map['get'+ property]()+increment);
        }
      });
    }

// //jquery autocomplete
//   $('#searchString').devbridgeAutocomplete({
//     serviceUrl: 'b-names',
//     onSelect: function (suggestion) {
//       alert('You selected: ' + suggestion.name);
//       console.log(suggestion);
//     }
// });


    //script for search. Twitter autofill
    var substringMatcher = function(strs) {
      return function findMatches(q, cb) {
        var matches, substringRegex;

        // an array that will be populated with substring matches
        matches = [];

        // regex used to determine if a string contains the substring `q`
        substrRegex = new RegExp(q, 'i');

        // iterate through the pool of strings and for any string that
        // contains the substring `q`, add it to the `matches` array
        $.each(strs, function(i, str) {
          if (substrRegex.test(str)) {
            matches.push(str);
          }
        });

        cb(matches);
      };
    };

var bldg = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: 'b-names',
  remote: {
    url: 'b-names'
  }
});

console.log(bldg);

$('#srch .typeahead').typeahead({
  hint: false,
  highlight: true,
  minLength: 1
},
{
  display: 'name',
  source: bldg
});


  </script> 

  <script>
    $(function() {
      function displayResult(item) {
        $('.alert').show().html('You selected <strong>' + item.value + '</strong>: <strong>' + item.text + '</strong>');
        $('#myModal').modal('show');
        getBuilding(item.value);
      }
      $('#demo4').typeahead({
        ajax: '/buildingdata',
        onSelect: displayResult
      });
    });
  </script>

</body>
</html>
