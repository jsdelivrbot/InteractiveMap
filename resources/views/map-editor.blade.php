@extends('layouts.app')

@section('css-map-editor')
	<link href="{{ asset('/css/map-styles.css') }}" rel="stylesheet" type="text/css" />

  <link href="{{ asset('/css/colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" type="text/css" />

  <link rel='stylesheet prefetch' href='http://cdn.osmbuildings.org/OSMBuildings-GLMap-2.0.0/GLMap/GLMap.css'>

  <link rel="stylesheet" type="text/css" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
  
  <link rel="stylesheet" type="text/css" href="http://cdn.osmbuildings.org/Leaflet.draw/0.2.0/leaflet.draw.css">
@endsection

@section('contentheader_title')
	Map Editor
@endsection

@section('main-content')
	<div class="row">
    <div class="col-md-3">

      <div class="box box-solid">
        <div class="box-header">
          <h3 class="box-title">Add New Building</h3>
          <div class="box-tools pull-right">
          </div>
        </div><!-- /.box-header -->

        <div class="box-body">
          <form role="form">
            <div class="box-body">

              <div class="form-group">
              <label>Name</label>
                <input type="text" class="form-control" id="building-name" placeholder="Building Name">
              </div>

              <div class="form-group">
              <label>Height</label>
                <input type="text" class="form-control" id="building-height" maxlength="4" size="4" onkeypress="setHeight(this)" placeholder="100">
              </div>

              <div class="form-group">
                <label>Wall Color</label>

                <div class="input-group my-colorpicker2">
                  <input type="text" class="form-control" id="wallColor" onkeypress="setWallColor(this)"
                  placeholder="#ff0000">

                  <div class="input-group-addon">
                    <i></i>
                  </div>
                </div>
                <!-- /.input group -->
              </div>

              <div class="form-group">
                <label>Roof Color</label>

                <div class="input-group my-colorpicker2">
                  <input type="text" class="form-control" id="roofColor" onkeypress="setRoofColor(this)" placeholder="#ff8000">

                  <div class="input-group-addon">
                    <i></i>
                  </div>
                </div>
                <!-- /.input group -->
              </div>

            </div>                
      <!-- /.box-body -->

      <div class="box-footer">
        <!-- <button type="submit" class="btn btn-success">Submit</button> -->
      </div>
    </form>
        </div><!-- /.box-body -->
      </div><!-- /.box -->

    </div>
    
    <div class="col-md-9">
      <div id="map-canvas" class="box box-solid"></div>
    </div>
    
  </div>
@endsection

