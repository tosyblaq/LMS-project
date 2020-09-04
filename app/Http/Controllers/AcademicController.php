<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Category;
use App\Lesson;
use App\CourseComment;
use App\AccountOrder;
use App\Question;
use App\Answer;
use Auth;
use Cart;

class AcademicController extends Controller
{
    public function index()
    {
        return view('frontend.academic.category')
        ->with('categories', Category::paginate(9));
    }

    public function course($id)
    {
        $alreadyInCart = in_array($id, (Cart::content()->pluck('id')->toArray()));
        //dd($alreadyInCart);
        if(Auth::user())
        {
            $order = Auth::user()->orders;

            $acct = in_array($id, ($order->pluck('category_id')->toArray() ));
            
            return view('frontend.academic.course')
            ->with('courses', Course::where('category_id', $id)->get())
            ->with('current', Category::where('id', $id)->first())
            ->with('acct', $acct)
            ->with('alreadyInCart', $alreadyInCart);
        }
        else
        {
            return view('frontend.academic.course')
            ->with('courses', Course::where('category_id', $id)->get())
            ->with('current', Category::where('id', $id)->first())
            ->with('alreadyInCart', $alreadyInCart);
        }
       
    }

    //display course details
    public function coursedetails($id, $slug)
    {
       if(Auth::user())
       {
            $check = Course::where('id', $id)->where('slug', $slug)->first();
            if($check)
            {
            $orders = Auth::user()->orders;
    
            return view('frontend.academic.coursedetails')
            ->with('course', Course::where('slug', $slug)->first())
            ->with('course_comments', CourseComment::where('course_id', $id)->where('published', 1)
            ->OrderBy('id', 'desc')->take(5)->get())
            ->with('lessons', Lesson::where('course_id', $id)->where('published', 1)->where('free_episode', 1)->orderBy('section_id', 'asc')->orderBy('title', 'asc')->get())
            ->with('orders', $orders)
            ->with('question', Question::where('course_id', $id));
            }
            else
            {
                session()->flash('warning', 'Course Not Available at the moment');
                // redirect here to not found page
                return redirect()->back();
            }
            //  http://127.0.0.1:8000/academy/1/coursedetails/complete-angular-back-and-front
       }
       else
       {
            return view('frontend.academic.coursedetails')
            ->with('course', Course::where('slug', $slug)->first())
            ->with('course_comments', CourseComment::where('course_id', $id)->where('published', 1)
            ->OrderBy('id', 'desc')->take(5)->get())
            ->with('lessons', Lesson::where('course_id', $id)->where('published', 1)->where('free_episode', 1)->orderBy('section_id', 'asc')->orderBy('title', 'asc')->get())
            ->with('question', Question::where('course_id', $id));
       }
    }

    public function showcourse($id, $slug, $categoryId)
    {
        if(Auth::user())
        {
            $acct = Auth::user()->orders;
            // dd(($acct->pluck('category_id')->toArray() ));
            if(in_array($categoryId, ($acct->pluck('category_id')->toArray())))
            {
                // $check = $check = Course::where('id', $categoryId)->where('slug', $slug)->first();

                // if($check)
                // {
                    $lesson_section = Lesson::distinct()->where('course_id', $id)->get(['section_id', 'section_title']);

                    return view('frontend.academic.show')
                    ->with('course', Course::where('slug', $slug)->first())
                    ->with('course_comments', CourseComment::where('course_id', $id)->where('published', 1)->orderBy('id', 'desc')->take(8)->get())
                    ->with('lessons', Lesson::where('course_id', $id)->where('published', 1)->orderBy('section_id', 'asc')->orderBy('title', 'asc')->get())
                    ->with('lesson_section', $lesson_section)
                    ->with('questions', Question::where('course_id', $id)->orderBy('created_at', 'DESC')->simplePaginate(5));
                    // ->with('next', $next);
                        
                // }
                // else
                // {
                //     session()->flash('warning', 'Lessons Not Available at the moment');
                //     // redirect here to not found page
                //     return redirect()->back();
                // }

            }
            else
            {
                return redirect()->back();
            }
        }

        else
        {
            return redirect()->route('login');
        }
    }

    // play lesson video
    public function playvideo($id, $courseId, $courseSlug, $categoryId)
    {
        
        if(Auth::user())
        {
            $acct = Auth::user()->orders;
            //dd($id);
            if(in_array($categoryId, ($acct->pluck('category_id')->toArray())))
            {
                // $check = Course::where('id', $categoryId)->where('slug', $courseSlug)->first();
                // if($check)
                // {
                    $lesson_section = Lesson::distinct()->where('course_id', $courseId)->get(['section_id', 'section_title']);

                    return view('frontend.academic.show')
                    ->with('playvideo', Lesson::where('id', $id)->first())
                    ->with('course_comments', CourseComment::where('course_id', $courseId)->where('published', 1)->get())
                    ->with('course', Course::where('slug', $courseSlug)->first())
                    ->with('lessons', Lesson::where('course_id', $courseId)->where('published', 1)->OrderBy('section_id', 'ASC')
                    ->OrderBy('title', 'ASC')->get())
                    ->with('lesson_section', $lesson_section)
                    ->with('questions', Question::where('course_id', $id)->orderBy('created_at', 'DESC')->paginate(5));
                // }
                // else
                // {
                //     session()->flash('warning', 'Lessons Not Available at the moment');
                //     // redirect here to not found page
                //     return redirect()->back();
                // }
            }
            else
            {
                return redirect()->back();
            }
        }

        else
        {
           
            return redirect()->route('login');
           
        }
        
    }

    // play free lesson video
    public function playfreevideo($id, $courseId, $courseSlug)
    {
        $check = Course::where('id', $courseId)->where('slug', $courseSlug)->first();
        if($check)
        {
            $orders = Auth::user()->orders;

            return view('frontend.academic.coursedetails')
            ->with('playfreevideo', Lesson::where('id', $id)->first())
            ->with('course', Course::where('slug', $courseSlug)->first())
            ->with('course_comments', CourseComment::where('course_id', $id)->where('published', 1)
            ->OrderBy('id', 'desc')->take(5)->get())
            ->with('lessons', Lesson::where('course_id', $courseId)->where('published', 1)->where('free_episode', 1)->orderBy('section_id', 'asc')->orderBy('title', 'asc')->get())
            ->with('orders', $orders);
            // ->with('lessons', Lesson::where('course_id', $id)->get());

        }
        else
        {
            session()->flash('warning', 'Lessons Not Available at the moment');
            // redirect here to not found page
            return redirect()->back();
        }
    }
}
