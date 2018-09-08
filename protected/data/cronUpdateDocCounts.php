<?php

$conn = pg_connect("host=localhost dbname=intrado1_public user=intrado1 password=12Characters");
$q = pg_query($conn, 'SELECT * FROM update_document_counts();')
?>