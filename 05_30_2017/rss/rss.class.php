<?

class RSS
{
	/**
	* @var PDO $pdo
	*/
	private $pdo;

	public function __construct()
	{
		$this->pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}

	/**
	 * Pobiera zawartość kanału RSS.
	 *
	 * @return string
	 */
	public function pobierz()
	{
		$rss = '<?xml version="1.0" encoding="UTF-8" ?>
				<rss version="2.0">
				<channel>';

		$rss .= $this->pobierzInformacje();
		$rss .= $this->pobierzElementy();

		$rss .= '
				</channel>
				</rss>';

		return $rss;
	}

	/**
	 * Pobiera część informacyjną kanału RSS.
	 *
	 * @return string
	 */
	private function pobierzInformacje()
	{
		$rss = '';
		$row = $this->pdo->query("SELECT * FROM rss_details")->fetch();
		$rss .='
					<title>'. $row['title'] .'</title>
					<link>'. $row['link'] .'</link>
					<description>'. $row['description'] .'</description>
					<language>'. $row['language'] .'</language>
					<image>
						<title>'. $row['image_title'] .'</title>
						<url>'. $row['image_url'] .'</url>
						<link>'. $row['image_link'] .'</link>
						<width>'. $row['image_width'] .'</width>
						<height>'. $row['image_height'] .'</height>
					</image>';

		return $rss;
	}

	/**
	 * Pobiera poszczególne wpisy w kanale RSS.
	 *
	 * @return string
	 */
	private function pobierzElementy()
	{
		$rss = '';
		foreach($this->pdo->query("SELECT * FROM rss_items") as $row)
		{
			$rss .= '
					<item>
						<title>'. $row["title"] .'</title>
						<link>'. $row["link"] .'</link>
						<description><![CDATA['. $row["description"] .']]></description>
					</item>';
		}

		return $rss;
	}
}
