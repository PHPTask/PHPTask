<?php
/*
 * This file is part of PHP-Task library.
 *
 * (c) php-task
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Task;

use Task\Execution\TaskExecution;
use Task\Scheduler\SchedulerInterface;

/**
 * Factory for task .
 *
 * @author @wachterjohannes <johannes.wachter@massiveart.com>
 */
class Factory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createTaskBuilder(SchedulerInterface $scheduler, $handlerClass, $workload)
    {
        return new TaskBuilder($scheduler, $this->createTask($handlerClass, $workload));
    }

    /**
     * {@inheritdoc}
     */
    public function createTaskExecution(TaskInterface $task, \DateTime $scheduleTime)
    {
        return new TaskExecution($task, $task->getHandlerClass(), $scheduleTime, $task->getWorkload());
    }

    /**
     * {@inheritdoc}
     */
    public function createTask($handlerClass, $workload)
    {
        return new Task($handlerClass, $workload);
    }
}
