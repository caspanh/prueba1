<div class="page-header">
    <h2><?= t('Remove user') ?></h2>
</div>

<div class="confirm">
    <p class="alert alert-info"><?= t('Do you really want to remove this user: "%s"?', $user['name'] ?: $user['username']) ?></p>

    <div class="form-actions">
        <?= $this->url->link(t('Yes'), 'user', 'remove', array('user_id' => $user['id'], 'confirmation' => 'yes'), true, 'btn btn-red') ?>
    <div class="botoncancel">
        <?= $this->url->link(t('cancel'), 'user', 'show', array('user_id' => $user['id'])) ?>
    </div>
    </div>
</div>