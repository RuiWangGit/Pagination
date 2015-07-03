

<?php $this->load->view('header') ?>

	


	<div class="container">
	
		
				<form action="/upload" enctype="multipart/form-data" method="post">​
					<label for="csv">Choose your file</label>​
					<input type="file" name="csv" />​
					<div>	
						<input type="submit" name="submit" value="submit" />​
					</div>​
				</form>​
		

	</div>







<?php $this->load->view('footer') ?>