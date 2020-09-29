<?php

namespace App\Http\Controllers\API;

use App\Answers;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnswersController extends Controller
{
    public function submit(Request $request){
        $validator = Validator::make($request->all(),[
           'branch_id' => 'required',
           'question_id' => 'required',
            'answer' => 'required'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'data' => null,
                'message' => $validator->messages(),
                'status' => false
            ]);
        }
        else
        {
            $answers = new Answers();
            $answers->branch_id = $request->branch_id;
            $answers->question_id = $request->question_id;
            $answers->answer = $request->answer;
            $answers->save();

            return response()->json([
               'status' => true,
               'message' => 'Submitted Successfully'
            ]);
        }
    }
}
