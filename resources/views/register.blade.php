<?php
require_once 'helpers.php';
require_once 'controllers/filesController.php';

if ($_POST && $_FILES)
{
    $oldUser = $db->bringUser($_POST['email']);
    if ($oldUser===null){
        $user = new User($_POST['username'], $_POST['email'], $_POST['password'], '');
        $user->setName($_POST['name'])->setLastName($_POST['lastName'])->setDate($_POST['date'])->setComfirmPassword($_POST['comfirmPassword']);
        $errors = Validator::validateRegister($user);
        if (count($errors) === 0) {
            $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
            $user->setComfirmPassword(password_hash($user->getComfirmPassword(), PASSWORD_DEFAULT));
            $picID = saveProfilePic($_FILES['profilePic']);
            $user->setFotoPerfil($picID);
            $db->saveUser($user);
            $session->crearSesion($user);
            redirect("profile.php");
        }
    } else {
        $errors['email'] = 'El email ya está usado.';
    }
}

if (check()) {
    redirect('profile.php');
}

?>
<?php require_once '_header.php'?>
<?php
if(isset($errors) && count($errors) > 0): ?>
<div>
    <ul>
        <?php foreach ($errors as $value): ?>
            <li><?= $value ?></li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>


<div class="login-form">
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Sign Up</h3>
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="<?= old('name') ?>">
        <label for="">Apellido:</label>
        <input type="text" name="lastName" value="<?= old('lastName') ?>">
        <label for="">Username:</label>
        <input type="text" name="username" value="<?= old('username') ?>">
        <label for="">Email:</label>
        <input type="email" name="email" value="<?= old('email') ?>">
        <label for="">Fecha de Nacimiento:</label>
        <input type="date" name="date" value="<?= old('date') ?>">
        <label for="file">Password:</label>
        <input type="password" name ="password">
        <label for="">Comfirmar Password:</label>
        <input type="password" name="comfirmPassword">
        <label for="">Foto de perfil:</label>
        <input type="file" name="profilePic">
        <input type="submit">
    </form>
</div>

<?php require_once '_footer.php'?>
