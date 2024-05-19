<?php

    class PostController extends Post {
        private $user_id;
        private $text_content;
        private $audience;

        public function __construct($user_id, $text_content, $audience) {
            $this->user_id = $user_id;
            $this->text_content = $text_content;
            $this->audience = $audience;
        }

        public function getPosts($id) {
            $this->selectPosts($id);
        }

        // Attempt to log user into the website
        public function setPost($user_id, $text_content, $audience) {
            $this->addPost($user_id, $text_content, $audience);
    }
}