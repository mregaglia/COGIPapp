<?php if($Auth->user('ID')):?>
<h1>Bonjour<?php echo $Auth->user('login');?></h1>
<ul>
    <li><a href="index.php?p=compte">Mon compte</a></li>
    <?php if($Auth->user('roles')=='admin'): ?>
        <li><a href="index.php?p=admin">Administration</a></li>
    <?php endif;?>
    <li><a href="index.php?p=logout">Se déconnecter</a></li>

<?php endif; ?>


<h1>Acceuil</h1>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget varius felis, efficitur congue libero. Pellentesque volutpat sapien at orci viverra, et venenatis mauris dignissim. Etiam sed rutrum enim. Donec luctus sapien ac mauris tempus porttitor et ut ante. Sed quam arcu, imperdiet vel orci sed, tempor luctus enim. Mauris eu ligula imperdiet, vulputate metus eu, blandit purus. Etiam eu eros eu arcu volutpat ullamcorper. Aliquam interdum dolor sit amet quam consectetur consectetur. Aliquam interdum velit id quam consequat euismod. Duis hendrerit blandit tempor. Curabitur tristique hendrerit tortor, sodales laoreet mi ultricies ac. Etiam ac fringilla libero. Aliquam erat volutpat. Vestibulum sodales dolor at nisi tempus, nec semper tortor faucibus. Aliquam mollis justo ut odio sagittis vulputate. Integer pharetra, lectus aliquet tempor aliquet, libero lacus tempor lorem, a cursus leo justo sit amet enim.

    Mauris pharetra lobortis ante a lacinia. Maecenas eu tellus pretium odio posuere fermentum. Sed sagittis a metus non congue. Quisque aliquam tempor tellus quis hendrerit. Proin vehicula, quam eget sagittis ullamcorper, arcu elit ultrices enim, tristique vestibulum nibh tortor nec nibh. Nullam placerat urna vitae augue congue varius. Aenean dictum nisi eget augue commodo, eget euismod eros mattis. Mauris imperdiet gravida fringilla.

    Vestibulum sollicitudin quam vitae dolor tempus, vel pellentesque justo dapibus. Maecenas consectetur consectetur lorem et laoreet. Nam in arcu gravida, dignissim lorem nec, vulputate neque. Ut feugiat hendrerit quam, in molestie ex euismod ut. Mauris ultrices dui non pulvinar mollis. Nulla in neque at nisi tincidunt finibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean ac nunc tempus, porttitor ante eget, facilisis purus. In metus dolor, fermentum et nulla a, varius facilisis tellus. Aenean eget posuere augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec convallis elit sed enim ultrices, sit amet facilisis felis mollis. Nulla molestie libero sed lorem iaculis, eu vulputate ligula porttitor.</p>