<?php

namespace Hcode;

use Rain\Tpl;

class Pageadmin extends Page{

	public function __construct($opts = array(), $tpl_dir = "/views/admin/")
	{
		parent::__construct($opts, $tpl_dir);
	}
}

?>