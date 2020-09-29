<?php

namespace App\Http\Controllers\Admin;

use App\Answers;
use App\Branch;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function reports(Request $request)
    {
        $branches = Branch::all();
        $answers = Answers::where('branch_id',$request->select_branch)->exists();
        if(isset($request->select_branch))
        {
            if($answers == true)
            {
                $questions = Question::where('branch_id',$request->select_branch)->get();
                foreach ($questions as $que){
                    $que->answer = Answers::find($que->id)->answer;
                    $que->branch = Branch::find($request->select_branch)->branch_name;
                }
                return view('admin.answers.index', compact('branches','questions'));
            }
            else{
                return redirect('reports')->with('No answer is exists');
            }

        }
        else {
            return view('admin.answers.index',compact('branches'));
        }
    }
}
