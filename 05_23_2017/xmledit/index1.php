<?php
	require_once 'XmlEdit.php';

	$xml = new Xml();
	$autorzy = $xml->zwrocAutorzyFORCH();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista autorów</title>
    </head>
    <body>
		<h1>Lista autorów</h1>

		<p>
			<a href="index.php">Powrót</a>
			<a href="dodaj1.php">Dodaj</a>
		</p>

		<table>
			<tr>
				<th>ID</th>
				<th>Imię</th>
				<th>Nazwisko</th>
				<th></th>
			</tr>

			<?php foreach($autorzy as $id => $dane): ?>
			<tr>
				<td><?=$id ?></td>
				<td><?=$dane['imie'] ?></td>
				<td><?=$dane['nazwisko'] ?></td>
				<td>
					<a href="edytuj1.php?id=<?=$id ?>">edytuj</a> |
					<a href="usun1.php?id=<?=$id ?>">usuń</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
    </body>
</html>
