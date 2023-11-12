<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers;

class SupportController extends Controller
{
    protected $repository;

    public function __construct(SupportRepostory $supportRepository)
    {
        $this->repository = $supportRepository;
    }

    public function index(Request $request)
    {
        $supports = $this->repository->getSupports();

        return SupportResource::collection($modules);
    }

}
