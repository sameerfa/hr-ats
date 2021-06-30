<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChartsService;

class DashboardApiController extends Controller
{
    public function index()
    {
        $stats0 = new ChartsService([
            'title'            => 'Jobs in last 30 Days',
            'chart_type'       => 'stats',
            'model'            => 'App\Models\Job',
            'column_class'     => 'col-md-3',
            'footer_icon'      => 'date_range',
            'footer_text'      => 'Last 30 days',
            'filter_by_field'  => 'created_at',
            'filter_by_period' => 30,
        ]);

        $stats1 = new ChartsService([
            'title'        => 'Total Resumes',
            'chart_type'   => 'stats',
            'model'        => 'App\Models\Resume',
            'column_class' => 'col-md-3',
            'footer_icon'  => 'date_range',
            'footer_text'  => 'Lifetime total',
        ]);

        $stats2 = new ChartsService([
            'title'        => 'Total Companies',
            'chart_type'   => 'stats',
            'model'        => 'App\Models\Company',
            'column_class' => 'col-md-3',
            'footer_icon'  => 'date_range',
            'footer_text'  => 'Lifetime total',
        ]);

        $stats3 = new ChartsService([
            'title'        => 'Average CTC',
            'chart_type'   => 'stats',
            'model'        => 'App\Models\Job',
            'column_class' => 'col-md-3',
            'footer_icon'  => 'date_range',
            'footer_text'  => 'Lifetime total',
        ]);

        $bar4 = new ChartsService([
            'title'           => 'Interviews Scheduled',
            'chart_type'      => 'bar',
            'model'           => 'App\Models\Interview',
            'group_by_field'  => 'created_at',
            'group_by_period' => 'day',
            'column_class'    => 'col-md-6',
        ]);

        $pie5 = new ChartsService([
            'title'           => 'Skill Pool',
            'chart_type'      => 'pie',
            'model'           => 'App\Models\Resume',
            'group_by_field'  => 'skills',
            'group_by_period' => 'day',
            'column_class'    => 'col-md-6',
        ]);

        $latest6 = new ChartsService([
            'title'        => 'Recent Jobs',
            'chart_type'   => 'latest',
            'model'        => 'App\Models\Job',
            'column_class' => 'col-md-12',
            'fields'       => ['id','job_title','expected_experience','ctc','city','priority'],
            'limit'        => 5,
        ]);

        return response()->json(compact('stats0', 'stats1', 'stats2', 'stats3', 'bar4', 'pie5', 'latest6'));
    }
}
