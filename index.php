<?php

    require_once 'controller/Controller.php';


    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'postsAdmin') {
            Controller::postsAdmin();
        }
        elseif ($_GET['action'] == 'posts') {
            Controller::posts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['post'])) {
                Controller::post();
            }
        }
        elseif ($_GET['action'] == 'newPost') {
            Controller::newPost();
        }
        elseif ($_GET['action'] == 'commentsReport') {
            Controller::commentsReport();
        }
        elseif ($_GET['action'] == 'updatePost') {
            Controller::updatePost();
        }
        elseif ($_GET['action'] == 'userInsert') {
            Controller::userInsert();
        }
        elseif ($_GET['action'] == 'login') {
            Controller::login();
        }
        elseif ($_GET['action'] == 'signOut') {
            Controller::signOut();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    else {
        if (isset($_SESSION['user'])) {
            Controller::postsAdmin();
        }
        else {
            Controller::posts();
        }
    }

