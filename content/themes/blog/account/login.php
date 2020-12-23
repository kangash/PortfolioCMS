<?php $theme->themeBuilder('common\header'); ?>



<div class="container">
    <form class="form-signin" role="form" method='POST' action="/account/login/auth/">
        <h2 class="form-signin-heading">Login to CMS</h2>
        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button style="background: blue;" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</div> <!-- /container -->


<?php $theme->themeBuilder('common\footer'); ?>
