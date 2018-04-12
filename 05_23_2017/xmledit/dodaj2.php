<?php
	require_once 'XmlEdit.php';

	$xml = new Xml();
	$rodzaje = $xml->zwrocRodzajeFORCH();

	if(isset($_POST['dodaj'])) {
		$xml->dodajRodzaj($_POST);
		header("Location: index2.php");
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dodaj rodzaj</title>
    </head>
    <body>
		<h1>Dodaj rodzaj</h1>

		<form method="post" action="">
			<fieldset>
				<legend>Dodaj rodzaj</legend>
				<table>
					<tr>
						<td>Nazwa</td>
						<td><input type="text" name="nazwa" /></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="dodaj" value="Dodaj" />
							<a href="index2.php">powrót</a>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
    </body>
</html>
