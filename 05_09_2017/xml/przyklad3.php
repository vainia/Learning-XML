<?php

$i = 0;

$uchwyt = fopen("przyklad3.csv","r");

$string = "<?xml version=\"1.0\" encoding=\"windows-1250\"?>\n<?xml-stylesheet type=\"text/xsl\" href=\"zestawienie.xsl\"?>\n\t<tozsamosc>\n";

while(($data = fgetcsv($uchwyt, 1000, ";")) !== FALSE)
{
  $i++;
  $string .= "\t\t<osoba nr=\"$i\">\n";
  $string .= "\t\t\t<imie>$data[0]</imie>\n";
  $string .= "\t\t\t<nazwisko>$data[1]</nazwisko>\n";
  $string .= "\t\t\t<miasto>$data[2]</miasto>\n";
  $string .= "\t\t</osoba>\n";
}

$string .= "\t</tozsamosc>\n";

fclose($uchwyt);

file_put_contents("przyklad3.xml", $string);
