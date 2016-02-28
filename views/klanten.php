<?php include_once 'includes/security.incl.php'; ?>

<?php
$results = $controller->GetKlanten();
foreach ($results as $row) {
    print_r($row);
}