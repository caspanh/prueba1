<div class="page-header">
    <h2><?= t('Time Tracking') ?></h2>
</div>

<h3><?= t('Subtask timesheet') ?></h3>
<?php if ($subtask_paginator->isEmpty()): ?>
    <p class="alert"><?= t('There is nothing to show.') ?></p>
<?php else: ?>
    <table class="table-fixed">
        <tr>
            <th class="column-25"><?= $subtask_paginator->order(t('Task'), 'task_title') ?></th>
            <th class="column-25"><?= $subtask_paginator->order(t('Subtask'), 'subtask_title') ?></th>
            <th class="column-20"><?= $subtask_paginator->order(t('Start'), 'start') ?></th>
            <th class="column-20"><?= $subtask_paginator->order(t('End'), 'end') ?></th>
            <th class="column-10"><?= $subtask_paginator->order(t('Time spent'), 'time_spent') ?></th>
        </tr>
        <?php foreach ($subtask_paginator->getCollection() as $record): ?>
        <tr>
            <td><div class="cambiocolor"><?= $this->url->link($this->e($record['task_title']), 'task', 'show', array('project_id' => $record['project_id'], 'task_id' => $record['task_id'])) ?></div></td>
            <td><div class="cambiocolor"><?= $this->url->link($this->e($record['subtask_title']), 'task', 'show', array('project_id' => $record['project_id'], 'task_id' => $record['task_id'])) ?></div></td>
            <td><div class="cambiocolor"><?= dt('%B %e, %Y at %k:%M %p', $record['start']) ?></div></td>
            <td><div class="cambiocolor"><?= dt('%B %e, %Y at %k:%M %p', $record['end']) ?></div></td>
            <td><div class="cambiocolor"><?= n($record['time_spent']).' '.t('hours') ?></div></td>
        </tr>
        <?php endforeach ?>
    </table>

    <?= $subtask_paginator ?>
<?php endif ?>