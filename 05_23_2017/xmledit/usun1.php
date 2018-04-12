<?php
	require_once 'XmlEdit.php';

	$xml = new Xml();
	$xml->usunAutora($_GET['id']);
	header("Location: index1.php");
