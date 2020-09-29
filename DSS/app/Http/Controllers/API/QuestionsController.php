<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function all(Request $request){
        $questions = Question::where('branch_id',$request->branch_id)->get();
        return response()->json([
            'data' => $questions,
            'status' => true
        ]);
    }
}
