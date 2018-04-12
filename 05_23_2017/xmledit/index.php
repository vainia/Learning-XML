<?php
	require_once 'XmlEdit.php';

	$xml = new Xml();
	$ksiazki = $xml->zwrocKsiazki();
	$autorzy = $xml->zwrocAutorzy();
	$rodzaje = $xml->zwrocRodzaje();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista książek</title>
    </head>
    <body>
		<h1>Lista książek</h1>

		<p>
			<a href="dodaj.php">Dodaj</a>
			<a href="index1.php">Zarzadzanie katalogiem autorow</a>
			<a href="index2.php">Zarzadzanie rodzajami ksiazek</a>
		</p>

		<table>
			<tr>
				<th>ID</th>
				<th>Autor</th>
				<th>Rodzaj</th>
				<th>Tytuł</th>
				<th>Strony</th>
				<th></th>
			</tr>

			<?php foreach($ksiazki as $id => $dane): ?>
			<tr>
				<td><?=$id ?></td>
				<td><?=$autorzy[$dane['id_autora']] ?></td>
				<td><?=$rodzaje[$dane['id_rodzaju']] ?></td>
				<td><?=$dane['tytul'] ?></td>
				<td><?=$dane['strony'] ?></td>
				<td>
					<a href="edytuj.php?id=<?=$id ?>">edytuj</a> |
					<a href="usun.php?id=<?=$id ?>">usuń</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
    </body>
</html>
