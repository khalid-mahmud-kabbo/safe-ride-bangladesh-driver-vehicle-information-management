<?php

namespace App\Http\Repositories;

use App\Models\Admin\Blog;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\User;
use Carbon\Carbon;

class DashboardRepository
{



    public function getTotalBlogs()
    {
        return Blog::count();
    }




}
