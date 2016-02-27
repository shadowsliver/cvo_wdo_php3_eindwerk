<?php if (!empty( $_SESSION['errorMessage'] )) :	?>
	<div class="errorMessageBoxGlobal"><?php print $_SESSION['errorMessage']; ?></div>
<?php unset($_SESSION['errorMessage']);
endif;?>

<?php if (!empty( $_SESSION['infoMessage'] )) :	?>
	<div class="infoMessageBoxGlobal"><?php print $_SESSION['infoMessage']; ?></div>
<?php unset($_SESSION['infoMessage']);
endif;?>

<?php if (!empty( $_SESSION['debugMessage'] )) :	?>
	<div class="debugMessageBoxGlobal"><?php print $_SESSION['debugMessage']; ?></div>
<?php unset($_SESSION['debugMessage']);
endif;?>