@section('scripts-map-editor')
	<!-- bootstrap color picker -->
	<script src="{{ asset('/js/colorpicker/bootstrap-colorpicker.min.js') }}" type="text/javascript"></script>

  <script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js" type="text/javascript"></script>

  <script src="http://cdn.osmbuildings.org/OSMBuildings-Leaflet.js" type="text/javascript"></script>
  <script src="http://cdn.osmbuildings.org/Leaflet.draw/0.2.0/leaflet.draw.js" type="text/javascript"></script>

  <script>
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

   // create map engine 
    var map = new L.Map('map-canvas');
      map.setView([8.241354685854704, 124.24403356388211], 16, false);

      new L.TileLayer('http://{s}.tiles.mapbox.com/v3/osmbuildings.kbpalbpk/{z}/{x}/{y}.png', {
        attribution: 'Map tiles &copy; <a href="http://mapbox.com">MapBox</a>',
        maxZoom: 18,
        maxNativeZoom: 20,
        zoom: 19
      }).addTo(map);

      var osmb = new OSMBuildings(map).date(new Date('2016-02-29 10:00:00'));

      var geoJSON = {
        "type": "FeatureCollection",
        "features": [
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24465298652649,
                    8.23991593886458
                  ],
                  [
                    124.24471199512482,
                    8.23984692134977
                  ],
                  [
                    124.24469992518425,
                    8.239814403478054
                  ],
                  [
                    124.24476563930511,
                    8.239751358617099
                  ],
                  [
                    124.24490511417389,
                    8.239894702707462
                  ],
                  [
                    124.24476563930511,
                    8.240011501557522
                  ],
                  [
                    124.24465298652649,
                    8.23991593886458
                  ]
                ]
              ]
            },
            "properties": {
              "id": "1",
              "roofColor": "#ffc27c",
              "height": 6,
              "wallColor": "#ffe6c9",
              "name": "MSU-IIT Cooperative Building"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24444377422333,
                    8.239974338290775
                  ],
                  [
                    124.24415283836424,
                    8.239666413946443
                  ],
                  [
                    124.24406968988478,
                    8.239746049575722
                  ],
                  [
                    124.24436330795288,
                    8.240085828080504
                  ],
                  [
                    124.24444377422333,
                    8.239974338290775
                  ]
                ]
              ]
            },
            "properties": {
              "id": "2",
              "roofColor": "#ffc27c",
              "height": 4,
              "wallColor": "#ffe6c9",
              "name": "Main Library"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24427551799454,
                    8.240039374005278
                  ],
                  [
                    124.24424802535214,
                    8.240005528889874
                  ],
                  [
                    124.24425976001658,
                    8.23999789714777
                  ],
                  [
                    124.24402204924263,
                    8.239738086013487
                  ],
                  [
                    124.24388592713512,
                    8.23985820305976
                  ],
                  [
                    124.24415414803661,
                    8.240142236593076
                  ],
                  [
                    124.24419794348069,
                    8.24010976022246
                  ],
                  [
                    124.24421491683461,
                    8.240130374215376
                  ],
                  [
                    124.2442756856326,
                    8.240086657617484
                  ],
                  [
                    124.24425238394178,
                    8.240065587376924
                  ],
                  [
                    124.24427551799454,
                    8.240039374005278
                  ]
                ]
              ]
            },
            "properties": {
              "id": "3",
              "roofColor": "#ffc27c",
              "height": 4,
              "wallColor": "#ffe6c9",
              "name": "IDS Multi-purpose Hall"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24415548914112,
                    8.24016811814323
                  ],
                  [
                    124.2438356357161,
                    8.239829003339132
                  ],
                  [
                    124.24375852220692,
                    8.239889393667992
                  ],
                  [
                    124.24407770507969,
                    8.240233817455238
                  ],
                  [
                    124.24415548914112,
                    8.24016811814323
                  ]
                ]
              ]
            },
            "properties": {
              "id": 4,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "IDS Classrooms 1"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24395834677853,
                    8.240224526644099
                  ],
                  [
                    124.24372164183296,
                    8.239970356512018
                  ],
                  [
                    124.24361904733814,
                    8.240058619265673
                  ],
                  [
                    124.24384770565666,
                    8.240308807565675
                  ],
                  [
                    124.24395834677853,
                    8.240224526644099
                  ]
                ]
              ]
            },
            "properties": {
              "id": 5,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "IDS Classrooms 2"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24348086118698,
                    8.240120336818565
                  ],
                  [
                    124.24377930932678,
                    8.239856212169778
                  ],
                  [
                    124.24371694796719,
                    8.239791176425186
                  ],
                  [
                    124.24341519945301,
                    8.240049328450423
                  ],
                  [
                    124.24348086118698,
                    8.240120336818565
                  ]
                ]
              ]
            },
            "properties": {
              "id": 6,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "IDS Classrooms 3"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24334948533215,
                    8.239973674660993
                  ],
                  [
                    124.24362642341293,
                    8.239717513477066
                  ],
                  [
                    124.24350035958923,
                    8.239584123779355
                  ],
                  [
                    124.24322208040394,
                    8.239840285049643
                  ],
                  [
                    124.24334948533215,
                    8.239973674660993
                  ]
                ]
              ]
            },
            "properties": {
              "id": 7,
              "roofColor": "#ffc27c",
              "height": 4,
              "wallColor": "#ffe6c9",
              "name": "IDS Canteen"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24319861107506,
                    8.239985619997114
                  ],
                  [
                    124.24328913562931,
                    8.239921911533564
                  ],
                  [
                    124.24359887838364,
                    8.240298189497796
                  ],
                  [
                    124.24348890781403,
                    8.240377824999918
                  ],
                  [
                    124.24319861107506,
                    8.239985619997114
                  ]
                ]
              ]
            },
            "properties": {
              "id": 8,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "IDS Classrooms 4"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24381149583496,
                    8.24034331628431
                  ],
                  [
                    124.24362910562195,
                    8.240150200147157
                  ],
                  [
                    124.2435385810677,
                    8.240210590426976
                  ],
                  [
                    124.24372432404198,
                    8.240430251696722
                  ],
                  [
                    124.24381149583496,
                    8.24034331628431
                  ]
                ]
              ]
            },
            "properties": {
              "id": 9,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "IDS Classrooms 5"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24358551972546,
                    8.240336016363306
                  ],
                  [
                    124.2434862779919,
                    8.240408351938127
                  ],
                  [
                    124.24354461603798,
                    8.2404966145941
                  ],
                  [
                    124.24365995102562,
                    8.240418970003056
                  ],
                  [
                    124.24358551972546,
                    8.240336016363306
                  ]
                ]
              ]
            },
            "properties": {
              "id": 10,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "KASAMA Building"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24333674483933,
                    8.240434897099895
                  ],
                  [
                    124.24341917037964,
                    8.240351279834332
                  ],
                  [
                    124.243483543396,
                    8.24044153339006
                  ],
                  [
                    124.24333607428707,
                    8.240589522631733
                  ],
                  [
                    124.2429096030537,
                    8.24015418192411
                  ],
                  [
                    124.24278756254353,
                    8.240187363397403
                  ],
                  [
                    124.24288479262032,
                    8.240594831661797
                  ],
                  [
                    124.24302024417557,
                    8.24073751181805
                  ],
                  [
                    124.24294178956188,
                    8.240799892893452
                  ],
                  [
                    124.24283248954453,
                    8.240701012248094
                  ],
                  [
                    124.2428220959846,
                    8.240721584733373
                  ],
                  [
                    124.24276057281531,
                    8.240668162632236
                  ],
                  [
                    124.24279150203802,
                    8.240644106093658
                  ],
                  [
                    124.24277415149845,
                    8.240625358583278
                  ],
                  [
                    124.24265412264504,
                    8.240142236593027
                  ],
                  [
                    124.24272520118393,
                    8.240122659521989
                  ],
                  [
                    124.24271044903435,
                    8.24009246437652
                  ],
                  [
                    124.24292502575554,
                    8.240032737708358
                  ],
                  [
                    124.24306248896755,
                    8.240097773413254
                  ],
                  [
                    124.24316206597723,
                    8.240202626874103
                  ],
                  [
                    124.24314345815219,
                    8.240231162937826
                  ],
                  [
                    124.24333674483933,
                    8.240434897099895
                  ]
                ]
              ]
            },
            "properties": {
              "id": 11,
              "roofColor": "#ffc27c",
              "height": 6,
              "wallColor": "#ffe6c9",
              "name": "College of Arts and Social Sciences"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24383633770049,
                    8.241367958404068
                  ],
                  [
                    124.2439717054367,
                    8.241338758794885
                  ],
                  [
                    124.24383759498596,
                    8.240494623707336
                  ],
                  [
                    124.24372904933989,
                    8.24052913240975
                  ],
                  [
                    124.24365662969649,
                    8.24052913240975
                  ],
                  [
                    124.24365394748747,
                    8.240574259169904
                  ],
                  [
                    124.24360834993422,
                    8.240584877230367
                  ],
                  [
                    124.24360298551619,
                    8.240619385924907
                  ],
                  [
                    124.24352251924574,
                    8.24063531301368
                  ],
                  [
                    124.24352251924574,
                    8.24068840330495
                  ],
                  [
                    124.24342864193022,
                    8.24070698490522
                  ],
                  [
                    124.2434071842581,
                    8.240664512674767
                  ],
                  [
                    124.24331062473357,
                    8.240717602962121
                  ],
                  [
                    124.24332940019667,
                    8.240773347756187
                  ],
                  [
                    124.24302631057799,
                    8.240879528294558
                  ],
                  [
                    124.24296193756163,
                    8.240810510947846
                  ],
                  [
                    124.24289488233626,
                    8.240868910241996
                  ],
                  [
                    124.24301826395094,
                    8.24101490843967
                  ],
                  [
                    124.24349837936461,
                    8.240807856434277
                  ],
                  [
                    124.24373441375792,
                    8.240770693242363
                  ],
                  [
                    124.24383633770049,
                    8.241367958404068
                  ]
                ]
              ]
            },
            "properties": {
              "id": 12,
              "roofColor": "#ffc27c",
              "height": 4,
              "wallColor": "#ffe6c9",
              "name": "College of Business Administration and Accountanc"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.2445832490921,
                    8.241301595652832
                  ],
                  [
                    124.24441695213318,
                    8.24039375209841
                  ],
                  [
                    124.24393826164305,
                    8.24047338758127
                  ],
                  [
                    124.24406700767577,
                    8.241301595652832
                  ],
                  [
                    124.24409919418395,
                    8.241301595652832
                  ],
                  [
                    124.24410992302,
                    8.241405121539865
                  ],
                  [
                    124.2445832490921,
                    8.241301595652832
                  ]
                ]
              ]
            },
            "properties": {
              "id": 13,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "School of Engineering Technology"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.2447005957365,
                    8.240900100770574
                  ],
                  [
                    124.24460336565971,
                    8.2403638887882
                  ],
                  [
                    124.24448132514954,
                    8.24038313403282
                  ],
                  [
                    124.24458526074886,
                    8.240920673245524
                  ],
                  [
                    124.2447005957365,
                    8.240900100770574
                  ]
                ]
              ]
            },
            "properties": {
              "id": 14,
              "roofColor": "#ffc27c",
              "height": 4,
              "wallColor": "#ffe6c9",
              "name": "School of Computer Studies"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24459397792816,
                    8.2409618181922
                  ],
                  [
                    124.24471199512482,
                    8.241641372821627
                  ],
                  [
                    124.24482062458992,
                    8.24162146401118
                  ],
                  [
                    124.24470998346806,
                    8.24094323660389
                  ],
                  [
                    124.24459397792816,
                    8.2409618181922
                  ]
                ]
              ]
            },
            "properties": {
              "id": 15,
              "roofColor": "#ffc27c",
              "height": 8,
              "wallColor": "#ffe6c9",
              "name": "Information and Communications Technology Center"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24479251378216,
                    8.242095293427706
                  ],
                  [
                    124.24472545855679,
                    8.241959913652265
                  ],
                  [
                    124.24460274749435,
                    8.241348713207335
                  ],
                  [
                    124.24431977444328,
                    8.241405121539865
                  ],
                  [
                    124.24433486186899,
                    8.241469493391856
                  ],
                  [
                    124.24428021186031,
                    8.241480775055576
                  ],
                  [
                    124.24430166953243,
                    8.241665927019799
                  ],
                  [
                    124.24423394375481,
                    8.24167654505099
                  ],
                  [
                    124.24425674253143,
                    8.241804625029392
                  ],
                  [
                    124.24432513886131,
                    8.241794670628316
                  ],
                  [
                    124.24435397260822,
                    8.241965554477224
                  ],
                  [
                    124.24440459930338,
                    8.241951452414884
                  ],
                  [
                    124.24441650160588,
                    8.242020054796015
                  ],
                  [
                    124.24436612636782,
                    8.24203975620319
                  ],
                  [
                    124.24439309514128,
                    8.242201297335576
                  ],
                  [
                    124.24442542833276,
                    8.242192950163982
                  ],
                  [
                    124.24443645053543,
                    8.242229345904704
                  ],
                  [
                    124.24479251378216,
                    8.242095293427706
                  ]
                ]
              ]
            },
            "properties": {
              "id": 16,
              "roofColor": "#ffc27c",
              "height": 6,
              "wallColor": "#ffe6c9",
              "name": "College of Science and Mathematics"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24397779279388,
                    8.241462193491653
                  ],
                  [
                    124.244089104468,
                    8.242082684528949
                  ],
                  [
                    124.24391140812077,
                    8.242114538588066
                  ],
                  [
                    124.24392783665098,
                    8.24221474613216
                  ],
                  [
                    124.24379137926735,
                    8.242237973042679
                  ],
                  [
                    124.24373739981093,
                    8.241927064140956
                  ],
                  [
                    124.2436834203545,
                    8.241937350351886
                  ],
                  [
                    124.24364653998055,
                    8.241750207634313
                  ],
                  [
                    124.24383630626835,
                    8.241717689919005
                  ],
                  [
                    124.24379540258087,
                    8.241495374855178
                  ],
                  [
                    124.24397779279388,
                    8.241462193491653
                  ]
                ]
              ]
            },
            "properties": {
              "id": 17,
              "roofColor": "#ffc27c",
              "height": 8,
              "wallColor": "#ffe6c9",
              "name": "College of Engineering"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24375516944565,
                    8.241705744635173
                  ],
                  [
                    124.24374175840057,
                    8.241616818621939
                  ],
                  [
                    124.24361636512913,
                    8.241638718313629
                  ],
                  [
                    124.24363514059223,
                    8.241728971575663
                  ],
                  [
                    124.24369549029507,
                    8.241716362665267
                  ],
                  [
                    124.24375516944565,
                    8.241705744635173
                  ]
                ]
              ]
            },
            "properties": {
              "id": 18,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "College of Engineering EC Office"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24354260438122,
                    8.240946554744774
                  ],
                  [
                    124.24360630684532,
                    8.241446930063502
                  ],
                  [
                    124.24358954303898,
                    8.241448257318194
                  ],
                  [
                    124.24361167126335,
                    8.241638054686645
                  ],
                  [
                    124.24342190497555,
                    8.241658627123197
                  ],
                  [
                    124.24339441233315,
                    8.24146086623705
                  ],
                  [
                    124.24324420862831,
                    8.241470157019094
                  ],
                  [
                    124.24321470432915,
                    8.241310222811123
                  ],
                  [
                    124.2432016285602,
                    8.241287659473711
                  ],
                  [
                    124.24318318837322,
                    8.24117484276714
                  ],
                  [
                    124.24316106014885,
                    8.241159247514034
                  ],
                  [
                    124.24315234296955,
                    8.241122416168958
                  ],
                  [
                    124.24314697855152,
                    8.241068662307901
                  ],
                  [
                    124.24314496689476,
                    8.241031499140542
                  ],
                  [
                    124.24322208040394,
                    8.241021544720153
                  ],
                  [
                    124.24323884421028,
                    8.24100097225041
                  ],
                  [
                    124.24329014145769,
                    8.240996658667918
                  ],
                  [
                    124.24329047673382,
                    8.24097641801099
                  ],
                  [
                    124.24339307122864,
                    8.240960490935944
                  ],
                  [
                    124.24354260438122,
                    8.240946554744774
                  ]
                ]
              ]
            },
            "properties": {
              "id": 19,
              "roofColor": "#ffc27c",
              "height": 8,
              "wallColor": "#ffe6c9",
              "name": "College of Nursing"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24366732710041,
                    8.241409766931586
                  ],
                  [
                    124.24374175840057,
                    8.241389194482094
                  ],
                  [
                    124.24381082528271,
                    8.241375258306013
                  ],
                  [
                    124.24375785165466,
                    8.241054062492598
                  ],
                  [
                    124.24371627741493,
                    8.24080719280588
                  ],
                  [
                    124.24353958689608,
                    8.240827101657292
                  ],
                  [
                    124.24364452832378,
                    8.241616818621939
                  ],
                  [
                    124.24371560686268,
                    8.241612836859694
                  ],
                  [
                    124.2437095718924,
                    8.241505329263697
                  ],
                  [
                    124.2436747031752,
                    8.241507983772573
                  ],
                  [
                    124.24366732710041,
                    8.241409766931586
                  ]
                ]
              ]
            },
            "properties": {
              "id": 20,
              "roofColor": "#ffc27c",
              "height": 4,
              "wallColor": "#ffe6c9",
              "name": "College of Business Administration and Accountancy Extension"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24435397260822,
                    8.24241715202129
                  ],
                  [
                    124.24442907446064,
                    8.242865762737521
                  ],
                  [
                    124.24434223794378,
                    8.242880362486034
                  ],
                  [
                    124.24434391432442,
                    8.24292947072698
                  ],
                  [
                    124.24410033621825,
                    8.242975260838044
                  ],
                  [
                    124.24408742808737,
                    8.242925488977978
                  ],
                  [
                    124.24402624019422,
                    8.2429380978498
                  ],
                  [
                    124.243954323465,
                    8.242491478092303
                  ],
                  [
                    124.24435397260822,
                    8.24241715202129
                  ]
                ]
              ]
            },
            "properties": {
              "id": 21,
              "roofColor": "#ffc27c",
              "height": 8,
              "wallColor": "#ffe6c9",
              "name": "MSU-IIT Gymnasium"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24344599246979,
                    8.242587040163036
                  ],
                  [
                    124.24340844154358,
                    8.242411179389977
                  ],
                  [
                    124.24345403909683,
                    8.242401225004256
                  ],
                  [
                    124.24344398081303,
                    8.242351453071928
                  ],
                  [
                    124.24339771270752,
                    8.242361407458896
                  ],
                  [
                    124.24336016178131,
                    8.242199482733028
                  ],
                  [
                    124.24310266971588,
                    8.242253900066313
                  ],
                  [
                    124.243124127388,
                    8.2423494621945
                  ],
                  [
                    124.2431589961052,
                    8.242340171433028
                  ],
                  [
                    124.24324817955494,
                    8.242323580787053
                  ],
                  [
                    124.24325957894325,
                    8.242383970735064
                  ],
                  [
                    124.24321398139,
                    8.242394588746965
                  ],
                  [
                    124.2432226985693,
                    8.242441706171322
                  ],
                  [
                    124.2432676255703,
                    8.242431088160679
                  ],
                  [
                    124.24327701330185,
                    8.242475551078247
                  ],
                  [
                    124.24315094947815,
                    8.24250209610129
                  ],
                  [
                    124.24317508935928,
                    8.242630839437794
                  ],
                  [
                    124.24324214458466,
                    8.242618894181492
                  ],
                  [
                    124.24344599246979,
                    8.242587040163036
                  ]
                ]
              ]
            },
            "properties": {
              "id": 22,
              "roofColor": "#ffc27c",
              "height": 6,
              "wallColor": "#ffe6c9",
              "name": "College of Education"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24457126297057,
                    8.240357252496725
                  ],
                  [
                    124.2445404175669,
                    8.240167454513777
                  ],
                  [
                    124.24444654025137,
                    8.240184045250157
                  ],
                  [
                    124.24448275007308,
                    8.240372515966913
                  ],
                  [
                    124.24457126297057,
                    8.240357252496725
                  ]
                ]
              ]
            },
            "properties": {
              "id": 23,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "University Clinic"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.2446905374527,
                    8.240080519043593
                  ],
                  [
                    124.24461007118225,
                    8.239953102136784
                  ],
                  [
                    124.24443572759628,
                    8.240124982225389
                  ],
                  [
                    124.24444519914687,
                    8.240174754437822
                  ],
                  [
                    124.2446168186143,
                    8.240144891111113
                  ],
                  [
                    124.2446905374527,
                    8.240080519043593
                  ]
                ]
              ]
            },
            "properties": {
              "id": 24,
              "roofColor": "#ffc27c",
              "height": 4,
              "wallColor": "#ffe6c9",
              "name": "Security Office"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24451351165771,
                    8.239852230389811
                  ],
                  [
                    124.24454033374786,
                    8.239868157509461
                  ],
                  [
                    124.24472272396088,
                    8.239714195325927
                  ],
                  [
                    124.24467980861664,
                    8.239655795861324
                  ],
                  [
                    124.24448668956757,
                    8.239820376148577
                  ],
                  [
                    124.24451351165771,
                    8.239852230389811
                  ]
                ]
              ]
            },
            "properties": {
              "id": 25,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "Guard House"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.2438805103302,
                    8.239523069773373
                  ],
                  [
                    124.24428820610046,
                    8.239177981736317
                  ],
                  [
                    124.24422919750214,
                    8.239093036942572
                  ],
                  [
                    124.24379736185074,
                    8.239438125053699
                  ],
                  [
                    124.2438805103302,
                    8.239523069773373
                  ]
                ]
              ]
            },
            "properties": {
              "id": 26,
              "roofColor": "#ffc27c",
              "height": 4,
              "wallColor": "#ffe6c9",
              "name": "Administration Building"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24240529537201,
                    8.242506741480138
                  ],
                  [
                    124.24238383769989,
                    8.242405870384285
                  ],
                  [
                    124.24231946468353,
                    8.242395252372715
                  ],
                  [
                    124.2422765493393,
                    8.242342162310507
                  ],
                  [
                    124.24216389656067,
                    8.242368707342495
                  ],
                  [
                    124.24217462539673,
                    8.242400561378533
                  ],
                  [
                    124.2421156167984,
                    8.242416488395591
                  ],
                  [
                    124.24214780330658,
                    8.242533286501082
                  ],
                  [
                    124.24224972724915,
                    8.242522668492908
                  ],
                  [
                    124.24227118492126,
                    8.242538595505055
                  ],
                  [
                    124.24240529537201,
                    8.242506741480138
                  ]
                ]
              ]
            },
            "properties": {
              "id": 27,
              "roofColor": "#ffc27c",
              "height": 6,
              "wallColor": "#ffe6c9",
              "name": "Bahay Alumni"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24298465251923,
                    8.243690647682094
                  ],
                  [
                    124.24303829669952,
                    8.24354199597686
                  ],
                  [
                    124.24313485622406,
                    8.243547304967295
                  ],
                  [
                    124.2430704832077,
                    8.243711883635429
                  ],
                  [
                    124.24298465251923,
                    8.243690647682094
                  ]
                ]
              ]
            },
            "properties": {
              "id": 28,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "Alumni Office"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.2428183555603,
                    8.243823372371695
                  ],
                  [
                    124.24293100833893,
                    8.243770282501197
                  ],
                  [
                    124.24295246601105,
                    8.243812754398176
                  ],
                  [
                    124.24290955066681,
                    8.243828681358352
                  ],
                  [
                    124.2429792881012,
                    8.243945479046785
                  ],
                  [
                    124.24290418624878,
                    8.243982641940427
                  ],
                  [
                    124.2428183555603,
                    8.243823372371695
                  ]
                ]
              ]
            },
            "properties": {
              "id": 29,
              "roofColor": "#ffc27c",
              "height": 4,
              "wallColor": "#ffe6c9",
              "name": "IPDM"
            }
          },
          {
            "type": "Feature",
            "geometry": {
              "type": "Polygon",
              "coordinates": [
                [
                  [
                    124.24314625561237,
                    8.242567795025666
                  ],
                  [
                    124.24308121204376,
                    8.242232000408707
                  ],
                  [
                    124.24300611019135,
                    8.24224660018059
                  ],
                  [
                    124.24307584762573,
                    8.242581067534294
                  ],
                  [
                    124.24314625561237,
                    8.242567795025666
                  ]
                ]
              ]
            },
            "properties": {
              "id": 30,
              "roofColor": "#ffc27c",
              "height": 2,
              "wallColor": "#ffe6c9",
              "name": "College of Education Extension"
            }
          }
        ]
      };

      new OSMBuildings(map).set(geoJSON);

      //********************************************************

      var name = 'none',
          wallColor = '#ff0000',
          roofColor = '#ff8000',
          height = 10,
          feature;

      function setWallColor(el) {
        wallColor = String(el.value);
        setGeoJson();
      }

      function setRoofColor(el) {
        roofColor = String(el.value);
        setGeoJson();
      }

      function setHeight(el) {
        height = parseInt(el.value);
        setGeoJson();
      }

      function setGeoJson() {
        if (!feature) {
          return;
        }
        feature.properties = {
          name: name,
          wallColor: wallColor,
          roofColor: roofColor,
          height: height
        };
        var geoJson = {
          type: 'FeatureCollection',
          features: [feature]
        };
        osmb.set(geoJson);
      }

      document.addEventListener('DOMContentLoaded', function() {
        var drawControl = new L.Control.Draw({
          draw: {
            polyline: false,
            polygon: {
              allowIntersection: false,
              shapeOptions: { wallColor:wallColor }
            },
            rectangle: {
              shapeOptions: { wallColor:wallColor }
            },
            circle: false,
            marker: false
          }
        });
        map.addControl(drawControl);

        map.on('draw:created', function (e) {
          feature = e.layer.toGeoJSON();
          setGeoJson();
        });
      });
  </script>
@endsection
