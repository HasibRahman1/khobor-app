<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Reporter;
use Session;

class VisitorAuthController extends Controller
{
    private $visitor;
    public function index()
    {
        return view('visitor.auth.login');
    }

    public function reg()
    {
        return view('visitor.auth.register');
    }
    public function login(Request $request)
    {
        $this->visitor = Visitor::where('email', $request->email)->first();
        $this->reporter = Reporter::where('email', $request->email)->first();
        if($this->visitor)
        {
            if(password_verify($request->password, $this->visitor->password))
            {
                Session::put('visitor_id',$this->visitor->id);
                Session::put('visitor_name',$this->visitor->name);
                return redirect('/my-dashboard');
            }
            else {
                return back()->with('message','Sorry..Invalid Password');
            }
        }
        elseif($this->reporter)
        {
            if(password_verify($request->password, $this->reporter->password))
            {
                Session::put('reporter_id',$this->reporter->id);
                Session::put('reporter_name',$this->reporter->name);
                return redirect('/reporter-dashboard');
            }
            else {
                return back()->with('message','Sorry..Invalid Password');
            }
        }
        else{
            return back()->with('message','Sorry..Invalid Email');
        }
    }

    public function register(Request $request)
    {
        $this->visitor = Visitor::newVisitor($request);

        Session::put('visitor_id',$this->visitor->id);
        Session::put('visitor_name',$this->visitor->name);
        return redirect('/my-dashboard');




    }
    public function dashboard()
    {
        return view('visitor.home.index');
    }

    public function logout()
    {
        Session::forget('visitor_id');
        Session::forget('visitor_name');
        Session::forget('reporter_id');
        Session::forget('reporter_name');
        return redirect('/');
    }


}
