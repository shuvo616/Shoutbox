<?php /* $ () & # ! % @*/
include 'inc/header.php';
include "classes/shout.php";
$shout = new Shout();
?>

		<!--Content Section Start-->
		<section class="content clear">
			<!--View Shout box Start-->
			<div class="box">
				<ul>
					<?php 
						$getdata = $shout->getAllData();//Call to M1 from Shout class.
						if ($getdata) {
							while ($data = $getdata->fetch_assoc()) {?>
							
							<li><span><?php echo $data['time'];?></span> <b> <?php echo $data['name'];?>:</b> <?php echo $data['body'];?></li>

						<?php }} ?>
				</ul>
			</div>
			<!--View Shout box End-->
<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$shoutdata = $shout->insert_shoutdata($_POST);
	}

?>
			<!--Shout From Start-->
			<div class="shoutfrom clear">
				<form action="" method="post">
					<table>
						<tr>
							<td>Name</td>
							<td>:</td>
							<td><input type="text" name="name" placeholder="Your Name" required=""></input></td>
						</tr>


						<tr>
							<td>Message</td>
							<td>:</td>
							<td><input type="text" name="body" placeholder="Enter Your Message" required=""></input></td>
						</tr>


						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="submit" value="Shout It"></input></td>
						</tr>
					</table>
				</form>
				<!--Shout From End--> 
			</div>
		</section>

<?php include 'inc/footer.php'; ?>