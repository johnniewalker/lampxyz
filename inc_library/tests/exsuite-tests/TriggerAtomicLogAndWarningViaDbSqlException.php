<?php

require_once( 'Xandria/Db/SQLException.php' );

echo '<p>This is meant to create an Atomic Log</p>';

try	{
	throw new Xandria_Db_SQLException( 'Manually triggered in ' . __FILE__ );
	}
catch(Xandria_Db_SQLException $e)
	{
	echo $e->getMessage();
	}	