<?php 
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
	<style>
		
		.img-div img{
			width: 100%;
			height: 100%;
			transition: 0.5s ease-in-out;
			box-shadow: 0px 0px 10px #ddd;
		}
		.img-div img:hover{
			transform: scale(1.2);
		}
		.img-div {
			height: 300px;
			margin:5px 0px;
			overflow:hidden;
		}
	</style>
</head>
<body>
<?php 

$search = urlencode("nature");
$select = "Google.com";
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
	'Google.com' => "https://www.google.com/search?q=$search&tbm=isch&ved=2ahUKEwjgpeKHg6TvAhUO_hoKHeLOB50Q2-cCegQIABAA&oq=high+resouimages&gs_lcp=CgNpbWcQARgAMgYIABAHEB46BwgAELEDEEM6BAgAEEM6AggAUKf-AViuyAJgv-MCaAhwAHgAgAGeBYgBtS2SAQczLTYuNC4zmAEAoAEBqgELZ3dzLXdpei1pbWfAAQE&sclient=img&ei=CddHYKD9LY78a-Kdn-gJ&bih=600&biw=1366#imgrc=-cVzcJE3kguIiM",
	'unsplash.com' => "https://unsplash.com/s/photos/$search",
	'shutterstock.com' => "https://www.shutterstock.com/search/$search?kw=%2Bimage%20%2Bsites&c3apidt=p15790584215&gclid=Cj0KCQiA1pyCBhCtARIsAHaY_5c5Rp9vMUVzeh5KXZ8uedMhval6RD9xz5REsy-O9yAFTfnEIi-uv8QaAvJrEALw_wcB&gclsrc=aw.ds",
	'Free stock photos' => "https://all-free-download.com/free-photos/$search.html",
	'freepik.com' => "https://www.freepik.com/search?dates=any&format=jpg&query=$search&type=photo"
);
$url = $urls[$select];
// if(isset($_GET['url'])){
// 	$url = $urls[$_GET['url']];
// }

?>
<div class="container-fluid bg-info">
	<div class="row bg-light">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="alert alert-success d-none">Please Wait...<br>image my be high quality or May be due to slow internet.</div>
		</div>
		<div class="col-md-4"></div>
	</div>
	<p class="text-center text-light py-2">Any Image Downloader Developed by <b>Shifa Yousfuzai</b> <span>Contact: +923452206796 / <a href="mailto:shifamkyousufzai@gmail.com" class="link text-light"><b>Email</b></a></span></p>
</div>
	<div class="container">
		<div class="row">
			<p><strong>you're searching in  <b class="text-success"><?php echo "$select"; ?></b> </strong></p>
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
	echo "<a>$src</a>";
	echo "</div>";
}


?>	
		</div>
	</div>
<script>
	document.querySelector('.img-div').remove();
	var images = document.querySelectorAll('.img-div img');
	images.forEach(function (e){
		e.parentElement.href = "download.php?filename="+e.src+"&search=<?php echo $search ?>&url=<?php echo $select ?>";
		e.parentElement.onclick = function (){
			document.querySelector('.alert').classList.remove('d-none');
		}
	});
</script>

</body>
</html>

