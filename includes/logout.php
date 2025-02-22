<?php
session_start();

// Limpa as variáveis de sessão
$_SESSION = array();

// Destroi o cookie de sessão, se estiver configurado
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroi a sessão
session_destroy();

// Redireciona para a página de login
header("Location: ../tela1.php");
exit;
?>

