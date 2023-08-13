<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lapangan extends MY_Controller {
    public function listing() {
        $this->viewit('lapangan/list');
    }
    
    public function form($sector) {
        $this->viewit('lapangan/form');
    }
}