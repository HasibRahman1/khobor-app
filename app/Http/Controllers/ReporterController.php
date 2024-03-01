<?php

namespace App\Http\Controllers;

use App\Models\Reporter;
use Illuminate\Http\Request;

class ReporterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $blood_groups = [], $barishals = [], $chittagongs = [], $dhakas = [], $mymensinghs = [], $khulnas = [], $rajshahis = [], $rangpurs = [], $sylhets = [];
    public function index()
    {

        return view('admin.reporter.index', ['reporters' => Reporter::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->blood_groups = ['O+ve', 'O-ve', 'A+ve', 'A-ve', 'B+ve', 'B-ve', 'AB+ve', 'AB-ve'];
        $this->barishals =['Barguna', 'Barisal', 'Bhola', 'Jhalokati', 'Patuakhali', 'Pirojpur'];
        $this->chittagongs =['Bandarban', 'Brahmanbaria', 'Chandpur', 'Chittagong', 'Comilla', 'Coxs Bazar ', 'Feni', 'Khagrachari', 'Lakshmipur', 'Noakhali', 'Rangamati'];
        $this->dhakas =['Dhaka', 'Faridpur', 'Gazipur', 'Gopalganj', 'Jamalpur', 'Kishoreganj', 'Madaripur', 'Manikganj', 'Munshiganj', 'Mymensingh', 'Narayanganj', 'Narsingdi', 'Rajbari', 'Shariatpur', 'Tangail'];
        $this->mymensinghs =['Jamalpur', 'Mymensingh', 'Netrakona', 'Sherpur'];
        $this->khulnas =['Bagerhat', 'Chuadanga', 'Jessore', 'Jhenaidah', 'Khulna', 'Kushtia', 'Magura', 'Meherpur', 'Narail', 'Satkhira'];
        $this->rajshahis =['Bogra', 'Joypurhat', 'Naogaon', 'Natore', 'Nawabganj', 'Pabna', 'Rajshahi', 'Sirajgonj'];
        $this->rangpurs =['Rangpur', 'Gaibandha', 'Kurigram', 'Nilphamari', 'Lalmonirhat', 'Dinajpur', 'Thakurgaon', 'Panchagarh'];
        $this->sylhets =['Habiganj', 'Maulvibazar', 'Sunamganj', 'Sylhet' ];

        return view('admin.reporter.add', [
            'reporters' => Reporter::all(),
            'blood_groups' => $this->blood_groups,
            'barishals' => $this->barishals,
            'chittagongs' => $this->chittagongs,
            'dhakas' => $this->dhakas,
            'mymensinghs' => $this->mymensinghs,
            'khulnas' => $this->khulnas,
            'rajshahis' => $this->rajshahis,
            'rangpurs' => $this->rangpurs,
            'sylhets' => $this->sylhets,


            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'email'             => 'required',
            'password'          => 'required',
        ], [
            'name.required'         => 'Name field is required',
            'email.required'        => 'Email field is required',
            'password.required'     => 'Password field is required',
        ]);
        Reporter::newReporter($request);
        return back()->with('message', 'Reporter info created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reporter $reporter)
    {
        return view('admin.reporter.show',['reporter' => $reporter]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reporter $reporter)
    {
        return view('admin.reporter.edit', [
            'reporter' => $reporter
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporter $reporter)
    {
        if ($request->name == null || $request->email == null || $request->password == null)
        {
            $this->validate($request, [
                'name'              => 'required',
                'email'             => 'required',
                'password'          => 'required',
            ], [
                'name.required'         => 'Name field is required',
                'email.required'        => 'Email field is required',
                'password.required'     => 'Password field is required',
            ]);
        }
        Reporter::updateReporter($request, $reporter);
        return redirect('/reporter')->with('message', 'Reporter info updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporter $reporter)
    {
        Reporter::deleteReporter($reporter);
        return redirect('/reporter')->with('message', 'Reporter info deleted successfully!');
    }
}
