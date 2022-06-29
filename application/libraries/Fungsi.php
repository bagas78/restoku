<?php
class Fungsi {
	function rupiah($nominal)
	{
		$rp = number_format($nominal,0,',','.');
			return $rp;
	}

	function rupiahkoma($nominal)
	{
		$rpk = number_format($nominal,0,'.',',');
			return $rpk;
	}
	}
?>
