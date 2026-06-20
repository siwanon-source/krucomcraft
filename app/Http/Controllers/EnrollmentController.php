<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Services\EnrollmentService;
use App\Support\ActionResult;

final class EnrollmentController
{
    public function __construct(private readonly EnrollmentService $enrollments = new EnrollmentService())
    {
    }

    public function store(array $input): ActionResult
    {
        return new ActionResult('academy', $this->enrollments->enroll(EnrollmentRequest::from($input)));
    }
}
