<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from sell_book where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from sell_book order by id desc";
$res=mysqli_query($con,$sql);
?>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">BOOK Deatial</h4>
				</div>
				<div class="card-body--">
				   <div class="table-stats order-table ov-h">
					  <table class="table ">
						 <thead>
							<tr>
							<tr>
							   <th class="serial">S.no</th>
							   <th>ID</th>
							   <th>Categories</th>
							   <th>Book name </th>
							   <th>MRP</th>
							   <th>Price</th>
							   <th>Seller user name</th>
							   <th>Contact</th>
							   <th>city</th>
							   <th>Date</th>
							   <th>Delete</th>
				
							</tr>
							</tr>
						 </thead>
						 <tbody>
							<?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td class="serial"><?php echo $i ?></td>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['bcategory']?></td>
							   <td><?php echo $row['bname']?></td>
							   <td><?php echo $row['bmrp']?></td>
							   <td><?php echo $row['bprize']?></td>
							   <td><?php echo $row['user']?></td>
							   <td><?php echo $row['contact']?></td>
							   <td><?php echo $row['city']?></td>
							   <td><?php echo $row['creat_dt']?></td>
							   <td>
								<?php
								echo "<span class='badge badge-delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></span>";
								?>
							   </td>
							</tr>
							<?php
							$i++; }
							
					          ?>
						 </tbody>
					  </table>
				   </div>
				</div>
			 </div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('footer.php');
?>