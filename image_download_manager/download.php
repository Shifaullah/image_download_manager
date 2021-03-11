<?php 
if(isset($_GET['filename'])){
	$file = $_GET['filename'];
	$backpagesearch = $_GET['search'];
	$filename="downloaded/".rand(100,1000000)."asdfdsa.jpg";
	if(file_put_contents($filename, file_get_contents($file))){
		echo "<a href='$filename' download></a>";
		?>

		<script>document.querySelector('a').click();
		setTimeout(function (){

			location.href = 'index.php?search=<?php echo $backpagesearch?>&FTBD=<?php echo $filename ?>&url=<?php echo  $_GET["url"]?>';
			},1)
		</script>;
<?php  
	}
}

 ?>