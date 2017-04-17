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
    <small>Datalist regarding buildings in IIT</small>
  </h1>
</section>
@endsection

@section('main-content')
  @include('extra.table')

  @include('extra.buildmodal')

@endsection

@section('added-js')
  <script src="{{ asset('/js/OSMBuildings/OSMBuildings.js') }}"></script>
  <script src="{{ asset('/js/appbase/main.js') }}"></script>
  <!-- <script type="text/javascript">appglobal.frontMap =true;</script> -->
@endsection