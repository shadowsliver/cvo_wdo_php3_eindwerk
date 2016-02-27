<!DOCTYPE html>
<html lang="<?php print($properties->language) ?>">
<head>
<meta charset="UTF-8">
<title><?php echo $properties->pagetitle; ?></title>
<meta name="description" content="<?php echo $properties->pagemeta; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php foreach ($properties->stylesheets as $style) : ?>
        <link rel="stylesheet" type="text/css"
	href="css/<?php echo $style; ?>" media="screen">
    <?php endforeach; ?>
    
    <?php foreach ($properties->javascript_top as $js) : ?>
        <script src="<?php echo $js; ?>"></script>
    <?php endforeach; ?>

</head>
<body>
<?php include 'includes/global_messaging_system.incl.php';?>
<?php include 'views/navigation.php';?>