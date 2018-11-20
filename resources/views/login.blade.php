<?php
require_once 'helpers.php';

if ($_POST){
    $verify = $db->verifyUser($_POST['email'],$_POST['password']);
    if ($verify){
        $user = $db->bringUser($_POST['email']);
        $session->crearSesion($user);
        redirect('profile.php');
    } else {
        $errors['email'] = "El usuario o la password es incorrecto.";
    }
}


if (check()) {
    redirect('profile.php');
}

?>

<?php require_once '_header.php'?>
<?php
    if (isset($errors['email'])) {
        echo $errors['email'];
    }
?>
<div class="login-form">
    <form action="" method="post">
    <h3>Login</h3>
        <label for="">Email:</label>
        <input type="email" name="email" value="<?= old('email'); ?>">
        <label for="">Contrasenia:</label>
        <input type="password" name="password">
        <label for=""><input type="checkbox" name="remindme">  Recordar mi Contrasenia</label>
        <input type="submit">
    </form>
</div>
<?php require_once '_footer.php'?>
