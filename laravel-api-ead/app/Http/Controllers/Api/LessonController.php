<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LessonResource;
use App\Repositories\LessonRepository;

class LessonController extends Controller
{
    protected $repository;

    public function __construct(LessonRepository $lessonRespository)
    {
        $this->repository = $lessonRespository;
    }

    public function index($moduleId)
    {
       $modules = $this->repository->getLessonsByModuleId($moduleId);

       return LessonResource::collection($modules);
    }

    public function show($moduleId)
    {

       return new LessonResource($this->repository->getLesson($moduleId));
    }
}
