<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\security_question_users;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
   protected function getSecurityQuestions(Request $request)
    {
        try {
            $IsEmailSubmitted = 'Yes';
            $email = strtolower($request->email);
            $user = User::where('email', $email)->first();
            $security_question_user1 = security_question_users::where('user_id', $user->id)->limit(1)->first();
            $security_question_user2 = security_question_users::where('user_id', $user->id)->skip(1)->take(1)->first();
            $security_question_user3 = security_question_users::where('user_id', $user->id)->skip(2)->take(1)->first();

            //Generarting random number between 1 and 3 for random security questions.
            $randomQuestionNumber = rand(1,3);

            if(!empty($user)) 
            {
                //Now fetch security question
                if($randomQuestionNumber == '1')
                    $question = DB::table('security_question')->where('security_question_id',$security_question_user1->security_question_id)->value('security_question');
                if($randomQuestionNumber == '2')
                    $question = DB::table('security_question')->where('security_question_id',$security_question_user2->security_question_id)->value('security_question');
                if($randomQuestionNumber == '3')
                    $question = DB::table('security_question')->where('security_question_id',$security_question_user3->security_question_id)->value('security_question');
            }

            return view('auth/passwords/email', compact('user','IsEmailSubmitted','randomQuestionNumber','question'));
        }
        catch (\Exception $e)
        {
            return view ('errors/503');
        }
    }
}
