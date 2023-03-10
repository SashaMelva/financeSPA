<section class="container">
    <div class="form-container">
        <form class="form-display form-authorization" action="" method="POST">
            <input id="formm" name="formm" value="authorization" hidden>
            <legend class="legend-form">Authorization</legend>
            <label for="login">Enter login</label>
            <input class="input-form" id="login" name="login" type="text" placeholder="login" required>
            <label for="password">Enter password</label>
            <input class="input-form" id="password" name="password" type="password" placeholder="password" required>
            <div class="btn btn-sign-up" onclick="authorization()">Sign in</div>
        </form>
        <div class="btn-form">
            <button class="btn btn-sign-up" onclick="loadRegistration()">Sign up</button>
        </div>
    </div>
</section>