<?php
	require_once 'XmlEdit.php';

	$xml = new Xml();
	$autorzy = $xml->zwrocAutorzyFORCH();

	if(isset($_POST['dodaj'])) {
		$xml->dodajAutora($_POST);
		header("Location: index1.php");
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dodaj autora</title>
    </head>
    <body>
		<h1>Dodaj autora</h1>

		<form method="post" action="">
			<fieldset>
				<legend>Dodaj autora</legend>
				<table>
					<tr>
						<td>Imie</td>
						<td><input type="text" name="imie" /></td>
					</tr>
					<tr>
						<td>Nazwisko</td>
						<td><input type="text" name="nazwisko" /></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="dodaj" value="Dodaj" />
							<a href="index1.php">powrót</a>
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
    </body>
</html>
