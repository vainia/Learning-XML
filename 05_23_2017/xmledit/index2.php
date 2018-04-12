<?php
	require_once 'XmlEdit.php';

	$xml = new Xml();
	$rodzaje = $xml->zwrocRodzajeFORCH();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista rodzajów</title>
    </head>
    <body>
		<h1>Lista rodzajów</h1>

		<p>
			<a href="index.php">Powrót</a>
			<a href="dodaj2.php">Dodaj</a>
		</p>

		<table>
			<tr>
				<th>ID</th>
				<th>Nazwa</th>
				<th></th>
			</tr>

			<?php foreach($rodzaje as $id => $dane): ?>
			<tr>
				<td><?=$id ?></td>
				<td><?=$dane['nazwa'] ?></td>
				<td>
					<a href="edytuj2.php?id=<?=$id ?>">edytuj</a> |
					<a href="usun2.php?id=<?=$id ?>">usuń</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
    </body>
</html>
