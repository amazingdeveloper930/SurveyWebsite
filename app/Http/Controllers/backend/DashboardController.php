<?php

namespace App\Http\Controllers\backend;

use App\Campaign;
use App\CampaignResult;
use App\Http\Controllers\Controller;
use App\CampaignQuestion;
use App\CampaignQuestionOption;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $sAnswer = array();

        $surveys = Campaign::orderBy('id', 'desc')->paginate();
        foreach ($surveys as $key => $value) {

            $answers             = CampaignResult::where('campaign_id', '=', $value->id)->count();
            $sAnswer[$value->id] = $answers;
        }
        return view('backend.dashboard.index', ['surveys' => Campaign::orderBy('id', 'desc')->paginate(), 'no_of_answers' => $sAnswer]);
    }

    public function sponsored()
    {
        $sAnswer = array();

        $surveys = Campaign::where('active', '=', 1)
            ->where('public', '=', 1)
            ->orderBy('advertise_credits', 'desc')
            ->paginate();
        if (isset($surveys) && !empty($surveys)) {
            foreach ($surveys as $key => $value) {

                $answers             = CampaignResult::where('campaign_id', '=', $value->id)->count();
                $sAnswer[$value->id] = $answers;
            }
        }
        return view('backend.dashboard.sponsored', ['surveys' => $surveys, 'no_of_answers' => $sAnswer]);
    }

    public function scredit()
    {
        if (isset($_GET['query'])) {
            $search_txt = trim($_GET['query']);
            if (strlen($search_txt) > 0) {

                $surveys = Campaign::where('advertise_credits', '>', 1)->paginate();
                if (isset($surveys) && !empty($surveys)) {
                    foreach ($surveys as $key => $value) {

                        $answers             = CampaignResult::where('campaign_id', '=', $value->id)->count();
                        $sAnswer[$value->id] = $answers;
                    }
                }
                return view('backend.dashboard.index', [
                    'surveys' => $surveys, 'no_of_answers' => $sAnswer,
                ]);

            } else {
                echo "Please type search text";
            }
        } else {

            $surveys = Campaign::paginate();
            if (isset($surveys) && !empty($surveys)) {
                foreach ($surveys as $key => $value) {

                    $answers             = CampaignResult::where('campaign_id', '=', $value->id)->count();
                    $sAnswer[$value->id] = $answers;
                }
            }
            return view('backend.dashboard.index', [
                'surveys' => $surveys, 'no_of_answers' => $sAnswer,
            ]);
        }
    }

    public function addCredit()
    {
        if (isset($_POST['add-credit-box'])) {
            $id    = $_POST['survey-id'];
            $entry = Campaign::find($id);
            if ($entry) {
                $entry->advertise_credits = ($entry->advertise_credits + $_POST['add-credit-box']);
                $entry->save();
                return redirect()
                    ->route('dashboard');
            }

        } else {
            return Redirect::back();
        }

    }

    public function viewCampaign($id)
    {
        $entry = Campaign::find($id);
        if ($entry) {
            if (isset($_POST['add-credit-box'])) {

                $entry->advertise_credits = $_POST['add-credit-box'];
                $entry->save();
                return redirect()
                    ->route('dashboard');

            } else {
                return view('backend.dashboard.credit', [
                    'survey' => $entry,
                ]);
            }

        }
    }

    public function viewCampaignProfile($id)
    {
        $entry = Campaign::find($id);
        if ($entry) {

            $questions = CampaignQuestion::where([['campaign_id',$id]])->get();
            foreach ($questions as $key => $value) {
                $options = CampaignQuestionOption::where([['question_id',$value->id]])->get();
                $questions[$key]->options = $options;
            }
            return view('backend.dashboard.surveyProfile', [
                'entry' => $entry,
                'questions'=>$questions
            ]);

        }
    }

    public function stats()
    {
        $surveys = Campaign::select(\DB::raw('date(created_at) as created_at') , \DB::raw('count(1) as cnt'))->groupBy(\DB::raw('date(created_at)'))->get();
        $answers = CampaignResult::select(\DB::raw('date(created_at) as created_at') , \DB::raw('count(1) as cnt'))->groupBy(\DB::raw('date(created_at)'))->get();
        return view('backend.dashboard.stats', [
                'surveys' => $surveys,
                'answers'=>$answers
            ]);
    }

    
    public function destroy($id)
    {
        $entry = Campaign::find($id);

        if ($entry) {
            // Deleting
            // $entry->delete();
            $entry->active = 0;

            // $entry->results()->delete();

            $entry->save();

            return redirect()
                ->route('dashboard')
                ->withDeleted($entry->id);
        } else {
            return Redirect::back();
        }
    }


    public function setsurveylangauge($id, $language)
    {
        if(isset($id) && isset($language))
        {
            $entry = Campaign::where('id', $id) -> first();
            if(isset($entry))
            {
                $entry -> language = $language;
                $entry ->save();
                 return response()->json(['status'=>'success']);
            }
             return response()->json(['status'=>'false']);
        }
        else
        {
            return response()->json(['status'=>'false']);
        }
       
    }
}
