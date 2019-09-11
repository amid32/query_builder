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
	   <?=form_open('Course_control/insert'); ?>
			<div class="row">
			<div class="form-group col-md-11">
			<input type="text" class="form-control" name="title">
			</div>

			<div class="col-md-1">
			<button class="btn btn-primary">Qeyd</button>
			</div>
	    </div>
	   </form>
	   </div>
     </div>
<div class="row">
<div class="col-md-12">
<table class="table table-bordered table-hover table-striped">
	<thead>
		<th class="text-center">Açıklama</th>
		<th class="text-center">Durum</th>
		<th class="text-center">Sil</th>
	</thead>
	<tbody>
	<?php foreach($rows as $row) { ?>
	  <tr>
		<td><?=$row->title;?></td>
		<td style="width:300px;">                <!--burada deyiremki if-le eyer verbazasinda (isCompileted == true-dursa veya 1-dirse checked elyer yox false-dirse veya 0-dirsa o zaman disable ele) -->
		<input type="checkbox"  data-url="<?=base_url("Course_control/isComplietedSetter/$row->id");?>"  class="js-switch" <?=($row->isCompileted) ? "checked" : "";?>   />
		</td>                     <!--bu url ile get javascripde melumati dogrula yeni dinamik bir url-dir-->                                                              

		                          <!--burada deyiremki /controller/method/parametre/id'ni al gonder  parametre olarak ve contralerden modele ve sql-den  sil amma neyi o id-de olan melumati -->
		<td style="width:150px;"><a href="<?=base_url("Course_control/edit/$row->id"); ?>" class="btn btn-success">Edit</a>
		<a href="<?=base_url("Course_control/delete/$row->id"); ?>" class="btn btn-danger">Sil</a></td>
	  </tr>
	<?php } ?>
	</tbody>
  </table>
 </div>
</div>



























</div>
	<?php $this->load->view("link/script"); ?>
</body>
</html>