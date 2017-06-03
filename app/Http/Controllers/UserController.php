<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth' ,[
            'only' => ['edit','update']
        ]);
    }

    public function create(){
        return view('static_pages.create');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update($id ,Request $request){
        $this->validate($request, [
            'name' => 'required|max:50',
            'password' => 'confirmed|min:6'
        ]);

        $user = User::findOrFail($id);

        $data = [];
        $data['name'] = $request->name;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        session()->flash('success', '个人资料更新成功！');

        return redirect()->route('users.show', $id);
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3|max:15',
            'email'=> 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        Auth::login($user);
        session()->flash('success',"欢迎您，亲爱的$user->name,您将在这里开启一段新的旅程~");
        return redirect()->Route('users.show',[$user->id]);
    }
}
