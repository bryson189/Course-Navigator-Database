<?php

	function endsWith($string, $substring)
	{
	    $length = strlen($substring);
	    if ($length == 0) {
	        return true;
	    }

	    return (substr($string, -$length) === $substring);
	}

?>