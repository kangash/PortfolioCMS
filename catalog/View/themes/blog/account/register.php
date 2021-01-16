<?php $theme->themeBuilder('common\header'); ?>

<div class="container">
    <form class="form-signin" role="form" method='POST', action="/account/register/add/">
        <h2 class="form-signin-heading">Register to CMS</h2>
        <input type="text" name="name" class="form-control" placeholder="Name: Имя Фамилия" required autofocus>
        <input type="login" name="login" class="form-control" placeholder="Login" required autofocus>
        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <input type="hidden" name="role" class="form-control" value="user">
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button style="background: blue;" class="btn btn-lg btn-primary btn-block" type="submit">Register new user</button>
    </form>
</div> <!-- /container -->



<?php $theme->themeBuilder('common\footer'); ?>