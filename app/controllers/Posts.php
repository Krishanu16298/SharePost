<?php
    class Posts extends Controller {
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->postModel = $this->model('Post');
            $this->userModel = $this->model('User');
        }
        public function index(){

            $posts = $this->postModel->getPosts();

            $data = [
                'title' => 'Your Posts',
                'desc' => 'This is the page where you can write and edit your posts!',
                'posts' => $posts
            ];
            $this->view('posts/index',$data);
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_error' => '',
                    'body_error' => ''
                ];

                //validation
                if(empty($data['title'])){
                    $data['title_error'] = 'Please enter Title!';
                }
                if(empty($data['body'])){
                    $data['body_error'] = 'Please enter the contents of the post';
                }
                
                if(empty($data['title_error']) && empty($data['body_error'])){
                    if($this->postModel->addPost($data)){
                        flash('post_msg','Your post is added');
                        redirect('posts');
                    } else {
                        flash('adderror','Your post is not added due to some error!!','alert alert-danger');
                    }
                } else {
                    flash('adderror','Your post is not added due to some error!!','alert alert-danger');
                    $this->view('posts/add',$data);
                }

            }else{
                $data = [
                    'title' => '',
                    'body' => ''
                ];
    
                $this->view('posts/add', $data);
            }
        }

        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['user_id'],
                    'title_error' => '',
                    'body_error' => ''
                ];

                //validation
                if(empty($data['title'])){
                    $data['title_error'] = 'Please enter Title!';
                }
                if(empty($data['body'])){
                    $data['body_error'] = 'Please enter the contents of the post';
                }
                
                if(empty($data['title_error']) && empty($data['body_error'])){
                    if($this->postModel->updatePost($data)){
                        flash('post_msg','Your post is updated');
                        redirect('posts');
                    } else {
                        flash('uperror','Your post is not updated due to some error!!','alert alert-danger');
                    }
                } else {
                    flash('uperror','Your post is not updated due to some error!!','alert alert-danger');
                    $this->view('posts/edit',$data);
                }

            }else{
                $post = $this->postModel->getPostById($id);

                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts');
                }

                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body
                ];
    
                $this->view('posts/edit', $data);
            }
        }

        public function show($id){
            $post = $this->postModel->getPostById($id);
            $user = $this->userModel->getUserById($post->user_id);

            $data = [
                'post' => $post,
                'user' => $user
            ];

            $this->view('posts/show', $data);
        }

        public function delete($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $post = $this->postModel->getPostById($id);

                if($post->user_id != $_SESSION['user_id']){
                    redirect('posts');
                }
                
                if($this->postModel->deletePost($id)){
                    flash('post_msg','Post Removed!');
                    redirect('posts');
                } else {
                    flash('del_err','Something went wrong!!','alert alert-danger');
                }
            }else{
                redirect('posts');
            }
        }

    }