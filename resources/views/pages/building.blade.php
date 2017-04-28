<!-- Back Building List -->

@extends('layouts.app')

@section('contentheader_title')
	Index
@endsection

@section('added-css')
  <link href="{{ asset('/js/OSMBuildings/OSMBuildings.css') }}" rel="stylesheet" type="text/css" />   
<style type="text/css">
    .desc {
      height:2.6em;
      font-size: 12px;
      width:inherit;
      overflow: hidden;
      text-overflow:ellipsis;
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
    <small>Datalist regarding buildings in IIT, has been edited for mockup purposes. refer to modify building page for original design</small>
  </h1>
</section>
@endsection

@section('main-content')
  {{-- this is comment. use for exclusion
    @include('extra.table')
  --}}
  @include('extra.newtable')

  @include('extra.buildmodal')

@endsection

@section('added-js')
  <script src="{{ asset('/js/appbase/table.js') }}"></script> <!-- change this -->
  <!-- <script src="{{ asset('/js/appbase/newtable.js') }}"></script> -->
  <script src="{{ asset('/js/OSMBuildings/OSMBuildings.js') }}"></script>
  <script src="{{ asset('/js/appbase/main.js') }}"></script>
  <!-- <script type="text/javascript">appglobal.frontMap =true;</script> -->
  @yield('testscript')
@endsection