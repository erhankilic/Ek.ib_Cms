<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
**Author: Erhan Kılıç
**Web Site: http://www.ideayazilim.net
**E-Mail: info@ideayazilim.net
*/

class MY_Controller extends CI_Controller {
//Benim Kontroller'ım...

    public function __construct(){
    //Construct metodu...
        parent::__construct();
		if ($this->session->userdata("login") == null){
            redirect ('auth');
        }
    }

}


/* End of file MY_Controller.php */
/* Location: ./cms/core/MY_Controller.php */