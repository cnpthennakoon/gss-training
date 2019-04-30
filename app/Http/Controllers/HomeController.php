<?php

namespace App\Http\Controllers;

use App\Project;
use App\QatShortfall;
use App\TrainingBatch;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = TrainingBatch::where('training_batch_status_id', 1)->select('project_id')->select('project_id')->distinct()->get()->count();

//        training summary
//  nrt values
        $gsscNrtR = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 1)
            ->where('training_batch_type_id',1)
            ->sum('received_head_count');

        $gsscNrtAtr = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 1)
            ->where('training_batch_type_id',1)
            ->sum('hr_attrition_count','training_attrition_count');

        $gsscNrt = $gsscNrtR-$gsscNrtAtr;

        $gsskNrtR = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 2)
            ->where('training_batch_type_id',1)
            ->sum('received_head_count');

        $gsskNrtAtr = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 2)
            ->where('training_batch_type_id',1)
            ->sum('hr_attrition_count','training_attrition_count');

        $gsskNrt = $gsskNrtR-$gsskNrtAtr;


        $igsNrtR = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 3)
            ->where('training_batch_type_id',1)
            ->sum('received_head_count');

        $igsNrtAtr = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 3)
            ->where('training_batch_type_id',1)
            ->sum('hr_attrition_count', 'training_attrition_count');

        $igsNrt = $igsNrtR-$igsNrtAtr;

//  crt values

        $gsscCrtR = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 1)
            ->where('training_batch_type_id',2)
            ->sum('received_head_count');

        $gsscCrtAtr = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 1)
            ->where('training_batch_type_id',2)
            ->sum('hr_attrition_count','training_attrition_count');

        $gsscCrt = $gsscCrtR-$gsscCrtAtr;

        $gsskCrtR = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 2)
            ->where('training_batch_type_id',2)
            ->sum('received_head_count');

        $gsskCrtAtr = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 2)
            ->where('training_batch_type_id',2)
            ->sum('hr_attrition_count', 'training_attrition_count');

        $gsskCrt = $gsskCrtR-$gsskCrtAtr;


        $igsCrtR = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 3)
            ->where('training_batch_type_id',2)
            ->sum('received_head_count');

        $igsCrtAtr = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 3)
            ->where('training_batch_type_id',2)
            ->sum('hr_attrition_count', 'training_attrition_count');

        $igsCrt = $igsCrtR-$igsCrtAtr;

//        attrition summary
////////////////////////////////////////////////////////////////////////////////////////



//  nrt values
        $gsscNrtAtr= TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 1)
            ->where('training_batch_type_id',1)
            ->sum('hr_attrition_count','training_attrition_count');

        $gsskNrtAtr = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 2)
            ->where('training_batch_type_id',1)
            ->sum('hr_attrition_count', 'training_attrition_count');

        $igsNrtAtr = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 3)
            ->where('training_batch_type_id',1)
            ->sum('hr_attrition_count', 'training_attrition_count');
//  crt values
        $gsscCrtAtr= TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 1)
            ->where('training_batch_type_id',2)
            ->sum('hr_attrition_count','training_attrition_count');

        $gsskCrtTrAtr = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 2)
            ->where('training_batch_type_id',2)
            ->sum('hr_attrition_count', 'training_attrition_count');

        $igsCrtAtr = TrainingBatch::where('training_batch_status_id', 1)
            ->where('training_center_id', 3)
            ->where('training_batch_type_id',2)
            ->sum('hr_attrition_count', 'training_attrition_count');


//////////////////////////////////////////////////////////
//        training overview



        $hr = TrainingBatch::where('training_batch_status_id', 1)->sum('hr_attrition_count');
        $tr = TrainingBatch::where('training_batch_status_id', 1)->sum('training_attrition_count');
        $hc = TrainingBatch::where('training_batch_status_id', 1)->sum('received_head_count');
        $totalShortfall = 0;

        $data = [];

        $project_ids = TrainingBatch::select('project_id')->where('training_batch_status_id', 1)->distinct()->get();

        foreach ($project_ids as $key=>$a){

            $data[$key]['project_name'] = Project::where('id', $a->project_id)->select('slug')->get()[0]['slug'];

            $data[$key]['project_id'] = $a->project_id;

            $data[$key]['gssc_nrt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 1)
                ->where('training_batch_type_id',1)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['gssc_nrt']->isEmpty()){
                $data[$key]['gssc_nrt'] = 0;
            }

            $data[$key]['gssk_nrt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 2)
                ->where('training_batch_type_id',1)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['gssk_nrt']->isEmpty()){
                $data[$key]['gssk_nrt'] = 0;
            }


            $data[$key]['igs_nrt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 3)
                ->where('training_batch_type_id',1)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['igs_nrt']->isEmpty()){
                $data[$key]['igs_nrt'] = 0;
            }


            $data[$key]['gssc_crt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 1)
                ->where('training_batch_type_id',2)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['gssc_crt'] ->isEmpty()){
                $data[$key]['gssc_crt'] = 0;
            }

            $data[$key]['gssk_crt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 2)
                ->where('training_batch_type_id',2)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['gssk_crt'] ->isEmpty()){
                $data[$key]['gssk_crt']= 0;
            }

            $data[$key]['igs_crt'] = TrainingBatch::where('project_id', $a->project_id)
                ->where('training_batch_status_id', 1)
                ->where('training_center_id', 3)
                ->where('training_batch_type_id',2)
                ->select('received_head_count', 'hr_attrition_count','training_attrition_count')
                ->get();

            if ($data[$key]['igs_crt'] ->isEmpty()){
                $data[$key]['igs_crt'] = 0;
            }

            $data[$key]['gssc_shortfall'] = QatShortfall::where('project_id', $a->project_id)
                ->select('gssc_shortfall')->get();

            if ($data[$key]['gssc_shortfall'] ->isEmpty()){
                $data[$key]['gssc_shortfall'] = 0;
            }

            $data[$key]['gssk_shortfall'] = QatShortfall::where('project_id', $a->project_id)
                ->select('gssk_shortfall')->get();

            if ($data[$key]['gssk_shortfall'] ->isEmpty()){
                $data[$key]['gssk_shortfall'] = 0;
            }

            $data[$key]['igs_shortfall'] = QatShortfall::where('project_id', $a->project_id)
                ->select('igs_shortfall')->get();

            if ($data[$key]['igs_shortfall'] ->isEmpty()){
                $data[$key]['igs_shortfall'] = 0;
            }


            $data[$key]['total_shortfall'] = $data[$key]['gssc_shortfall'][0]['gssc_shortfall'] + $data[$key]['gssk_shortfall'][0]['gssk_shortfall'] + $data[$key]['igs_shortfall'][0]['igs_shortfall'];
            $totalShortfall += $data[$key]['total_shortfall'];
        }
        sort($data);
        json_encode($data);
        return view('home')->withProjects($projects)->withData($data)->withHr($hr)->withTr($tr)->withHc($hc)->withTotalShortfall($totalShortfall)
            ->withGsscNrt($gsscNrt)->withGsskNrt($gsskNrt)->withIgsNrt($igsNrt)->withGsscCrt($gsscCrt)->withGsskCrt($gsskCrt)->withIgsCrt($igsCrt)
            ->withGsscNrtAtr($gsscNrtAtr)->withGsskNrtAtr($gsskNrtAtr)->withIgsNrtAtr($igsNrtAtr)->withGsscCrtAtr($gsscCrtAtr)->withGsskCrtTrAtr($gsskCrtTrAtr)->withIgsCrtAtr($igsCrtAtr);
//        return view('home');
    }
}
