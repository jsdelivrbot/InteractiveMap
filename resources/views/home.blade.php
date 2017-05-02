<!-- Front Map Main -->
@extends('layouts.app2')

@section('contentheader_title')
    Index
@endsection

@section('added-css')
  <link href="{{ asset('/js/OSMBuildings/OSMBuildings.css') }}" rel="stylesheet" type="text/css" />   
  <style type="text/css">
    #b-map{
      width: 100% !important;
      height: 600px;
      z-index: 1;
    }
    .search{
      position: absolute; top:24px;right:24px;z-index: 2; width:320px;
    }
    .twitter-typeahead {
      width: 100% !important;
    }
    .imgmini {
        height: 70px;
        width: 70px;
    }
    .desc {
      display: block;/* required for overflow*/
      height:2.6em; /**/
      font-size: 12px;
      white-space: nowrap; /* required for overflow*/
      width:220px; /* required for overflow*/
      overflow: hidden;/* required for overflow*/
      text-overflow: ellipsis;/* required for overflow*/
    }
    #namebox {
      background-color: white;
      box-shadow: rgba(0, 0, 0, 0.298039) 0 1px 4px -1px;
      color: rgb(86, 86, 86);
      font-size: 15px;
      margin-top: 30px;
      margin-left: 30px;
      padding: 8px;
      position: absolute;
      z-index: 2;
      height: 40px;
      width: 300px;
      white-space: nowrap;
      display: block;
      overflow: hidden;/* required for overflow*/
      text-overflow: ellipsis;/* required for overflow*/
    }
  </style>

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
    <div id='b-map'>
        @include('extra.search')
    </div>
  @include('extra.buildmodal')

  <div id="namebox">
    <span id="preview-name"></span>
  </div>
@endsection

@section('added-js')
  @yield('divdepscript')
  <script src="{{ asset('/js/appbase/table.js') }}"></script>

  <script src="{{ asset('/js/OSMBuildings/OSMBuildings.js') }}"></script>
  <script src="{{ asset('/js/appbase/main.js') }}"></script>
    <!-- <script src="{{ asset('/js/appbase/search.js') }}"></script> -->
  <script type="text/javascript">appglobal.frontMap =true;</script>

@endsection