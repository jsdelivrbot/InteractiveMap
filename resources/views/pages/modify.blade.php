<!-- Back Building List -->

@extends('layouts.app')

@section('contentheader_title')
	Modify Building
@endsection

@section('added-css')
  <link href="{{ asset('/css/leaflet.css') }}" rel="stylesheet">
  <link href="{{ asset('/css/leaflet.draw.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
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
  <div class="box box-warning" id="con-warning" hidden>
    <div class="box-body">Cannot reach Database server at the moment. Try again later?.</div>
  </div>
  @include('extra.table')

@endsection

@section('subcontents')
	@include('extra.modifymodal')
@endsection

@section('added-js')
  <script src="{{ asset('/js/appbase/table.js') }}"></script>

	<script src="{{ asset('/js/osmbuildings-leaflet/leaflet.js') }}"></script>
	<script src="{{ asset('/js/osmbuildings-leaflet/OSMBuildings-Leaflet.js') }}"></script>
  <script src="{{ asset('/js/osmbuildings-leaflet/leaflet.draw.js') }}"></script>
	  
	<script src="{{ asset('/js/appbase/addedit.js')}}"></script> <!-- main.js for displays -->
  
  <script src="{{ asset('/validator/validator.min.js')}}"></script> <!-- main.js for displays -->


	<script src="{{ asset('/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script> <!-- colorpicker -->

	<!-- main.js for displays -->
	<!-- <script type="text/javascript">console.log("Leaflet",L.Control.Draw);</script> -->


@endsection