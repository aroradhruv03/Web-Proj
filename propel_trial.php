<?php


	// setup the autoloading
	require_once '/Applications/MAMP/htdocs/vendor/autoload.php';

	// setup Propel
	require_once '/Applications/MAMP/htdocs/propel_generated/generated-conf/config.php';
	echo "hello, propel is working fine!";

	// use Monolog\Logger;
	// use Monolog\Handler\StreamHandler;
	// $defaultLogger = new Logger('defaultLogger');
	// $defaultLogger->pushHandler(new StreamHandler('/var/log/propel.log', Logger::WARNING));
	// $serviceContainer->setLogger('defaultLogger', $defaultLogger);

	
	// Adding to categories...
	// $Categories = new Categories();
	// $Categories->setCategoryName('Misc');
	// $Categories->save();

	// echo $Categories->getCategoryId();

	// retrieves obj with pk as 1
	$q = new CategoriesQuery();
	$firstAuthor = $q->findPK(1);
	echo "<br/>";
	echo $firstAuthor;

?>