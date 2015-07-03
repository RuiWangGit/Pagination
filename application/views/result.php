

<?php $this->load->view('header') ?>





	<div class="container">
	
	
	
				<table class='table table-hover'>​
					<thead>​
						<tr>​
							<th class=" col-md-1">First name</th>​
							<th class=" col-md-1">Last name</th>​
							<th class=" col-md-1">Company name</th>​
							<th class=" col-md-1">Address</th>​
							<th class=" col-md-1">City</th>​
							<th class=" col-md-1">County</th>​
							<th class=" col-md-1">State</th>​
							<th class=" col-md-1">Zip</th>​
							<th class=" col-md-1">Phone 1</th>​
							<th class=" col-md-1">Phone 2</th>​
							<th class=" col-md-1">Email</th>​
							<th class=" col-md-1">Web</th>​
						</tr>​
					</thead>​
		

		​<?php
			
			foreach( $users as $user ) {	
		?>​

		
					<tbody>​
					
						<tr>​
							<td class="col-md-1"><?= $user['first_name'] ?></td>​
							<td class="col-md-1"><?= $user['last_name'] ?></td>​
							<td class="col-md-1"><?= $user['company_name'] ?></td>​
							<td class="col-md-1"><?= $user['address'] ?></td>​
							<td class="col-md-1"><?= $user['city'] ?></td>​
							<td class="col-md-1"><?= $user['county'] ?></td>​
							<td class="col-md-1"><?= $user['state'] ?></td>​
							<td class="col-md-1"><?= $user['zip'] ?></td>​
							<td class="col-md-1"><?= $user['phone1'] ?></td>​
							<td class="col-md-1"><?= $user['phone2'] ?></td>​
							<td class="col-md-1"><?= $user['email'] ?></td>​
							<td class="col-md-1"><?= $user['web'] ?></td>​
						</tr>​
					
						
					</tbody>​
		​<?php	}	?>​
				</table>​

	<?php


			if($max_page_num > 0){

				$per_page = 5;
				// $page_limit  = 10;
				$prev = $current_page - 1;
				$next = $current_page + 1;

				echo "<ul class='pagination pagination-sm' >";

				echo "<li><a href='/render?action=first'>   first</a> </li>";	
				echo "<li><a href='/render?action=prev&page=".$prev ."'>     prev</a>  </li>";			

				if ( $current_page%10 == 0){
					$start = $current_page - 9;
				}
				else $start = floor($current_page/10) * 10 + 1;

				$end   = $start + 9;
				// echo ($end);
				// die;

				if ( $end > $max_page_num ) $end = $max_page_num;

				$page_number  = $start;

				while( $page_number <= $end ) //to get each page number​
				{
					if($page_number > 0)
					{
						if ( $current_page == $page_number ){
							echo "<li ><a class='current' href='/show?action=get_post&page=". $page_number ."'>". $page_number ."</a> </li>";
						}
						else {
							echo "<li><a href='/show?action=get_post&page=". $page_number ."'>". $page_number ."</a> </li>";
					
						}
					}	
					



					$page_number++;
				}

				echo "<li><a href='/render?action=next&page=". $next ."'>  next </a></li>";	
				echo "<li><a href='/render?action=last'>   last </a></li>";	

				echo "</ul>";
			}

	?>	
		
	
	</div>







<?php $this->load->view('footer') ?>






			


