<?php

namespace App\Repositories;
use App\Models\Module;

class ModuleRepository
{
    protected $entity;

    public function __construct(Module $model)
    {
        $this->entity = $model;
    }

    public function getModulesByCouseId(string $course)
    {
        return $this->entity
                   ->where('course_id')
                   ->get();
    }
}
