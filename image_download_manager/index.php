<?php 
include 'visitor_counter.php';
if(isset($_GET['FTBD'])){
// ftbd = file to be delete
	if(file_exists($_GET['FTBD'])){
		unlink($_GET['FTBD']);
	}
 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Image downloader</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<!-- font awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
	<style>
		*{font-family: 'Akaya Telivigala', cursive;}
		.img-div {
			position: relative;
			height: 300px;
			padding: 5px !important;
		}
		.img-div figure{
			box-shadow: 0px 0px 7px #ddd ,-0px -0px 7px #ddd;
			border-radius: 7px;
			padding: 5px;
			overflow:hidden;
			position: relative;
			width: 100%;
			height: 100%;
		}
		.img-div figure img{
			width: 100%;
			height: 90%;
			transition: 0.5s ease-in-out;
		}
		.img-div figure a{
			position:absolute;
			top: 50%;
			left: 50%;
			z-index: 4;
			transform: translate(-50%,-50%);
			display: none;
		}
		.img-div figure:hover a{
			display: block;
		}
		.img-div img:hover{
			transform: scale(1.2);
		}
		
		.img-div figure figcaption{
			position: absolute;
			z-index: 2;
		}
		
	@media(max-width: 600px){
		.intro{
			font-size: 12px;
		}
		form select{
			width:80px;
		}
	}
	.header{
		box-shadow: 0px 3px 10px #ddd;
		display: flex;
		justify-content: space-evenly;
		align-items: center;
		padding:10px;
	}
	.icons i{
		color:#a3e433;
		font-size: 1rem;
		cursor: pointer;
		margin: 10px 5px 0px 0px;
	}
	</style>
</head>
<body>
<?php 

$search = urlencode("nature");
$select = "Free stock photos";
if(isset($_GET['url'])){
	$select = $_GET['url'];
}
if(!empty($_GET['search'])){
	$search = urlencode($_GET['search']);
}
if(isset($_GET['searchbtn'])){
	if(!empty($_GET['searchbar'])){
		$search = urlencode($_GET['searchbar']);
		$select = ($_GET['select']);
		global $urls;
		$url = $urls[$select];
	}
}
$urls  = array(
	'Free stock photos' => "https://all-free-download.com/free-photos/$search.html",
	'unsplash.com' => "https://unsplash.com/s/photos/$search",
	'Google.com' => "https://www.google.com/search?q=$search&source=lnms&tbm=isch&sa=X&ved=2ahUKEwj40s7jnKXvAhVZhlwKHWKeBdwQ_AUoAXoECA0QAw",
	'shutterstock.com' => "https://www.shutterstock.com/search/$search?kw=%2Bimage%20%2Bsites&c3apidt=p15790584215&gclid=Cj0KCQiA1pyCBhCtARIsAHaY_5c5Rp9vMUVzeh5KXZ8uedMhval6RD9xz5REsy-O9yAFTfnEIi-uv8QaAvJrEALw_wcB&gclsrc=aw.ds",
	
	'freepik.com' => "https://www.freepik.com/search?dates=any&format=jpg&query=$search&type=photo"
);
$url = $urls[$select];
?>
<div class="container-fluid">
	<div class="row bg-light">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="alert alert-success d-none">Please Wait...<br>image my be high quality or May be due to slow internet.</div>
		</div>
		<div class="col-md-4"></div>

</div>
<div class="row">
		<div class="header col-12">
		<a href="shifa.jpg" download><img src="shifa.jpg" alt="shifayousufzai" title ="Developer Of The App"style="width:60px;height: 60px;border-radius: 50%;"><strong class="text-primary ml-2 d-inline d-md-none">IDM</strong><strong class="d-none d-md-inline text-primary ml-md-3">Image Download Manager</strong></a>
		<p class="icons">
			<a href="https://twitter.com/shifaul51285810"><i class="fab fa-twitter"></i></a>
			<a href="https://www.youtube.com/channel/UCPNzAycJ09t0JM270cqgWgA"><i class="fab fa-youtube"></i></a>
			<a href="mailto:shifamkyousufzai@gmail.com"><i class="far fa-envelope"></i></a>
			<a href="https://web.facebook.com/profile.php?id=100036599700146"><i class="fab fa-facebook"></i></a>
			<a href="https://github.com/Shifaullah"><i class="fab fa-github"></i></a>
		</p>
	</div>

</div>
</div>
	<div class="container">
		<div class="row">
			<div class="col-12 pt-3">
                <div class="alert alert-dark"><b><?php echo $visitors_to_show; ?></b> people visit this site.</div>
				<div class="alert alert-primary">you're searching with  <b class="text-success"><?php echo "$select"; ?></b></div>
			</div>
			<div class="col-12">
				<form action="?pn=yes" method="GET" class="py-3">
					<div class="input-group mb-2 mr-sm-2">
					    <input type="text" class="form-control" name="searchbar" placeholder="Search Google For images..." value="<?php echo(urldecode($search)); ?>">
					    <div class="input-group-prepend">
					      <select name="select" class="bg-dark text-light border-0">
					      	<?php 
					      	foreach ($urls as $key => $value) {
					      		echo "<option value='$key'> $key</option>";
					      	}

					      	 ?>
					      </select>
					    </div>
					     <div class="input-group-prepend">
					      <input type="submit" name="searchbtn" value="search" class="btn btn-info">
					    </div>
					</div>
				</form>
			</div>	
		</div>
		<div class="row">
<?php
$ci = curl_init();
curl_setopt($ci,CURLOPT_URL,$url);
curl_setopt($ci,CURLOPT_TIMEOUT,100);
curl_setopt($ci,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ci,CURLOPT_RETURNTRANSFER,true);
$result = curl_exec($ci);
curl_close($ci);

preg_match_all("/(<img )+[a-zA-Z0-9\-\_\!\@\#\$\%\^\&\*\/\/\?\.\,\='".'"\:\;\(\) ]*(>)*/',$result, $matches);
$count = count($matches[0]);

for($i = 0; $i < $count; $i++){
	$src = $matches[0][$i];
	echo "<div class='col-sm-6 col-md-4 img-div'>";
	echo "<figure><a class='btn btn-light'><i class=\"fas fa-cloud-download-alt\"></i></a>$src<figcaption></figcaption></figure>";
	echo "</div>";
}


?>	

		</div>
	</div>
	<div class="intro bg-info" style="border-top:6px ridge orange;">
		<p class="text-center text-light py-3">Image Download Manager Developed by <b>Shifa Yousfuzai</b> <span>Contact: +923452206796 / <a href="mailto:shifamkyousufzai@gmail.com" class="link text-light"><b>Email</b></a></span></p>
	</div>
<script>
	document.querySelector('.img-div').remove();
	var images = document.querySelectorAll('.img-div img');
	images.forEach(function (e){
		e.parentElement.querySelector('a').href = "download.php?filename="+e.src+"&search=<?php echo $search ?>&url=<?php echo $select ?>";
		e.parentElement.querySelector('figcaption').innerText = e.alt;
		e.parentElement.querySelector('a').onclick = function (){
			document.querySelector('.alert').classList.remove('d-none');
		}
	});
</script>

</body>
</html>

