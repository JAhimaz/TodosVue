@extends('layouts.master')


<style>
.todos-title{
	text-align: center;
	margin-bottom: 2rem;
	font-size: 7rem;
	font-weight: 100;
}

.todos-wrapper{
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 25px 50px 0 rgba(0, 0, 0, 0.1);
	background: #fff;
}

.todos-list{
	margin: 0;
	padding: 0;
	list-style: none;
.todos-list-item{
		background: transparent;
		word-break: break-all;
		margin: 0;
		padding: 15px 60px 15px 15px;
		display: block;
		line-height: 1.2;
		transition: color 0.4s;
		font-size: 30px;
		font-weight: 300;
		.todos-list-item-link{
			color: #343a40;
			text-decoration: none !important;
		}
	}
}

</style>

@section('master')
	<div class="container col-md-4 col-md-offset-4" id="app">
		<todos></todos>
		<a class="btn btn-danger btn-lg btn-block" href="{{route('logout')}}" role="button">Log Out</a>
	</div>

@endsection
