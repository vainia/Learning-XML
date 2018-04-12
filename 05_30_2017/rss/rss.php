<?
  header("Content-Type: application/xml; charset=utf-8");

  include("rss.class.php");
  $rss = new RSS();
  $filename = "kanal_rss.xml";

  if(file_exists($filename)){
    if((time()-filemtime($filename))/60>5){
      $kanal = fopen($filename, "w");
      fwrite($kanal, $rss->pobierz());
      fclose($kanal);
    }
  } else {
    $kanal = fopen($filename, "w");
    fwrite($kanal, $rss->pobierz());
    fclose($kanal);
  }

  echo file_get_contents($filename);

//UPDATE `test`.`rss_details` SET `lastBuildDate` = '2017-05-29 11:11:11' WHERE `rss_details`.`id` = 1;

//SELECT left( lastBuildDate( dw, getutcdate() ), 3 ) + ', ' +
//       convert( varchar(20), getutcdate(), 113 ) + ' GMT+01' FROM rss_details

//$sql = ("SELECT *,
//FROM rss_details
//date_format(lastBuildDate, '%a, %d %b %Y %T GMT+01') as lastBuildDate
//FROM example_events");
