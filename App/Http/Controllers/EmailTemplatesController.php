<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;


class EmailTemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return IlluminateHttpResponse
     */
    public function index()
    {
        $emailtemplates = EmailTemplate::latest()->paginate(5);
        return view('emailtemplates.index', compact('emailtemplates'))->with('i',(request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return IlluminateHttpResponse
     */
    public function create()
    {
        return view('emailtemplates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @return IlluminateHttpResponse
     */
    public function store(Request $request)
    {
        request()->validate([
          'name' => 'required',
          'subject' => 'required',
          'content' => 'required',
        ]);
        EmailTemplate::create($request->all());
        return redirect()->route('emailtemplates.index')->with('success','EmailTemplate created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function show($id)
    {
        $emailtemplate = EmailTemplate::find($id);
        return view('emailtemplates.show', compact('emailtemplate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function edit($id)
    {
        $emailtemplate = EmailTemplate::find($id);
        return view('emailtemplates.edit', compact('emailtemplate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IlluminateHttpRequest  $request
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function update(Request $request, $id)
    {
      request()->validate([
        'name' => 'required',
        'subject' => 'required',
        'content' => 'required',
      ]);
      EmailTemplate::find($id)->update($request->all());
      return redirect()->route('emailtemplates.index')->with('success','EmailTemplate updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return IlluminateHttpResponse
     */
    public function destroy($id)
    {
        EmailTemplate::find($id)->delete();
        return redirect()->route('emailtemplates.index')->with('success','EmailTemplate deleted successfully');
    }
}
