<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // 檢查是否為學生
        $student = DB::table('student')->where('email', $email)->first();

        if ($student && Hash::check($password, $student->password)) {
            session([
                'user_name' => $student->name,
                'user_role' => '學生',
                'user_id' => $student->studentID,
            ]);
            return redirect('/student/home');
        }

        // 檢查是否為教師
        $teacher = DB::table('teacher')->where('email', $email)->first();

        if ($teacher && Hash::check($password, $teacher->password)) {
            session([
                'user_name' => $teacher->name,
                'user_role' => '老師',
                'user_id' => $teacher->teacherID,
            ]);
            return redirect('/teacher/home'); // 教師頁面
        }

        return back()->withErrors(['email' => '帳號或密碼錯誤']);
    }

    public function showRegisterForm() {
        return view('auth.register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'role' => 'required|in:student,teacher',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:' . $request->role . ',email',
            'password' => 'required|string|min:3|confirmed',
        ], [
            'email.unique' => '此電子郵件已被註冊',
        ]);
        
        if ($validated['role'] === 'student') {
            $validated_ID = $request->validate([
                'ID' => 'required|string|max:10|unique:student,studentID',
            ],[
                'ID.unique' => '此學號已被註冊',
            ]);
            $data = [
                'studentID' => $validated_ID['ID'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']), // 建議加密
            ];
            DB::table('student')->insert($data);
        } else {
            $validated_ID = $request->validate([
                'ID' => 'required|string|max:10|unique:teacher,teacherID',
            ],[
                    'ID.unique' => '此教師編號已被註冊',
                ]);
            $data = [
                'teacherID' => $validated_ID['ID'],
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']), // 建議加密
            ];
            DB::table('teacher')->insert($data);
        }
        
        return redirect()->route('login_form')->with('success', '註冊成功，請登入');
        
    }
    
    public function logout() {
        session()->flush(); // 清除所有 session
        return redirect()->route('login_form')->with('success', '登出成功'); // 登出後導回登入頁
    }

}

