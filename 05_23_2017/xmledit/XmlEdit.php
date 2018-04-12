<?php

class Xml
{
	// nazwy plików XML
	private $plikKsiazki = 'dane/ksiazki.xml';
	private $plikAutorzy = 'dane/autorzy.xml';
	private $plikRodzaje = 'dane/rodzaje.xml';

	// instancje klasy SimpleXML
	private $xmlKsiazki;
	private $xmlAutorzy;
	private $xmlRodzaje;

	// wczytane dane z plików XML w postaci tablicy
	private $tablicaAutorzy = [];
	private $tablicaKsiazki = [];
	private $tablicaRodzaje = [];
	private $tablicaAutorzyFORCH = [];
	private $tablicaRodzajeFORCH = [];

	public function __construct()
	{
		$this->xmlKsiazki = simplexml_load_file($this->plikKsiazki);
		$this->xmlAutorzy = simplexml_load_file($this->plikAutorzy);
		$this->xmlRodzaje = simplexml_load_file($this->plikRodzaje);
		$this->wczytajAutorow();
		$this->wczytajKsiazki();
		$this->wczytajRodzaje();
		$this->wczytajAutorowFORCH();
		$this->wczytajRodzajeFORCH();
	}

	/**
	 * Wczytuje plik XML i konwertuje go do tablicy.
	 */
	private function wczytajRodzajeFORCH()
	{
		foreach($this->xmlRodzaje as $rodzaje) {
			$this->tablicaRodzajeFORCH[(int)$rodzaje->id] = [
				'id' => (int)$rodzaje->id,
				'nazwa' => (string)$rodzaje->nazwa,
			];
		}
	}

	/**
	 * Wczytuje plik XML i konwertuje go do tablicy.
	 */
	private function wczytajAutorowFORCH()
	{
		foreach($this->xmlAutorzy as $autorzy) {
			$this->tablicaAutorzyFORCH[(int)$autorzy->id] = [
				'id' => (int)$autorzy->id,
				'imie' => (string)$autorzy->imie,
				'nazwisko' => (string)$autorzy->nazwisko,
			];
		}
	}

	/**
	 * Wczytuje plik XML i konwertuje go do tablicy.
	 */
	private function wczytajAutorow()
	{
		foreach($this->xmlAutorzy as $autor)
			$this->tablicaAutorzy[(int)$autor->id] = (string)$autor->imie . ' ' . (string)$autor->nazwisko;
	}

	/**
	 * Wczytuje plik XML i konwertuje go do tablicy.
	 */
	private function wczytajKsiazki()
	{
		foreach($this->xmlKsiazki as $ksiazki) {
			$this->tablicaKsiazki[(int)$ksiazki->id] = [
				'id' => (int)$ksiazki->id,
				'id_rodzaju' => (int)$ksiazki->id_rodzaju,
				'id_autora' => (int)$ksiazki->id_autora,
				'tytul' => (string)$ksiazki->tytul,
				'strony' => (string)$ksiazki->strony,
			];
		}
	}

	/**
	 * Wczytuje plik XML i konwertuje go do tablicy.
	 */
	private function wczytajRodzaje()
	{
		foreach($this->xmlRodzaje as $rodzaj)
			$this->tablicaRodzaje[(int)$rodzaj->id] = (string)$rodzaj->nazwa;
	}

	/**
	 * Generuje kolejne ID książki.
	 *
	 * @return integer
	 */
	private function generujIdKsiazki()
	{
		$max = -1;

		foreach($this->tablicaKsiazki as $k) {
			if($k) {
				if($k['id'] > $max)
					$max = (int)$k['id'];
			}
		}

		return $max + 1;
	}

	/**
	 * Generuje kolejne ID autora.
	 *
	 * @return integer
	 */
	private function generujIdAutora()
	{
		$max = -1;

		foreach($this->tablicaAutorzyFORCH as $k) {
			if($k) {
				if($k['id'] > $max)
					$max = (int)$k['id'];
			}
		}

		return $max + 1;
	}

	/**
	 * Generuje kolejne ID rodzaju.
	 *
	 * @return integer
	 */
	private function generujIdRodzaju()
	{
		$max = -1;

		foreach($this->tablicaRodzajeFORCH as $k) {
			if($k) {
				if($k['id'] > $max)
					$max = (int)$k['id'];
			}
		}

		return $max + 1;
	}

	/**
	 * Konwertuje obiekt SimpleXMLElement do tablicy.
	 *
	 * @param SimpleXMLElement $xmlElement
	 * @return array
	 */
	private function konwertujDoTablicy($xmlElement)
	{
		$temp = [];

		foreach($xmlElement as $pole => $wart)
			$temp[$pole] = (string)$wart;

		return $temp;
	}

	/**
	 * Zwraca tablicę z autorami.
	 *
	 * @return array
	 */
	public function zwrocAutorzy()
	{
		return $this->tablicaAutorzy;
	}

	/**
	 * Zwraca tablicę z autoramiFORCH.
	 *
	 * @return array
	 */
	public function zwrocAutorzyFORCH()
	{
		return $this->tablicaAutorzyFORCH;
	}

	/**
	 * Zwraca tablicę z rodzajamiFORCH.
	 *
	 * @return array
	 */
	public function zwrocRodzajeFORCH()
	{
		return $this->tablicaRodzajeFORCH;
	}

