<div class="page-header">
    <h2><?= $this->url->link(t('My tasks'), 'app', 'tasks', array('user_id' => $user['id'])) ?> (<?= $paginator->getTotal() ?>)</h2>
</div>
<?php if ($paginator->isEmpty()): ?>
    <p class="alert"><?= t('There is nothing assigned to you.') ?></p>
<?php else: ?>
    <table class="table-fixed table-small">
        <tr>
            <th class="column-8"><?= $paginator->order('Id', 'tasks.id') ?></th>
            <th class="column-20"><?= $paginator->order(t('Project'), 'project_name') ?></th>
            <th><?= $paginator->order(t('Task'), 'title') ?></th>
            <th class="column-20"><?= t('Time tracking') ?></th>
            <th class="column-20"><?= $paginator->order(t('Due date'), 'date_due') ?></th>
        </tr>
        <?php foreach ($paginator->getCollection() as $task): ?>
        <tr>
            <td class="task-table color-<?= $task['color_id'] ?>">
                <?= $this->url->link('#'.$task['id'], 'task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
            </td>
            <td>
            <div class="cambiocolor">
                <?= $this->url->link($this->e($task['project_name']), 'board', 'show', array('project_id' => $task['project_id'])) ?>
            </div>
            </td>
            <td>
            <div class="cambiocolor">
                <?= $this->url->link($this->e($task['title']), 'task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])) ?>
            </div>
            </td>
            <td>
            <div class="cambiocolor">
                <?php if (! empty($task['time_spent'])): ?>
                    <strong><?= $this->e($task['time_spent']).'h' ?></strong> <?= t('spent') ?>
                <?php endif ?>

                <?php if (! empty($task['time_estimated'])): ?>
                    <strong><?= $this->e($task['time_estimated']).'h' ?></strong> <?= t('estimated') ?>
                <?php endif ?>
            </div>
            </td>
            <td>
            <div class="cambiocolor">
                <?= dt('%B %e, %Y', $task['date_due']) ?>
            </div>
            </td>
        </tr>
        <?php endforeach ?>
    </table>

    <?= $paginator ?>
<?php endif ?>