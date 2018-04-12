<?php
$string = '';

$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
foreach($pdo->query('SELECT samochody.id, modele.nazwa as model, marki.nazwa as marka, rok, pojemnosc, typ_silnika, liczba_poduszek, esp, abs FROM (samochody INNER JOIN modele ON modele.id = samochody.id) INNER JOIN marki ON marki.id = samochody.id ORDER BY marka, model') as $wiersz) {
	$string .= "id - $wiersz[id]\n";
	$string .= "marka - $wiersz[marka]\n";
	$string .= "model - $wiersz[model]\n";
	$string .= "rok - $wiersz[rok]\n";
	$string .= "pojemnosc - $wiersz[pojemnosc]\n";
	$string .= "typ_silnika - $wiersz[typ_silnika]\n";
	$string .= "liczba_poduszek - $wiersz[liczba_poduszek]\n";
	$string .= "abs - $wiersz[abs]\n";
	$string .= "esp - $wiersz[esp]\n\n";
}

file_put_contents("przyklad2.txt", $string);
