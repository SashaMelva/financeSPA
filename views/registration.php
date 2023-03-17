<section class="container">
    <?php if ($this->arguments[0]) : ?>
        <div>
            <p><?= $this->arguments[0] ?></p>
        </div>
    <?php endif; ?>
    <div class="form-container">
        <form class="form-display form-registration" method="POST">
            <input id="form-name" name="form-name" value="registration" hidden>
            <legend class="legend-form">Registration</legend>
            <label for="login">Enter login</label>
            <input class="input-form" id="login" name="login" type="text" placeholder="login" required>
            <label for="password">Enter password</label>
            <input class="input-form" id="password" name="password" type="password" placeholder="password" required>
            <label for="repeat-password">Repeat password</label>
            <input class="input-form" id="repeat-password" name="repeat-password" type="password"
                   placeholder="Repeat password" required>
            <div onclick="fetchAndViewRegistration()" class="btn">Sign up</div>
        </form>
        <div class="btn-form">
            <button onclick="fetchAndViewAuthorizationForm()" class="btn btn-sign-up">Back</button>
        </div>
    </div>
</section>