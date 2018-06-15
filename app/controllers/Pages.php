<?php
    class Pages extends Controller {
        public function __construct(){
        }

        public function index(){
            if(isLoggedIn()){
                redirect('/posts');
            }
            $data = [
                'title' => 'SharePosts',
                'desc' => 'This is a simple social networking app called SharePost where you can post your views ;-)'
            ];
            $this->view('pages/index',$data);
        }

        public function about(){
            $data = [
                'title' => 'About SharePost!!',
                'desc' => 'This is a simple social networking app called SharePost where you can post your views.<br>You have to first register yourself here on this website.<br>Then you can login and start sharing.'
            ];
            $this->view('pages/about',$data);
        }
    }