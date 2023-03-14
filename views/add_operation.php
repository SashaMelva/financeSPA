<section class="container">
    <div class="form-container">
        <form class="form-display form-add" action="" method="POST">
            <legend class="legend-form">Adding an operation</legend>
            <input id="userId" name="userId" value="1">
            <label for="sum">Specify the amount</label>
            <input id="sum" name="sum">
            <label for="operations-type">Specify type</label>
            <input id="operations-type" name="operations-type">
            <label for="comment">Comment on the operation</label>
            <input id="comment" name="comment">
            <div class="btn" onclick="addOperation()">Save</div>
        </form>
        <div class="btn-form">
            <button class="btn btn-sign-up" onclick="loadMainOperation()">Back</button>
        </div>
    </div>
</section>