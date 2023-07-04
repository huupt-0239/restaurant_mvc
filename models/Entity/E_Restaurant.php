<?php
    class E_Restaurant {
        public $id;
        public $name;
        public $description;
        public $img_url;
        public $user_id;

        function __construct($id, $name, $description, $img_url, $user_id) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->img_url = $img_url;
            $this->user_id = $user_id;
        }
    }
?>