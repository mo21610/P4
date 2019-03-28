<?php

    session_start();

    use \MG\P4\Model\Comment;
    use \MG\P4\Model\CommentManager;
    use \MG\P4\Model\Post;
    use \MG\P4\Model\PostManager;
    use \MG\P4\Model\User;
    use \MG\P4\Model\UserManager;


    require_once ('model/Post.php');
    require_once ('model/PostManager.php');
    require_once ('model/Comment.php');
    require_once ('model/CommentManager.php');
    require_once ('model/User.php');
    require_once ('model/UserManager.php');


    class Controller {      


        /**
         * Affiche tous les post coté back end
         *
         * @return array
         */
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
            
            require ('view/postAdminView.php');
        }

        
        /**
         * Affiche tous les post coté front end
         *
         * @return void
         */
        public static function posts() {
            $postsManager = new PostManager;
            $posts = $postsManager->getPosts();
            require ('view/listPostView.php');
        }

        /**
         * Affiche la suite du post sélectionné avec ses commentaires associés
         *
         * @return void
         */
        public static function post() {
            $id_post = $_GET['post'];
            
            $postManager = new PostManager;
            $post = $postManager->getPost($_GET['post']);
            
            $commentManager = new CommentManager;
            $comments = $commentManager->getComment($_GET['post']);
            
            if(isset($_GET['report'])) {
                $commentUpdate = new Comment([
                    'id' => $_GET['comment'],
                ]);
                $commentManagerUpdate = new CommentManager;
                $commentManagerUpdate->updateComment($commentUpdate);   
                 
                header("Location: index.php?action=post&post=$id_post");
                exit();
            }

            elseif(!empty($_POST['author']) || !empty($_POST['comment'])) {
                $validation = true;
                if (empty($_POST['author']) || empty($_POST['comment'])) {
                    $validation = false;
                }
                if ($validation == true) {
                    $commentInsert = new Comment([
                        'id_post' => $_GET['post'],
                        'author' => $_POST['author'],
                        'comment' => $_POST['comment'],
                    ]);        
                    $commentManagerInsert = new CommentManager;
                    $commentManagerInsert->addComment($commentInsert);
    
                    header("Location: index.php?action=post&post=$id_post");
                    exit();
                }
            }
            require ('view/postView.php');
        }


        /**
         * Ajoute un nouveau post dans la BDD
         *
         * @return void
         */
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
            require ('view/newPostView.php');        
        }

        /**
         * Modifie le commentaire signalé en visible sur le blog ou bien le supprime
         *
         * @return void
         */
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
            require ('view/commentsReportView.php');           
        }

        /**
         * Modification du post dans BDD
         *
         * @return void
         */
        public static function updatePost() {
            $id_post = $_GET['post'];
            
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
            require ('view/postUpdateView.php');           
        }

        /**
         * Insertion espace utilisateur dans BDD
         *
         * @return void
         */
        public static function userInsert() {
            if(!empty($_POST)) { 
                $validation = true;
                
                if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
                    echo "Veuillez renseigner tous les champs";
                    $validation = false;
                }
                
               if ($validation == true){
                    if($_POST['password'] != $_POST['confirm_password']) {
                        echo "Veuillez inscrire le même mot de passe dans mot de passe et confirmation mot de passe";
                        $validation = false;
                    } 
                     // Hachage du mot de passe
                    else {
                        $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
                        $userInsert = new User([
                            'username' => $_POST['username'],
                            'password' => $pass_hash,
                        ]);
                        $userManagerInsert = new UserManager;
                        $userManagerInsert->userInsert($userInsert);
                        
                        header("Location: index.php?action=userInsert");
                        exit();
                    }
                }
            }
            require ('view/registrationView.php');             
        }

        
        /**
         * Connexion espace admin avec ouverture de session
         *
         * @return void
         */
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
                    if ($user) {
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
            require ('view/loginView.php');
        }

        /**
         * Deconnexion espace admin avec fermuture de session
         *
         * @return void
         */
        public static function signOut() {
        session_destroy();
        header('Location:index.php?action=login');
        exit();
        }

    }


        

    
 

