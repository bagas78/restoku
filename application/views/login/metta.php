<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pilih Meja</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('asset/dist/css/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/font-awesome/css/font-awesome.min.css')?>">
  <link rel="stylesheet" href="<?php echo base_url('asset/bower_components/ionicons/css/ionicons.min.css')?>">
   <style>
  .panel-transparent {
        background: none;
    }

    .panel-transparent .panel-body{
        background: rgba(46, 51, 56, 0.2)!important;
    }

	.box1 input:focus,.box1 input:active,.box1 button:focus,.box1 button:active{
  outline:none;
}
.box1 button{
  background:#742ECC;
  border:0;
  color:#fff;
  padding:10px;
  font-size:14px;
  width:100%;
  margin:20px auto;
  display:block;
  cursor:pointer;
}
.box1 button:active{
  background:#27ae60;
}

.gambar img{
	width:50%;
	margin:20px auto;
}   

/* login  */
@import url('https://rsms.me/inter/inter-ui.css');
::selection {
  background: #2D2F36;
}
::-webkit-selection {
  background: #2D2F36;
}
::-moz-selection {
  background: #2D2F36;
}
body {
  background: white;
  font-family: 'Inter UI', sans-serif;
  margin: 0;
  padding: 20px;
}
.page {
  /* background: #e2e2e5; */
  margin-top: 10%;
  display: flex;
  flex-direction: column;
  /*height: calc(100% - 40px);*/
  position: absolute;
  place-content: center;
  width: calc(100% - 40px);
}
@media (max-width: 767px) {
  .page {
    height: auto;
    margin-bottom: 20px;
    padding-bottom: 20px;
    margin-top: 100px;
  }
}
.container1 {
  display: flex;
  height: 300px;
  margin: 0 auto;
  width: 600px;
	justify-content: center;
}
@media (max-width: 767px) {
  .container1 {
    /* flex-direction: column; */
    /* height: 630px; */
    width: 265px;
		justify-content: center;
  }
}
.container {
  display: flex;
  height: 320px;
  margin: 0 auto;
  width: 640px;
}
@media (max-width: 767px) {
  .container {
    flex-direction: column;
    height: 630px;
    width: 320px;
  }
}
.left {
  background: rgba(255, 255, 255, 0.6);
  height: calc(100% - 40px);
  top: 20px;
  position: relative;
  width: 50%;
	/* height:100%; */
}
@media (max-width: 767px) {
  .left {
    height: 100%;
    left: 20px;
    width: calc(100% - 40px);
    max-height: 270px;
  }
}
.login {
  font-size: 30px;
  font-weight: 500;
  margin: 20px 40px 40px;
}
.eula {
  color: #000000;
  font-size: 14px;
  line-height: 1.5;
  margin: 35px;
	margin-top:5px;
}
.eula1 {
  color: #999;
  font-size: 14px;
  line-height: 1.5;
	/* margin: 35px; */
	margin-top:5px;
	margin-right:10px;
	margin-left:10px;
}
.right {
  background: #474A59;
  box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
  color: #F1F1F2;
  position: relative;
  width: 50%;
}
@media (max-width: 767px) {
  .right {
    flex-shrink: 0;
    height: 100%;
    width: 100%;
    max-height: 350px;
  }
}
svg {
  position: absolute;
  width: 320px;
}
path {
  fill: none;
  stroke: url(#linearGradient);;
  stroke-width: 4;
  stroke-dasharray: 240 1386;
}
.form {
  margin: 40px;
  position: absolute;
}

.form1 {
  margin: 30px;
}
label {
  color:  #c2c2c5;
  display: block;
  font-size: 14px;
  height: 16px;
  margin-top: 20px;
  margin-bottom: 5px;
}
input {
  background: transparent;
  border: 0;
  color: #f2f2f2;
  font-size: 20px;
  height: 30px;
  line-height: 30px;
  outline: none !important;
  width: 100%;
}
input::-moz-focus-inner { 
  border: 0; 
}
#submit {
  color: #707075;
  margin-top: 40px;
  transition: color 300ms;
}
#submit:focus {
  color: #f2f2f2;
}
#submit:active {
  color: #d0d0d2;
}
#btnn {
  color: #707075;
  margin-top: 40px;
  transition: color 300ms;
}
#btnn:focus {
  color: #f2f2f2;
}
#btnn:active {
  color: #0066FF;
}
  </style>

<script src="<?php echo base_url('asset/new/js/jquery.min.js')?>" defer charset="utf-8"></script>

</head>
<body class="hold-transition login-page" style="background: url('asset/image/3.jpg') no-repeat center center fixed;-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;-o-background-size: cover; height:0%;">

