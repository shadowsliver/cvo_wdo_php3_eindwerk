<?php
$conn = new PDO("mysql:host=$global_servername;dbname=$global_dbName", $global_dbUser, $global_dbPass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // geeft fouten in sql weer