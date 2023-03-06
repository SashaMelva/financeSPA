<section class="container">
    <h2>Your finances</h2>
    <?php foreach ($operations as $operation) : ?>
        <?= $operation['operations_id'] ?>
        <?= $operation['name'] ?>
        <?= $operation['sum'] ?>
        <?= $operation['login'] ?>
        <?= $operation['comment'] ?>
    <?php endforeach; ?>
</section>