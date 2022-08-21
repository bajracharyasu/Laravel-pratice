<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Log in</title>
</head>
<body>
    <div class="container">
        <form action="/users/authenticate" method="POST">
            <?php echo csrf_field(); ?>
            <label>Email: </label>
            <input type="text" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>"><br>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p>Email is required</p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <label>Password: </label>
            <input type="text" name="password" id="password" class="form-control" value="<?php echo e(old('password')); ?>"><br>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p>Password is required</p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <input type="submit" value="LOG IN" class="btn btn-primary"><br>
            <a href="/register">Dont have a acc click here!!!</a>
        </form>
    </div>
</body>
</html><?php /**PATH C:\xampp1\htdocs\productCrud\resources\views/users/login.blade.php ENDPATH**/ ?>