<?php
	require_once 'XmlEdit.php';

	$xml = new Xml();
	$rodzaje = $xml->zwrocRodzajeFORCH();

	if(isset($_POST['zapisz'])) {
		$xml->zapiszRodzaj($_GET['id'], $_POST);
		header("Location: index2.php");
	} else {
		$rodzaj = $xml->pobierzRodzaj($_GET['id']);
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edytuj rodzaj</title>
    </head>
    <body>
		<h1>Edytuj rodzaj</h1>

		<form method="post" action="">
			<fieldset>
				<legend>Edytuj rodzaj</legend>
				<table>
					<tr>
						<td>Nazwa</td>
						<td><input type="text" name="nazwa" value="<?=$rodzaj['nazwa'] ?>"/></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="zapisz" value="Zapisz" />
							<a href="index2.php">powrót</a>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
    </body>
</html>
