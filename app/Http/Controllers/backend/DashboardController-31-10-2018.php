<?php

namespace App\Http\Controllers\backend;

use App\Campaign;
use App\CampaignResult;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $sAnswer = array();
        

        $surveys = Campaign::paginate();
        foreach ($surveys as $key => $value) {
            
                $answers = CampaignResult::where('campaign_id', '=', $value->id)->count();
                $sAnswer[$value->id] = $answers;
        }
        return view('backend.dashboard.index', ['surveys' => Campaign::paginate(), 'no_of_answers' => $sAnswer]);
    }

    public function scredit()
    {
        if (isset($_GET['query'])) {
            $search_txt = trim($_GET['query']);
            if (strlen($search_txt) > 0) {

                return view('backend.dashboard.index', [
                    'surveys' => Campaign::where('advertise_credits', '>', 1)->paginate(),
                ]);

            } else {
                echo "Please type search text";
            }
        } else {
            return view('backend.dashboard.index', ['surveys' => Campaign::paginate()]);
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
}
