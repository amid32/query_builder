<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php $this->load->view("link/style"); ?>
	
</head>
<body>

	<div class="container ">
	 <h1 class="text-center">COURS LIST</h1>
	   <div class="row">
	    <div class="col-md-12">
	   <?=form_open("Course_control/update_view/$rows->id"); ?>
			<div class="row">
			<div class="form-group col-md-11">
			<input type="text" class="form-control" name="title" value="<?=$rows->title;?>">
			</div>

			<div class="col-md-1">
			<button class="btn btn-primary">Qeyd</button>
			</div>
	    </div>
	   </form>
	   </div>
     </div>

 </div>
</div>



























</div>
	<?php $this->load->view("link/script"); ?>
</body>
</html>