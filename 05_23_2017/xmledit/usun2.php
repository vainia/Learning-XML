<?php
	require_once 'XmlEdit.php';

	$xml = new Xml();
	$xml->usunRodzaj($_GET['id']);
	header("Location: index2.php");
