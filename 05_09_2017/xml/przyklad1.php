<?php
$dane = [];
$dane['imie'] = 'Jan';
$dane['nazwisko'] = 'Kowalski';
$dane['data_urodzenia'] = '1987-01-20';
$dane['miejsce_urodzenia'] = 'Sopot';
$dane['ulica'] = 'Newelska';
$dane['nr_domu'] = '6';
$dane['nr_mieszkania'] = '1';
$dane['kod_pocztowy'] = '00-123';
$dane['miasto'] = 'Warszawa';

$string = "<?xml version=\"1.0\" encoding=\"windows-1250\"?>\n<?xml-stylesheet type=\"text/xsl\" href=\"zestawienie.xsl\"?>\n\t<tozsamosc>\n";

foreach($dane as $klucz => $wartosc)
	$string .= "\t\t<$klucz>$wartosc</$klucz>\n";

$string .= "\t</tozsamosc>\n";

file_put_contents("przyklad1.xml", $string);
