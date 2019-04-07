<?php

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
    require_once ('model/Session.php');


    class ControllerFrontend {   
        
        public static function posts() {
            $postsManager = new PostManager;
            $posts = $postsManager->getPosts();
            require ('view/viewFrontend/posts.php');
        }


        public static function post() {
            $id_post = $_GET['post'];

            $session = new Session;
            $session->flash();

            if(!empty($_GET['post'])) {
                
                $postManager = new PostManager;
                $post = $postManager->getPost($_GET['post']); 
                $commentManager = new CommentManager;
                $comments = $commentManager->getComment($_GET['post']);

                if(!$post) {
                    header('Location: view/viewfrontend/error_page.php');
                    exit();
                }
            }
            else {
                header("Location: view/viewfrontend/error_page.php");
                exit();   
            }
  
            if(isset($_GET['report'])) {
                $commentUpdate = new Comment([
                    'id' => $_GET['comment'],
                ]);
                $commentManagerUpdate = new CommentManager;
                $commentManagerUpdate->updateComment($commentUpdate);
                
                $session->setFlash('Le commentaire a bien été signalé');
                 
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

                    $session->setFlash('Votre commentaire a bien été publié');
    
                    header("Location: index.php?action=post&post=$id_post");
                    exit();
                }
            }
            require ('view/viewFrontend/post.php');
            }
        
    }