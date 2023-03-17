<section class="container">
    <?php if ($this->arguments[0]) :?>
        <div>
            <p><?= $this->arguments[0]?></p>
        </div>
    <?php endif; ?>
    <div class="form-container">
        <form class="form-display form-authorization">
            <input id="form-name" name="form-name" value="authorization" hidden>
            <legend class="legend-form">Authorization</legend>
            <label for="login">Enter login</label>
            <input class="input-form" id="login" name="login" type="text" placeholder="login" required>
            <label for="password">Enter password</label>
            <input class="input-form" id="password" name="password" type="password" placeholder="password" required>
            <button type='button' class="btn btn-sign-up" onclick="fetchAndViewAuthorization()">Sign in</button>
        </form>
        <div class="btn-form">
            <button type='button'  class="btn btn-sign-up" onclick="fetchAndViewRegistrationForm()">Sign up</button>
        </div>
    </div>
</section>