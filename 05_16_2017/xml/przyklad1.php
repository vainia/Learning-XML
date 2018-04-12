<?php

$plik = file_get_contents("samochody.xml");
$xml = new SimpleXMLElement($plik);
$i=0;

echo "<style>td{border: 1px solid black;}</style>";

echo "<table>";
foreach($xml as $samochod) {
	if ($i%2==0) {
		echo "<tr>";
	} else {
		echo "<tr style=\"background: grey;\">";
	}
	echo "<td>".$samochod->id."</td>";
	echo "<td>".$samochod->marka."</td>";
	echo "<td>".$samochod->model."</td>";
	echo "<td>".$samochod->rok."</td>";
	echo "<td>".$samochod->pojemnosc."</td>";
	echo "<td>".$samochod->typ_silnika."</td>";
	echo "<td>".$samochod->liczba_poduszek."</td>";
	if ($samochod->abs=="tak") {
		echo "<td style=\"background: green;\">".$samochod->abs."</td>";
	} else {
		echo "<td style=\"background: red;\">".$samochod->abs."</td>";
	}
	if ($samochod->esp=="tak") {
		echo "<td style=\"background: green;\">".$samochod->esp."</td>";
	} else {
		echo "<td style=\"background: red;\">".$samochod->esp."</td>";
	}
	echo "</tr>";
	$i++;
}
echo "</table>";
