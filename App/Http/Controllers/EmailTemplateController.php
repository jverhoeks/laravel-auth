<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailTemplate;

class EmailTemplateController extends Controller
{

  //protected $fillable = ['name','subject','content'];

  /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
     return view('emailtemplates.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$emailtemplates = EmailTemplate::where('user_id', auth()->user()->id)->get();

        $emailtemplates = EmailTemplate::get();
        return view('emailtemplates.index',compact('emailtemplates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
              //$emailtemplates = EmailTemplate::where('user_id', auth()->user()->id)
        $emailtemplate = EmailTemplate::where('id', $id)->first();

        return view('emailtemplates.edit', compact('emailtemplate', 'id'));
    }

    /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
      public function update(Request $request, $id)
      {
         $emailtemplate = new EmailTemplate();
         $data = $this->validate($request, [
             'name'   => 'required',
             'subject'=>'required',
             'content'=> 'required'
         ]);
         $data['id'] = $id;
         $emailtemplate->updateEmailTemplate($data);

         return redirect('/emailtemplates')->with('success', 'EmailTemplate updated.');
      }

 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $emailtemplate = new Emailtemplate();
        $data = $this->validate($request, [
            'name'=>'required',
            'subject'=> 'required',
            'content'=> 'required'
        ]);

        $emailtemplate->saveEmailTemplate($data);
        return redirect('/emailtemplates')->with('success', 'EmailTemplate Created');
    }

    /**
 * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
          $emailtemplate = EmailTemplate::find($id);
          $emailtemplate->delete();

          return redirect('/emailtemplates')->with('success', 'EmailTemplate has been deleted!!');
      }
}
