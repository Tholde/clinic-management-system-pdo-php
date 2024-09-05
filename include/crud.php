<?php 
    interface crud {
        public function insert($param);
        public function update($param1);
        public function delete();
        public function select();
    }
?>