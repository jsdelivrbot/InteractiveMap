<!-- Front Map Main -->
@extends('layouts.app')

@section('contentheader_title')
	Index
@endsection

@section('added-css')
  <link href="{{ asset('/js/OSMBuildings/OSMBuildings.css') }}" rel="stylesheet" type="text/css" />   

@endsection

@section('content-header')
 <section class="content-header">
  <h1>
    Front Map
    <small>Front page view of the application</small>
  </h1>
</section>
@endsection

@section('main-content')
  <div class="box box-solid" >
    <div id='b-map' style="width: 100% !important;
        height: 600px;
        z-index: 1;">
    </div>
  </div>

  @include('extra.buildmodal')
@endsection

@section('added-js')
  <script src="{{ asset('/js/OSMBuildings/OSMBuildings.js') }}"></script>
  <script src="{{ asset('/js/appbase/main.js') }}"></script>
  <script type="text/javascript">appglobal.frontMap =true;</script>
@endsection