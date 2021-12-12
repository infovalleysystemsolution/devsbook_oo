<?php
require 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>login</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?php echo $base;?>/assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href="<?php echo $base;?>"><img src="<?php echo $base;?>/assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?php echo $base;?>/signup_action.php" >
            <?php if (!empty($_SESSION['flash'])): ?>

                <?php echo $_SESSION['flash']; ?>
                <?php $_SESSION['flash'] = ''; ?>

            <?php endif; ?>
            <input placeholder="Digite seu Nome Completo" class="input" type="text" name="name" />

            <input placeholder="Digite seu e-mail" class="input" type="email" name="email" />
            
            <input placeholder="Digite sua senha" class="input" type="password" name="password" />

            <input placeholder="Digite seu Data de Nascimento" class="input" type="text" name="birthdate" id="birthdate" />

            <input class="button" type="submit" value="Fazer Cadastro" />

            <a href="<?php echo $base;?>/login.php">Já tem tem conta? Faça o Login</a>
        </form>
    </section>

    <!-- // "<?php echo $base;?>/assets/js/imask.min.js" -->
    <!-- 'https://unpkg.com/browse/imask@6.2.2/dist/imask.min.js' -->
    <script type="text/javascript" src = "<?php echo $base;?>/assets/js/imask.min.js"  > </script>

    <script type="text/javascript" > 
        IMask(
            document.getElementById("birthdate"),
            {mask: '00/00/0000'}
        );
    </script>

</body>
</html>