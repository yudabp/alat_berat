<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

	function version($version)
	{
		// load migration library
        $this->load->library('migration');
		// $version = $this->uri->segment(2);

        if ( ! $this->migration->version($version))
        {
            echo 'Error' . $this->migration->error_string();
        } else {
            echo 'Migrations ran successfully!';
        }
	}
}
?>
