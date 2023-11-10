<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Adicione esta linha para importar a classe Controller
use App\Repositories\ModuleRepository; // Certifique-se de importar a classe ModuleRepository
use App\Http\Resources\ModuleResource;

class ModuleController extends Controller
{
    protected $repository;

    public function __construct(ModuleRepository $moduleRespository)
    {
        $this->repository = $moduleRespository;
    }

    public function index($courseId)
    {
       $modules = $this->repository->getModulesByCouseId($courseId);

       return ModuleResource::collection($modules);
    }
}
