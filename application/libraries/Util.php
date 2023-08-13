<?php
class Util {
    public function err($msg, $opt='') {
        if (trim($msg === '')) {
            return '';
        } else {
            return "<div class='alert alert-danger' $opt>$msg</div>";
        }
    }
}