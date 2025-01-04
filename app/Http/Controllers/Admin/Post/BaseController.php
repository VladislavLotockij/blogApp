<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use PostService;

class BaseController extends Controller
{
    public function __invoke()
    {
       public $service;

       public function __construct(PostService $service) 
       {
            $this->service = $service;
       }
    }
}
