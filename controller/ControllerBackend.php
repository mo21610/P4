<?php

    session_start();

    use \MG\P4\Model\Comment;
    use \MG\P4\Model\CommentManager;
    use \MG\P4\Model\Post;
    use \MG\P4\Model\PostManager;
    use \MG\P4\Model\User;
    use \MG\P4\Model\UserManager;
    use \MG\P4\Model\Session;

    require_once ('model/Post.php');
    require_once ('model/PostManager.php');
    require_once ('model/Comment.php');
    require_once ('model/CommentManager.php');
    require_once ('model/User.php');
    require_once ('model/UserManager.php');
    require_once ('model/Session.php');




    class ControllerBackend {      

        public static function postsAdmin() {
            if (isset($_SESSION['flash'])) {
                echo $_SESSION['flash'];
                unset($_SESSION['flash']);
            }
            
            $postsManager = new PostManager;
            $posts = $postsManager->getPosts();

            if(isset($_GET['post'])) {
                $postManagerDelete = new PostManager;
                $postDelete = $postManagerDelete->deletePost($_GET['post']);

                header('Location: index.php?action=postsAdmin');
                exit();
            }
            
            require ('view/viewBackend/postAdminView.php');
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
                    $_SESSION['flash'] = 'Votre post a bien été publié';
                    header('Location: index.php?action=postsAdmin');
                    exit();
                }
            }
            require ('view/viewBackend/newPostView.php');        
        }


        public static function commentsReport() {
            $commentManagerReport = new CommentManager;
            $commentsReport = $commentManagerReport->getCommentReport();

            if (isset($_GET['comment'])) {
                $commentManagerDelete = new CommentManager;
                $commentDelete = $commentManagerDelete->deleteComment($_GET['comment']);

                header('Location: index.php?action=commentsReport');
                exit();
            }
            elseif(isset($_GET['report'])) {
                $commentUpdateReport = new Comment([
                    'id' => $_GET['comment'],
                ]);
                $commentManagerUpdateReport = new CommentManager;
                $commentManagerUpdateReport->updateCommentReport($commentUpdateReport);
        
                header('Location: index.php?action=commentsReport');
                exit();
            }
            require ('view/viewBackend/commentsReportView.php');           
        }


        public static function updatePost() {            
            $postManager = new PostManager;
            $post = $postManager->getPost($_GET['post']);

            if(isset($_POST['title_edit']) && isset($_POST['post_edit'])) {
                $postUpdate = new Post([
                    'id' => $_GET['post'],
                    'title' => $_POST['title_edit'],
                    'post' => $_POST['post_edit'],
                ]);
                
                $postManagerUpdate = new PostManager;
                $postManagerUpdate->updatePost($postUpdate);
        
                header('Location: index.php?action=postsAdmin');
                exit();      
            }
            require ('view/viewBackend/postUpdateView.php');           
        }


        public static function userInsert() {
            if(!empty($_POST)) { 
                $validation = true;
                
                if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
                    echo "Veuillez renseigner tous les champs";
                    $validation = false;
                }
                $userManager = new UserManager;
                if ($userManager->getUser($_POST['username']) != false) {
                    $validation = false;
                    echo "Pseudo déjà utilisé";              
                }
                if($_POST['password'] != $_POST['confirm_password']) {
                    echo "Veuillez inscrire le même mot de passe dans mot de passe et confirmation mot de passe";
                    $validation = false;
                } 

                if ($validation == true){           
                     // Hachage du mot de passe
             
                        $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
                        $userInsert = new User([
                            'username' => $_POST['username'],
                            'password' => $pass_hash,
                        ]);
                        $userManager->userInsert($userInsert);
                        
                        header("Location: index.php?action=login");
                        exit();
                    
                }
            }
            require ('view/viewBackend/registrationView.php');             
        }


        public static function login() {
            if(!empty($_POST)) { 
                $validation = true;
                if(empty($_POST['username']) || empty($_POST['password'])) {
                    echo "Veuillez renseigner tous les champs";
                    $validation = false;
                }  
                else {
                    $username = $_POST['username'];
                    $userManager = new UserManager;
                    $user = $userManager->getUser($username);
                    if (!$user) {
                        echo 'Mauvais identifiant';
                    }
                    else {
                        $isPasswordCorrect = password_verify($_POST['password'], $user->password());
                        if($isPasswordCorrect) {
                            $_SESSION['user'] = $user->password();
                            header('Location:index.php?action=postsAdmin');
                            exit(); 
                        }
                        else {
                            echo 'Mot de passe incorrect';
                        }                                         
                    }                             
                }
            }
            require ('view/viewBackend/loginView.php');
        }

        public static function signOut() {
            session_destroy();
            header('Location:index.php?action=login');
            exit();
        }

    }