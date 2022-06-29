<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Restoku</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/bower_components/font-awesome/css/font-awesome.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/bower_components/Ionicons/css/ionicons.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/dist/css/AdminLTE.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/dist/css/skins/_all-skins.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/bower_components/jvectormap/jquery-jvectormap.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap-daterangepicker/daterangepicker.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>">
		<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		<style>
			.button {
					background-color: #99CC00;
					border: none;
					color: white;
					padding-top: 8px;
				padding-bottom: 8px;
				padding-right:15px;
				padding-left:15px;
					text-align: center;
					text-decoration: none;
					display: inline-block;
					font-size: 14px;
					margin: 4px 2px;
			}

			.button1 {border-radius: 2px;}
			.button2 {border-radius: 4px;}
			.button3 {border-radius: 8px;}
			.button4 {border-radius: 12px;}
			.button5 {border-radius: 10%;}

			#image-preview {
				height: 200px;
				width: 300px;
				position: relative;
				overflow: hidden;
				background-color: #ffffff;
				color: #ecf0f1;
			}
			#image-preview input {
				line-height: 200px;
				font-size: 200px;
				position: absolute;
				opacity: 0;
				z-index: 10;
			}
			#image-preview label {
				position: absolute;
				z-index: 5;
				opacity: 0.8;
				cursor: pointer;
				background-color: #bdc3c7;
				width: 200px;
				height: 50px;
				font-size: 20px;
				line-height: 50px;
				text-transform: uppercase;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				margin: auto;
				text-align: center;
			}
			#image-preview1{
				display:none;
				width : 250px;
				height : 300px;
			}
					
			h1 {
			font-size: 20px;
			text-align: center;
			margin: 20px 0 20px;
			}
			h1 small {
			display: block;
			font-size: 15px;
			padding-top: 8px;
			color: gray;
			}
			.avatar-upload {
			position: relative;
			max-width: 205px;
			margin: 50px auto;
			}
			.avatar-upload .avatar-edit {
			position: absolute;
			right: 12px;
			z-index: 1;
			top: 10px;
			}
			.avatar-upload .avatar-edit input {
			display: none;
			}
			.avatar-upload .avatar-edit input + label {
			display: inline-block;
			width: 34px;
			height: 34px;
			margin-bottom: 0;
			border-radius: 100%;
			background: #FFFFFF;
			border: 1px solid transparent;
			box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
			cursor: pointer;
			font-weight: normal;
			transition: all 0.2s ease-in-out;
			}
			.avatar-upload .avatar-edit input + label:hover {
			background: #f1f1f1;
			border-color: #d6d6d6;
			}
			.avatar-upload .avatar-edit input + label:after {
			content: "\f040";
			font-family: 'FontAwesome';
			color: #757575;
			position: absolute;
			top: 10px;
			left: 0;
			right: 0;
			text-align: center;
			margin: auto;
			}
			.avatar-upload .avatar-preview {
			width: 192px;
			height: 192px;
			position: relative;
			border-radius: 100%;
			border: 6px solid #F8F8F8;
			box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
			}
			.avatar-upload .avatar-preview > div {
			width: 100%;
			height: 100%;
			border-radius: 100%;
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			}
			.avatar-upload1 .avatar-preview1 {
			width: 192px;
			height: 192px;
			position: relative;
			border: 6px solid #F8F8F8;
			box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
			}
			.avatar-upload1 .avatar-preview1 > div {
			width: 100%;
			height: 100%;
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			}
			.avatar-upload1 {
			position: relative;
			max-width: 205px;
			/* margin: 50px auto; */
			}
		</style>
		<script src="<?php echo base_url('asset/new/js/jquery.min.js')?>" charset="utf-8"></script>
		<script>
			$(function() {
				$('.sidebar-menu a[href~="' + location.href + '"]').parents('li').addClass('active');
			});
		</script>
		<script src="<?php echo base_url('asset/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
		<script src="<?php echo base_url('asset/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('asset/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<script src="<?php echo base_url('asset/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<!-- ChartJS -->
		<!-- <script src="<?php echo base_url('asset/bower_components/Chart.js/Chart.js') ?>"></script> -->
		
	<script src="<?php echo base_url('asset/js/Chart.bundle.min.js');?>"></script>
		<script src="<?php echo base_url('asset/js/moment.min.js');?>"></script>
		<script src="<?php echo base_url('asset/bower_components/raphael/raphael.min.js')?>"></script>
		<script src="<?php echo base_url('asset/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
		<script src="<?php echo base_url('asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
		<script src="<?php echo base_url('asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/new/datatables.min.js') ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('asset/new/js/jquery.mask.js') ?>"></script>

	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
