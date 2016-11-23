<?
require_once('config.php');
require_once('phpquery.php');

try {
    $sql = new PDO($dbdsn, $dbuser, $dbpass, array(PDO::ATTR_PERSISTENT => true,
                                                   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch(PDOException$e) {
    if ($display_errors) die("Can't connect to database. Check your config.php. Details: ".$e->getMessage());
    else die("Can't connect to database. Check your config.php or set \$display_errors = true; to see details.");
}

$default_data_query = <<<QUERY
create table if not exists rotator (
	`id` int auto_increment not null,
    `name` varchar(64) not null,
    `url` varchar(255) not null unique,
	`balance` bigint unsigned default 0,
	`reward` bigint unsigned default 0,
	`period` bigint unsigned default 0,
	`rating` bigint unsigned default 0,
	
    primary key(`id`)
);
QUERY;

$sql->query($default_data_query);

$content=file_get_contents("http://bestbitcoinfaucets.com/");

$document = phpQuery::newDocument($content);

$hentry = $document->find('tr.trbot');
 
foreach ($hentry as $el) {
	$pq = pq($el);
	$name=$pq->find('td')->eq(0)->find("a.af")->text();
	$temp_url=$pq->find('td')->eq(0)->find("a.af")->attr("href");
	$url=explode("?", $temp_url)[0];
	
	$reward=$pq->find('td')->eq(1)->find("input")->val();
	$period=$pq->find('td')->eq(2)->find("input")->val();
	
	$q = $sql->prepare("INSERT INTO rotator (`name`, `url`, `reward`, `period`) VALUES (?,?,?,?)");
    $q->execute(array($name, $url, $reward, $period));
			
	print_r($period);
}
//var_dump($content);
?>