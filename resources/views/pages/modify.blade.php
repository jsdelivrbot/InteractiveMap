<!-- Back Building List -->

@extends('layouts.app')

@section('contentheader_title')
	Modify Building
@endsection

@section('added-css')
  <!-- <link href="{{ asset('/js/OSMBuildings/OSMBuildings.css') }}" rel="stylesheet" type="text/css" /> -->
  <link rel="stylesheet" type="text/css" href="http://cdn.osmbuildings.org/Leaflet.draw/0.2.0/leaflet.draw.css">
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">

  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css">
  <style type="text/css">
    .desc {
      height:2.6em;
      font-size: 12px;
      width:inherit;
      overflow: hidden;
      text-overflow:ellipsis;
    }
    .map_info{
      position: absolute; top:12px;right:12px;z-index: 2; width:320px;
    }
    .img-header{
      height:inherit;
      width: inherit;
    }
  </style>

@endsection

@section('content-header')
 <section class="content-header">
  <h1>
    Building List
    <small>Datalist regarding buildings in IIT</small>
  </h1>
</section>
@endsection

@section('main-content')
	@include('extra.table')
@endsection

@section('subcontents')
	@include('extra.modifymodal')

@endsection

@section('added-js')
	<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
	<script src="{{ asset('/js/osmbuildings-leaflet/OSMBuildings-Leaflet.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.2.3/leaflet.draw.js" type="text/javascript"></script>
	  
	<script src="{{ asset('/js/appbase/addedit.js')}}"></script> <!-- main.js for displays -->
  
  <script src="{{ asset('/validator/validator.min.js')}}"></script> <!-- main.js for displays -->


	<script src="{{ asset('/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script> <!-- colorpicker -->

	<!-- main.js for displays -->
	<!-- <script src="{{asset('/js/appbase/formHelper.js')}}"></script>  -->
	<!-- <script type="text/javascript">console.log("Leaflet",L.Control.Draw);</script> -->


@endsection