<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\LessonProgressRequest;
use App\Services\LearningProgressService;
use App\Support\ActionResult;

final class LearningProgressController
{
    public function __construct(private readonly LearningProgressService $progress = new LearningProgressService())
    {
    }

    public function store(array $input): ActionResult
    {
        $payload = LessonProgressRequest::from($input);
        return new ActionResult('learn', $this->progress->completeLesson($payload));
    }
}

