<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontEndController@index')->name('/');


// Verify Email
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['prefix' => 'admin', 'middleware' => ['verified', 'admin'] ], function(){
    Route::resource('dashboard', 'Admin\DashboardController');
    Route::resource('category', 'CategoriesController');
    Route::resource('section', 'Admin\SectionsController');
    Route::resource('role', 'Admin\RolesController');

    // StudentsController
    Route::resource('student', 'StudentsController');
    Route::get('enrollStudent', 'StudentsController@enroll')->name('student.enroll');

    // CoursesController
    Route::resource('course', 'Admin\CoursesController');
    Route::get('course/{id}/publish', 'Admin\CoursesController@publish')->name('course.publish');
    // Route::get('course/{id}/publish', 'Admin\CoursesController@publish')->name('course');
    Route::get('course/{id}/unpublish', 'Admin\CoursesController@unpublish')->name('course.unpublish');

    // LessonsController
    Route::get('lesson/{id}/publish', 'Admin\LessonsController@publish')->name('lesson.publish');
    Route::get('lesson/{id}/unpublish', 'Admin\LessonsController@unpublish')->name('lesson.unpublish');
    Route::resource('lesson', 'Admin\LessonsController');
    Route::get('lesson/{id}/create_lesson', 'Admin\LessonsController@create_lesson')->name('create_lesson');
    Route::get('lesson/{id}/view', 'Admin\LessonsController@view_lesson')->name('view_lesson');
    // 
    Route::get('lesson/{id}/make_free', 'Admin\LessonsController@make_free')->name('lesson.make_free');
    Route::get('lesson/{id}/make_not_free', 'Admin\LessonsController@make_not_free')->name('lesson.make_not_free');
    // End of LessonsController

    //Front Page Section
    Route::resource('frontpage', 'Admin\FrontPageHeaderController');
    //Jumbotron
    Route::resource('jumbo', 'Admin\JumbotronController');
    //GetStarted
    Route::resource('getstarted', 'Admin\GetStartedController');
    //Testimonials
    Route::resource('testimonial', 'Admin\TestimonialsController');
    // FrontEndSecond
    Route::resource('secondpara', 'Admin\FrontEndSecondParaController');
    //Live The Experience
    Route::resource('live', 'Admin\LiveTheExperienceController');
    //company details
    Route::resource('company', 'Admin\CompanyDetailsController');


    // Comment
    // CourseCommentsController
    // Admin Course comment
    Route::get('admin_view_comment', 'CourseCommentsController@admin')->name('admin_view_comment.admin');
    
    //publishing course comment
    Route::get('admin_view_comment/{id}/publish', 'CourseCommentsController@publish')->name('admin_view_comment.publish');
    //unpublishing course comment
    Route::get('admin_view_comment/{id}/unpublish', 'CourseCommentsController@unpublish')->name('admin_view_comment.unpublish');
    // delete student comments
    Route::delete('admin_view_comment/{id}/deleteComment', 'CourseCommentsController@deleteComment')->name('admin_view_comment.deleteComment');
    // End of CourseCommentsController


    // Student testomonials
    Route::get('student_testimonial', 'Admin\StudentTestimonialsController@admin')->name('student_testimonial.adminindex');

    //publishing testimonial
    Route::get('testimonial/{id}/publish', 'Admin\StudentTestimonialsController@publish')->name('testimonial.publish');
    //unpublishing testimonial
    Route::get('testimonial/{id}/unpublish', 'Admin\StudentTestimonialsController@unpublish')->name('testimonial.unpublish');
});

    // Route for NewsLetter
    Route::resource('newsletter', 'NewsLettersController');
    // End of Route for NewsLetter


    // Question and Answer Route
    Route::group(['middleware' => 'auth'], function(){
        Route::post('question/{course}', 'QuestionsController@store')->name('question.store');
        Route::get('answer/{questionId}/{courseId}/{categoryId}', 'AnswersController@show')->name('answer.show');

        Route::post('answer/{question}', 'AnswersController@store')->name('answer.store');
    });
    // End of Question and Answer route

    Route::resource('front', 'FrontEndController');
    Route::get('apply', 'FrontEndController@apply')->name('apply');
    // Route::resource('academy', 'AcademyController');
    // Route::get('academy/course/{id}', 'AcademyController@course')->name('academy.course');
    // Route::get('academy/{id}/show/{category}', 'AcademyController@showcourse')->name('academy.showcourse');

    // Academic
    Route::get('academy', 'AcademicController@index')->name('academy.index');
    Route::get('academy/course/{id}', 'AcademicController@course')->name('academy.course');
    Route::get('academy/{id}/show/{slug}/{categoryId}', 'AcademicController@showcourse')->name('academy.showcourse');
    Route::get('academy/{id}/media/{courseId}/{coureSlug}/{categoryId}', 'AcademicController@playvideo')->name('academy.playvideo');

    // Play free lesson
    Route::get('academy/{id}/freemedia/{courseId}/{courseSlug}', 'AcademicController@playfreevideo')->name('academy.playfreevideo');

    //show course details
    Route::get('academy/{id}/coursedetails/{slug}', 'AcademicController@coursedetails')->name('academy.coursedetails');

    // Cart
    // add to cart
    Route::post('cart/add/{pid}', 'ShoppingController@add_to_cart')->name('cart.add');

    //route to display cart
    Route::get('cart', 'ShoppingController@cart')->name('cart.item');

    //deleting a cart item
    Route::get('cart/delete/{id}', 'ShoppingController@cart_delete')->name('cart.delete');

    //cart checkout route (where user make payment for items)
    Route::post('checkout', 'CheckoutController@pay')->name('cart.checkout');

    Route::group(['middleware' => 'verified'], function(){
        //cart checkout route (where user make payment for items)
        Route::get('checkout', 'CheckoutController@index')->name('cart.checkout');
    });

    // Redirect success payment
    //Route::get('/success/{id}/pay', 'ShoppingController@add_to_cart')->name('cart.buy_course');
    // Route::get('/success/{pid}/', 'ShoppingController@add_to_cart')->name('cart.success');
    Route::get('success', 'CheckoutController@success')->name('cart.success');


    // My Order Route
    Route::group(['middleware' => 'verified'], function(){
        // For Users
        Route::get('user/{id}/myOrder', 'CheckoutController@myOrder')->name('cart.myOrder');
        
    });

    // All Orders
    Route::group(['middleware' => 'admin'], function(){
        // For Admin
        Route::get('user/allOrders', 'CheckoutController@allOrders')->name('cart.allOrders');
    });

    // End
    //course Comment
    Route::resource('coursecomment', 'CourseCommentsController');

    // Student testomonials
    Route::group(['middleware' => 'verified'], function(){
        Route::resource('student_testimonial', 'Admin\StudentTestimonialsController');

        // UsersController
        Route::resource('user', 'UsersController');
        // MyProfile
        Route::get('user/{id}/edit', 'UsersController@profileUpdate')->name('user.profileEdit');
        
    });
