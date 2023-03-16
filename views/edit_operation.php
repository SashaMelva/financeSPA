<section class="container">
    <?php if ($this->arguments[0]) : ?>
        <div>
            <p><?= $this->arguments[0] ?></p>
        </div>
    <?php endif; ?>
    <div class="form-container">
        <form class="form-display form-add" action="" method="POST">
            <input id="form-name" name="form-name" value="add_operation" hidden>
            <label>You login</label>
            <input class="input-form input-login-user" id="login" name="login" readonly>
            <legend class="legend-form">Edit an operation</legend>
            <label for="sum">Specify the amount</label>
            <input class="input-form" id="sum" name="sum">
            <label for="operations-type">Specify type</label>
            <select class="input-form" id="operations-type" name="operations-type">
                <option class="type-id-1" value="1" selected>incoming</option>
                <option class="type-id-2" value="2">expense</option>
            </select>
            <label for="comment">Comment on the operation</label>
            <input class="input-form" id="comment" name="comment">
            <div class="btn" onclick="fetchAndViewAddOperation()">Save</div>
        </form>
        <div class="btn-form">
            <button class="btn btn-sign-up" onclick="fetchAndViewOperationListForm()">Back</button>
        </div>
    </div>
</section>