<?php
session_start();

require_once ('model/Post.php');
require_once ('model/PostManager.php');
require_once ('model/Comment.php');
require_once ('model/CommentManager.php');
require_once ('model/User.php');
require_once ('model/UserManager.php');
require_once ('model/Session.php');

class ControllerBackend {      
    public static function postsAdmin() {
        
        $postsManager = new PostManager;
        $posts = $postsManager->getPosts();
        $session = new Session;
        $session->flash();
        if(isset($_GET['post'])) {
            $postManagerDelete = new PostManager;
            $postDelete = $postManagerDelete->deletePost($_GET['post']);
            $session->setFlash('Votre billet a bien été supprimé');
            header('Location: index.php?action=postsAdmin');
            exit();
        }
        
        require ('view/viewBackend/postsAdmin.php');
    }
    public static function newPost() {
        if (!empty($_POST)) {
            $validation = true;       
            if (empty($_POST)) {
                $validation = false;
            }
            if ($validation == true) {
                $postInsert = new Post([
                    'title' => $_POST['title'],
                    'post' => $_POST['post'],
                ]);
                $postManagerInsert = new PostManager;
                $postManagerInsert->addPost($postInsert);
                
                $session = new Session;
                $session->setFlash('Votre billet a bien été publié');
                header('Location: index.php?action=postsAdmin');
                exit();
            }
        }
        require ('view/viewBackend/newPost.php');        
    }
    public static function commentsReport() {
        
        $commentManagerReport = new CommentManager;
        $commentsReport = $commentManagerReport->getCommentReport();
        $session = new Session;
        $session->flash();
        if(isset($_GET['report'])) {
            $commentUpdateReport = new Comment([
                'id' => $_GET['comment'],
            ]);
            $commentManagerUpdateReport = new CommentManager;
            $commentManagerUpdateReport->updateCommentReport($commentUpdateReport);
    
            $session->setFlash('Le commentaire est publié avec succès');
            header('Location: index.php?action=commentsReport');
            exit();
        }
        if (isset($_GET['comment'])) {
                $commentManagerDelete = new CommentManager;
                $commentDelete = $commentManagerDelete->deleteComment($_GET['comment']);

                $session->setFlash('Le commentaire a bien été supprimé');

                header('Location: index.php?action=commentsReport');
                exit();
            }
        require ('view/viewBackend/commentsReport.php');           
    }
    public static function updatePost() {
        $session = new Session;
        $session->flash();
        if (!empty($_GET['post'])) {            
            $postManager = new PostManager;
            $post = $postManager->getPost($_GET['post']);
            if(!$post) {
                header('Location: view/viewfrontend/error_page.php');
                exit();
            }
            if(isset($_POST['title_edit']) && isset($_POST['post_edit'])) {
                $postUpdate = new Post([
                    'id' => $_GET['post'],
                    'title' => $_POST['title_edit'],
                    'post' => $_POST['post_edit'],
                ]);
                
                $postManagerUpdate = new PostManager;
                $postManagerUpdate->updatePost($postUpdate);
                $session = new Session;
                $session->setFlash('Le billet a bien été modifié');
                
                header('Location: index.php?action=postsAdmin');
                exit();      
            }
            require ('view/viewBackend/updatePost.php');
        }
        else {
            header('Location: view/viewfrontend/error_page.php');
            exit();
        }          
    }
    public static function registration() {
        $session = new Session;
        $session->flash();
        if(!empty($_POST)) { 
            $validation = true;
            
            if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
                $session->setFlash('Veuillez renseigner tous les champs','danger');
                header('Location: index.php?action=registration');
                exit(); 
                $validation = false;
            }
            else {
                $userManager = new UserManager;
                if ($userManager->getUser($_POST['username']) != false) {
                    $session->setFlash('Pseudo déjà utilisé','danger');
                    header('Location: index.php?action=registration');
                    exit();
                    $validation = false;
                }
                elseif($_POST['password'] != $_POST['confirm_password']) {
                    $session->setFlash('Veuillez inscrire les même mots de passe','danger');
                    header('Location: index.php?action=registration');
                    exit();                        
                    $validation = false;
                } 
                if ($validation == true){           
                     // Hachage du mot de passe
                
                        $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                
                        $registration = new User([
                            'username' => $_POST['username'],
                            'password' => $pass_hash,
                        ]);
                        $userManager->registration($registration);
                        
                        $session->setFlash('Nouveau compte administrateur créé avec succès');
                        
                        header("Location: index.php?action=login");
                        exit();
                        
                }
            }
        }
        require ('view/viewBackend/registration.php');             
    }
    public static function login() {
        
        $session = new Session;
        $session->flash();
        if(!empty($_POST)) { 
            $validation = true;
            if(empty($_POST['username']) || empty($_POST['password'])) {
                $session->setFlash('Veuillez renseigner tous les champs','danger');
                header('Location: index.php?action=login');
                exit();
                $validation = false;
            }  
            else {
                $username = $_POST['username'];
                $userManager = new UserManager;
                $user = $userManager->getUser($username);
                if (!$user) {
                    $session->setFlash('Mauvais identifiants','danger');
                    header('Location: index.php?action=login');
                    exit();
                }
                else {
                    $isPasswordCorrect = password_verify($_POST['password'], $user->password());
                    if($isPasswordCorrect) {
                        $_SESSION['user'] = $user->password();
                        $session->setFlash('Connecté avec succès');
                        header('Location:index.php?action=postsAdmin');
                        exit(); 
                    }
                    else {
                        $session->setFlash('Mot de passe incorrect','danger');
                        header('Location: index.php?action=login');
                        exit();
                    }                                         
                }                             
            }
        }
        require ('view/viewBackend/login.php');
    }
    public static function signOut() {
        unset($_SESSION['user']);
        // session_destroy();
        header('Location:index.php?action=login');
        exit();
    }
}