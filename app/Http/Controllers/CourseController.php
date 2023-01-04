<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\BuyedCourse;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseMaterial;
use App\Models\CoursePlan;
use App\Models\User;
use App\Models\UserRequisites;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{
    /**
     * @param $ability
     * @param $arguments
     * @return false
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('courses.index', [
            'categories' => Category::with('categoryTypes')->get(),
            'courses' => Course::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCourseRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCourseRequest $request)
    {
        $randomPassword = rand(1,9) . rand(1,9) . rand(1,9) . rand(1, 9) . rand(1, 9) . rand(1, 9);

        // Выделяем сам курс и план
        $course = Course::query()->find($request->post('course'));
        $plan = CoursePlan::query()->find($request->post('course_plan'));

        // Теперь получаем цену итоговую
        $duration = $plan->courseMaterials->sum('duration');
        $totalPrice = $duration * $course->price;

        // Для начала проверяем, сколько лет пользователю. Если меньше 16, то выкидываем с ошибкой
        $oldYears = Carbon::parse($request->post('birthdate'))->diffInYears(Carbon::now());

        if ($oldYears < 17) {
            return redirect()->back()->withErrors(['msg' => 'Обучающийся должен быть старше 17 лет.']);
        }

        $userIsset = User::query()->where('email', $request->post('email'));
        $userIsAlready = $userIsset->count();

        if ($userIsset->count() == 0) {
            // Создаем, либо получаем пользователя
            $user = User::query()->create([
                'email' => $request->post('email'),
                'name' => $request->post('name'),
                'password' => Hash::make($randomPassword),
            ]);
        } else {
            $user = $userIsset->first();
        }

        // Создаем реквизит пользователя
        $requisite = UserRequisites::query()->firstOrCreate(
            [
                'snils' => $request->post('snils')
            ],
            [
                'user_id' => $user->id,
                'birth_date' => $request->post('birthdate'),
                'gender' => $request->post('gender'),
                'education_level' => $request->post('education_level'),
            ]
        );

        // Создаем саму заявку на обучение
        $buyedCourse = BuyedCourse::query()->create([
            'user_id' => $user->id,
            'user_requisite_id' => $requisite->id,
            'course_id' => $request->post('course'),
            'course_plan_id' => $request->post('course_plan'),
            'price' => $totalPrice,
            'installment' => $request->post('installment') == 'on',
        ]);

        $showData = [
            'order_id' => $buyedCourse->id,
            'course_id' => $request->post('course'),
            'email' => $user->email,
            'password' => $userIsAlready > 0 ? 'Указанный при регистрации' : $randomPassword,
            'installment' => $request->post('installment') == 'on',
        ];

        return redirect('/order/view?' . Arr::query($showData));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Course $course)
    {
        return view('courses.show', [
            'course' => $course,
//            'materials' => CourseMaterial::query()->where('course_id', $course->id)->get(),
        ]);
    }

    /**
     * @param BuyedCourse $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function teach(BuyedCourse $buyedCourse)
    {
        $buyedCourse = $buyedCourse->first();

        if ($buyedCourse->installment === 1 && $buyedCourse->payed < $buyedCourse->price && $buyedCourse->payed < ($buyedCourse->price * 0.1)) {
            return redirect()->back()->withErrors(['msg' => "Внесите взнос."]);
        } elseif ($buyedCourse->installment === 1 && $buyedCourse->payed > ($buyedCourse->price * 0.1)) {
            $badge = "Курс предоставлен в рассрочку.";
        } elseif ($buyedCourse->installment === 0 && $buyedCourse->payed < $buyedCourse->price) {
            return redirect()->back()->withErrors(['msg' => "Курс не оплачен."]);
        } else {
            $badge = "Курс полностью оплачен. Спасибо!";
        }

        return view('course.teach', [
            'order' => $buyedCourse,
            'course' => $buyedCourse->course,
            'plan' => $buyedCourse->plan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCourseRequest  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
