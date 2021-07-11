<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Application\Find;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseNotExist;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;

final class FindLastCourse
{
    public function __construct(private CourseRepository $repository)
    {
    }

    public function __invoke(): Course
    {
        $course = $this->repository->findLastCourse();

        if (null === $course) {
            throw new NoCoursesInDB();
        }

        return $course;
    }
}
