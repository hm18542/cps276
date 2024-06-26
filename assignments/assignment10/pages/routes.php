<?php

function get_nav() {
    //decide the user's role and show the linkes
    $nav_common = <<<HTML
        <nav>
            <ul class="list-unstyled">
                <!-- <li class="d-inline-block"><a href="index.php?page=welcome" class="me-3">Welcome</a></li> -->
                <li class="d-inline-block"><a href="index.php?page=addContact" class="me-3">Add Contact</a></li>
                <li class="d-inline-block"><a href="index.php?page=deleteContacts" class="me-3">Delete Contact(s)</a></li>
    HTML;

    $nav_admin = '';
    if (isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'admin') {
        $nav_admin = <<<HTML
                <li class="d-inline-block"><a href="index.php?page=addAdmin" class="me-3">Add Admin</a></li>
                <li class="d-inline-block"><a href="index.php?page=deleteAdmins" class="me-3">Delete Admin(s)</a></li>
    HTML;
    }

    $nav_logout = '';
    if (isset($_SESSION['status']) && $_SESSION['status'] === 'loggedin') {
        $nav_logout = <<<HTML
                <li class="d-inline-block"><a href="logout.php" class="me-3">Logout</a></li>
            </ul>
        </nav>
    HTML;
    }

    return $nav_common . $nav_admin . $nav_logout;
}

function get_content($page) {
    ob_start();
    switch ($page) {
        case 'login':
            require_once 'pages/login.php';
            break;
        case 'welcome':
            require_once 'pages/welcome.php';
            break;
        case 'addContact':
            require_once 'pages/addContact.php';
            break;
        case 'deleteContacts':
            require_once 'pages/deleteContacts.php';
            break;
        case 'addAdmin':
            //check if: user has admin Privileges
            if (isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'admin') {
                require_once 'pages/addAdmin.php';
            } else {
                header('Location: index.php?page=login');
            }
            break;
        case 'deleteAdmins':
            if (isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'admin') {
                require_once 'pages/deleteAdmins.php';
            } else {
                header('Location: index.php?page=login');
            }
            break;
        default:
            //redirect to the login pages
            header('Location: index.php?page=login');
            break;
    }
    return ob_get_clean();
}