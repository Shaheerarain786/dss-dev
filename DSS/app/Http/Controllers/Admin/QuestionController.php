<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index',compact('questions'));
    }


    public function create()
    {
        $branches = Branch::all();

        return view('admin.questions.create',compact('branches'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'question_title' => 'required',
            'branch_name' => 'required'
        ]);

        $question = new Question();
        $question->branch_id = $request->branch_name;
        $question->question_title = $request->question_title;
        $question->option_1 = $request->option_1;
        $question->option_2 = $request->option_2;
        $question->option_3 = $request->option_3;
        $question->option_4 = $request->option_4;
        $question->question_type = $request->question_type;
        $question->save();

        return redirect('questions')->with('success','Question added successfully');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $question = Question::find($id);
        $branches = Branch::all();

        if($question->question_type == "fill_in_blank")
        {
            return view("admin.questions.edit_fill_in_blank", compact('question','branches'));
        }
        if($question->question_type == "mcqs")
        {
            return view("admin.questions.edit_mcqs", compact('question','branches'));
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
           'question_title' => 'required',
            'branch_name' => 'required'
        ]);

        $question = Question::find($id);
        $question->question_title = $request->question_title;
        $question->question_type = $request->question_type;
        $question->option_1 = $request->option_1;
        $question->option_2 = $request->option_2;
        $question->option_3 = $request->option_3;
        $question->option_4 = $request->option_4;
        $question->save();

        return redirect('questions')->with('success','Question Updated Successfully ');
    }


    public function destroy($id)
    {
        $question_check = Question::where('id',$id)->exists();

        if($question_check)
        {
            Question::find($id)->delete();

            return redirect('questions')->with('success','Question Deleted Successfully');
        }
    }
}
