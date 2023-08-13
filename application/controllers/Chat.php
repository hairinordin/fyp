<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    class Chat extends MY_Controller {

        public function __construct() {
            Parent::__construct();
            $this->load->model("Chat_model", "chat");
        }

        public function index() {
            $data["data"] = $this->chat->get_all();

            $this->viewit("books_index.php", $data);
        }

        public function set() {

        }

}

?>