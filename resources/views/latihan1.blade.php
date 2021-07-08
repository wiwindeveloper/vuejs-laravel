<!DOCTYPE html>
<html>
<head>
	<title>Laravel Vue SPA</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<style type="text/css">
		body{
			font-family: sans-serif;
			margin: 15%
		}

	</style>
</head>
<body>
	<div id="app">
		<h1 v-text="'Hello, ' +title"></h1>
		<header-component></header-component>
		<router-view></router-view>
		<footer-component></footer-component>
	</div>

	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>