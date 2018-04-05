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
use App\Task;
use Illuminate\Http\Request;


Route::get('/', function () {
    //Show ra list TASK
    $t = Task::orderBy('created_at','desc')->get();

    //truyen bien $t vao view 'tasks'
    return view('tasks',[
        't' => $t
    ]);
});

//Nhan Request form tu nguoi dung va add vao Model->database
Route::post('task', function (Request $request) {
    $v = Validator::make($request->all(),[
//bat buoc nhap truong ten va khong dai qua 255 ki tu
        'name' => 'required|max:255'
    ]);
    // neu DL nhap vao khong dung theo yeu cau
    if ($v->fails()){
        //quay ve trang chu
        return redirect('/')->withInput()
                                ->withErrors($v);
    }
    $task = new Task();
    $task->name=$request->name;
    $task->save();

    return  redirect ('/');
});

Route::delete('task/{id}',function($id){
    Task::findOrFail($id)->delete();
    return redirect ('/');
});
Route::get('update/{id}',function($id,Request $request){
    $v =Validator::make($request->all(),['name-change']);
    $u = Task::find($id);
    $u->name = $request->input('name-change');
    $u->save();

    return redirect ('/');
});