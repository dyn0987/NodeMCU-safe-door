<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery gesture.password.js Plugin Demo</title>
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
 
<style>
   body {
    background-color: #001f3f;
}

  </style>
 <body background="Cybersecurity_image.jpg">
  <!--<link rel="stylesheet" href="../dist/css/danmuplayer.css">-->
</head>
<body>
<center>
<form action="" method="get">
<h1 style="font-family:georgia,garamond,serif;font-style:italic;color:#F0FFFF; margin:150px auto 20px auto" > Smart Safe Unlock System</h1>
<h2 style="font-family:Agency FB;color:#F0FFFF">Reset your pattern below </h2>
<div id="gesturepwd"></div>
<center>
<input class="MyButtons" type="button" value="Back" onclick="window.location.href='index7.html';" />
</center>
 </form>

	</center>			


</body>
<script src="jquery-2.1.4.min.js"></script>
<script src="../src/jquery.gesture.password.js"></script>

<!--<script src="../dist/js/danmuplayer.min.js"></script>-->

<script>
  $("#gesturepwd").GesturePasswd({
backgroundColor:"#000000",  
color:"#FFFFFF",   
roundRadii:50,    
pointRadii:12, 
space:60,  
width:480,   
height:480,  
lineColor:"#ECF0F1",   
zindex :100 
});
  $("#gesturepwd").on("hasPasswd",function(e,passwd){
    var result;
	//window.location.href='home.php';
	//var password=passwd;
	//var url = "http://localhost/Android-Style-Pattern-Lock-with-jQuery?loginsqli.php?passwd=123";
	//			$.getJSON(url, function(data) {
		//			console.log(data);
	var type=typeof passwd;
	
	
$.ajax ({
  type: "POST",
  
  url:"update2.php",

  data: {passwd:passwd},
   //console.log(data);
  success: function(data) {
   //  console.log(passwd.val());
	console.log("message sent!");
	console.log(data);
	
	}
  },
  
   
  
)

/*
$.post("update2.php",{passwd:passwd},function(data){
 console.log("message sent!");
	console.log(data);
	if(data.success)
	{
		window.alert("sucess");
		window.location.href = "home.php";
		// $("#gesturepwd").trigger("passwdRight");
    
	}
	
	
	
	
},"json");
*/


	
	
  });


</script>


<script type="text/javascript">
//var url = "grab2.php";
//				$.getJSON(url, function(data) {   //new line
//					console.log(data);
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  });

<!--/script>
</html>