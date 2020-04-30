<?php 
$sql44 ="SELECT (SELECT COUNT(id) FROM tbltestimonial WHERE status is NULL or status = '0') AS newtestimonial, (SELECT COUNT(id) FROM tblcontactusquery WHERE status is NULL) AS newquery, (SELECT COUNT(id) FROM tblbooking WHERE Status = '0') AS newbooking";
$query44= $dbh -> prepare($sql44);
$query44->execute();
$results44=$query44->fetchAll(PDO::FETCH_OBJ);
if($query44->rowCount() > 0)
{
	foreach($results44 as $result){
		$ntestimonial = $result->newtestimonial;
		$nquery = $result->newquery;
		$nbooking = $result->newbooking;
	}
}
else {
	$ntestimonial = '';
	$nquery = '';
	$nbooking = '';
}

 ?>

	<nav class="ts-sidebar">
			<ul class="ts-sidebar-menu">
			
				<li class="ts-label">Main</li>
				<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			
<li><a href="#"><i class="fa fa-files-o"></i> Brands</a>
<ul>
<li><a href="create-brand.php">Create Brand</a></li>
<li><a href="manage-brands.php">Manage Brands</a></li>
</ul>
</li>

<li><a href="#"><i class="fa fa-sitemap"></i> Vehicles</a>
					<ul>
						<li><a href="post-avehical.php">Post a Vehicle</a></li>
						<li><a href="manage-vehicles.php">Manage Vehicles</a></li>
					</ul>
				</li>
				<li><a class="nbookinglink" href="<?php echo $nbooking?'manage-new-bookings.php':'manage-bookings.php'; ?>"><i class="fa fa-users"></i> Manage Booking <span class="nbooking badge bk-danger rounded-circle"><?php echo $nbooking?$nbooking:''; ?></span></a></li>

				<li><a class="ntestimoniallink" href="<?php echo $ntestimonial?'new_testimonials.php':'testimonials.php'; ?>"><i class="fa fa-table"></i> Manage Testimonials <span class="ntestimonial badge bk-danger rounded-circle"><?php echo $ntestimonial?$ntestimonial:''; ?></span></a></li>
				<li><a class="nquerylink" href="<?php echo $nquery?'manage-new-conactusquery.php':'manage-conactusquery.php'; ?>"><i class="fa fa-desktop"></i> Manage Conatctus Query <span class="nquery badge bk-danger rounded-circle"><?php echo $nquery?$nquery:''; ?></span></a></li>
				<li><a href="reg-users.php"><i class="fa fa-users"></i> Reg Users</a></li>
			<li><a href="manage-pages.php"><i class="fa fa-files-o"></i> Manage Pages</a></li>
			<li><a href="update-contactinfo.php"><i class="fa fa-files-o"></i> Update Contact Info</a></li>

			<li><a href="manage-subscribers.php"><i class="fa fa-table"></i> Manage Subscribers</a></li>

			</ul>
		</nav>

		