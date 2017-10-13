@extends('layouts.container')
@section('panel')

@endsection
@section('content')
<style>
	.hov_item_a{
		transition:background-color 0.5s;
		-webkit-transition:background-color 0.5s;
		-moz-transition:background-color 0.5s;
	}
	.hov_item_a:hover{
		background-color: #A2D9CE;
	}
</style>
<div class="container-fluid" style="margin-top: -4em;">
<div class="row">	
<nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
  <ul class="nav nav-pills flex-column">
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">Overview <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">Reports</a>
    </li>
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">Analytics</a>
    </li>
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">Export</a>
    </li>
  </ul>

  <ul class="nav nav-pills flex-column">
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">Nav item</a>
    </li>
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">Nav item again</a>
    </li>
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">One more nav</a>
    </li>
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">Another nav item</a>
    </li>
  </ul>

  <ul class="nav nav-pills flex-column">
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">Nav item again</a>
    </li>
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">One more nav</a>
    </li>
    <li class="nav-item">
      <a class="nav-link hov_item_a" href="#">Another nav item</a>
    </li>
  </ul>
</nav>
</div>
</div>
@endsection