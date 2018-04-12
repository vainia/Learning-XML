<?php

$plik = file_get_contents("samochody.xml");
$xml = new SimpleXMLElement($plik);

$plik2 = file_get_contents("marki.xml");
$xml2 = new SimpleXMLElement($plik2);

$plik3 = file_get_contents("modele.xml");
$xml3 = new SimpleXMLElement($plik3);

$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');

foreach($xml as $samochod) {
	$stmt = $pdo->prepare("
		INSERT INTO samochody2
		(id, rok, pojemnosc, typ_silnika, liczba_poduszek, abs, esp, marka, model)
		VALUES
		(:id, :rok, :pojemnosc, :typ_silnika, :liczba_poduszek, :abs, :esp, :marka, :model)
	");
	foreach($xml2 as $marka) {
		if ($marka->id*1 == $samochod->marka*1){
			foreach($xml3 as $model) {
				if ($model->id*1 == $samochod->model*1){
					$wynik = $stmt->execute([
						'id' => $samochod->id,
						'rok' => $samochod->rok,
						'pojemnosc' => $samochod->pojemnosc,
						'typ_silnika' => $samochod->typ_silnika,
						'liczba_poduszek' => $samochod->liczba_poduszek,
						'abs' => $samochod->abs,
						'esp' => $samochod->esp,
						'marka' => $marka->nazwa,
						'model' => $model->nazwa
					]);
				}
			}
		}
	}
}
