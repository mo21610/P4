<?php

    require_once 'controller/ControllerFrontend.php';
    require_once 'controller/ControllerBackend.php';

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'postsAdmin') {
            ControllerBackend::postsAdmin();
        }
        elseif ($_GET['action'] == 'posts') {
            ControllerFrontend::posts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['post'])) {
                ControllerFrontend::post();
            }
        }
        elseif ($_GET['action'] == 'newPost') {
            ControllerBackend::newPost();
        }
        elseif ($_GET['action'] == 'commentsReport') {
            ControllerBackend::commentsReport();
        }
        elseif ($_GET['action'] == 'updatePost') {
            ControllerBackend::updatePost();
        }
        elseif ($_GET['action'] == 'registration') {
            ControllerBackend::registration();
        }
        elseif ($_GET['action'] == 'login') {
            ControllerBackend::login();
        }
        elseif ($_GET['action'] == 'signOut') {
            ControllerBackend::signOut();
        }
        else {
            header("Location: view/viewfrontend/error_page.php");
            exit();
        }
    }
    else {
        if (isset($_SESSION['user'])) {
            ControllerBackend::postsAdmin();
        }
        else {
            ControllerFrontend::posts();
        }
    }

