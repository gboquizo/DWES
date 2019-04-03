<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 07/03/2019
 * Time: 0:35
 */
?>
<form method='post' action='' style="margin: 20px auto">
    <div class="form-group">
        <label for="exampleInputName">Usuario:</label>
        <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="redactor" name='nombre' value="<?php echo $name ?>"><br>
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name='pass' placeholder="redactor"><br>
    </div>
    <button type="submit" name='login' class="btn btn-primary">Login</button>
    <div class="form-group">
        <span style="background-color: red; color: white"><?php echo $mensaje ?></span>
    </div>
</form>
