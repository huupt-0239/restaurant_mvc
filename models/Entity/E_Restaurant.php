<?php
    class E_Restaurant {
        private $id;
        private $name;
        private $description;
        private $img_url;
        private $user_id;
        private $user_name;

        function __construct($id, $name, $description, $img_url, $user_id) {
            $this->id = $id;
            $this->name = $name;
            $this->description = $description;
            $this->img_url = $img_url;
            $this->user_id = $user_id;
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getImgUrl() {
            return $this->img_url;
        }

        public function getUserId() {
            return $this->user_id;
        }

        public function getUserName() {
            return $this->user_name;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function setImgUrl($img_url) {
            $this->img_url = $img_url;
        }

        public function setUserId($user_id) {
            $this->user_id = $user_id;
        }
    }
