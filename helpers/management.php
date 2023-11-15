<?php

// class UserManagement {

//     public static function login($username, $password) {
//         // Ici, vous pouvez effectuer la logique de connexion en vérifiant les informations d'identification.
//         // Si les informations sont correctes, vous pouvez initialiser la session avec le rôle approprié.
//         if ($username === "admin" && $password === "adminpass") {
//             $_SESSION['users']->role_management = new Users($username, ADMIN, 'admin'); 
//             return true;
//         } else if ($username === "user" && $password === "userpass") {
//             $_SESSION['users']->role_management = new Users($username, NULL, 'user'); 
//             return true;
//         } else {
//             return false;
//         }
//     }

//     public static function isLoggedIn() {
//         return isset($_SESSION['users']);
//     }

//     public static function logout() {
//         unset($_SESSION['users']);
//     }
// }




// // Exemple d'utilisation :

// // Tentative de connexion
// if (UserManagement::login("admin", "adminpass")) {
//     echo "Connexion réussie en tant qu'administrateur.";
// } else {
//     echo "Échec de la connexion.";
// }

// // Vérification de la session
// if (UserManagement::isLoggedIn()) {
//     $loggedInUser = $_SESSION['users']->role_management;
//     echo "L'utilisateur est connecté en tant que : " . $loggedInUser->getRole();
// } else {
//     echo "L'utilisateur n'est pas connecté.";
// }

// // Déconnexion
// UserManagement::logout();