	/**
	 * Zwraca tablicę z książkami.
	 *
	 * @return array
	 */
	public function zwrocKsiazki()
	{
		return $this->tablicaKsiazki;
	}

	/**
	 * Zwraca tablicę z rodzajami.
	 *
	 * @return array
	 */
	public function zwrocRodzaje()
	{
		return $this->tablicaRodzaje;
	}

	/**
	 * Dodaje książkę do XML.
	 *
	 * @param array $dane
	 */
	public function dodajKsiazke($dane)
	{
		$ksiazka = $this->xmlKsiazki->addChild('ksiazka');
		$ksiazka->addChild('id', $this->generujIdKsiazki());
		$ksiazka->addChild('id_rodzaju', $dane['id_rodzaju']);
		$ksiazka->addChild('id_autora', $dane['id_autora']);
		$ksiazka->addChild('tytul', $dane['tytul']);
		$ksiazka->addChild('strony', $dane['strony']);

		$this->xmlKsiazki->asXML($this->plikKsiazki);
	}

	/**
	 * Dodaje autora do XML.
	 *
	 * @param array $dane
	 */
	public function dodajAutora($dane)
	{
		$autor = $this->xmlAutorzy->addChild('autor');
		$autor->addChild('id', $this->generujIdAutora());
		$autor->addChild('imie', $dane['imie']);
		$autor->addChild('nazwisko', $dane['nazwisko']);

		$this->xmlAutorzy->asXML($this->plikAutorzy);
	}

	/**
	 * Dodaje rodzaj do XML.
	 *
	 * @param array $dane
	 */
	public function dodajRodzaj($dane)
	{
		$rodzaj = $this->xmlRodzaje->addChild('rodzaj');
		$rodzaj->addChild('id', $this->generujIdRodzaju());
		$rodzaj->addChild('nazwa', $dane['nazwa']);

		$this->xmlRodzaje->asXML($this->plikRodzaje);
	}

	/**
	 * Pobiera dane książki o podanym ID.
	 *
	 * @param integer $id
	 * @return array
	 */
	public function pobierzKsiazke($id)
	{
		$ksiazka = $this->xmlKsiazki->xpath("//ksiazka[id=$id]");

		return $this->konwertujDoTablicy($ksiazka[0]);
	}

	/**
	 * Pobiera dane autora o podanym ID.
	 *
	 * @param integer $id
	 * @return array
	 */
	public function pobierzAutora($id)
	{
		$autor = $this->xmlAutorzy->xpath("//autor[id=$id]");

		return $this->konwertujDoTablicy($autor[0]);
	}

	/**
	 * Pobiera dane rodzaju o podanym ID.
	 *
	 * @param integer $id
	 * @return array
	 */
	public function pobierzRodzaj($id)
	{
		$rodzaj= $this->xmlRodzaje->xpath("//rodzaj[id=$id]");

		return $this->konwertujDoTablicy($rodzaj[0]);
	}

	/**
	 * Edytuje dane książki.
	 *
	 * @param integer $id
	 * @param array $dane
	 */
	public function zapiszKsiazke($id, $dane)
	{
		$ksiazka = $this->xmlKsiazki->xpath("//ksiazka[id=$id]")[0];
		$ksiazka->id_rodzaju = $dane['id_rodzaju'];
		$ksiazka->id_autora = $dane['id_autora'];
		$ksiazka->tytul = $dane['tytul'];
		$ksiazka->strony = $dane['strony'];

		$this->xmlKsiazki->asXML($this->plikKsiazki);
	}

	/**
	 * Edytuje dane autora.
	 *
	 * @param integer $id
	 * @param array $dane
	 */
	public function zapiszAutora($id, $dane)
	{
		$autor = $this->xmlAutorzy->xpath("//autor[id=$id]")[0];
		$autor->imie = $dane['imie'];
		$autor->nazwisko = $dane['nazwisko'];

		$this->xmlAutorzy->asXML($this->plikAutorzy);
	}

	/**
	 * Edytuje dane rodzaju.
	 *
	 * @param integer $id
	 * @param array $dane
	 */
	public function zapiszRodzaj($id, $dane)
	{
		$rodzaj = $this->xmlRodzaje->xpath("//rodzaj[id=$id]")[0];
		$rodzaj->nazwa = $dane['nazwa'];

		$this->xmlRodzaje->asXML($this->plikRodzaje);
	}

	/**
	 * Usuwa książkę o podanym ID.
	 *
	 * @param integer $id
	 */
	public function usunKsiazke($id)
	{
		$ksiazka = $this->xmlKsiazki->xpath("//ksiazka[id=$id]")[0];
		unset($ksiazka[0]);

		$this->xmlKsiazki->asXML($this->plikKsiazki);
	}

	/**
	 * Usuwa autora o podanym ID.
	 *
	 * @param integer $id
	 */
	public function usunAutora($id)
	{
		$autor = $this->xmlAutorzy->xpath("//autor[id=$id]")[0];
		unset($autor[0]);

		$this->xmlAutorzy->asXML($this->plikAutorzy);
	}

	/**
	 * Usuwa rodzaj o podanym ID.
	 *
	 * @param integer $id
	 */
	public function usunRodzaj($id)
	{
		$rodzaj = $this->xmlRodzaje->xpath("//rodzaj[id=$id]")[0];
		unset($rodzaj[0]);

		$this->xmlRodzaje->asXML($this->plikRodzaje);
	}
}
