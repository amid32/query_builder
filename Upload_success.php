<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<title>Upload_form</title>
</head>
<body>
<h3>Your file was successfully uploaded!</h3>
<ul>
<?php foreach($upload_data as $item => $value): ?>
<li><?=$item;?>: <?=$value;?></li>
<?php endforeach; ?>
</ul>
<p><?php echo anchor('upload', 'Upload Another File!'); ?></p>
</body>
</html>

