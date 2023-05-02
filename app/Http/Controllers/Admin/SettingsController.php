<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Models\Admin\Settings;
use App\Models\Admin\SettingsGroup;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $group = $request->route('group');

        if($groups = SettingsGroup::where('group_url',$group)->first())
        {
          $settings = Settings::where('group_id',$groups->group_id)->get();

            return view('admin.settings.index',compact('settings','groups'));
        } else {
            return redirect()->route('admin.settings.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $groups = $request->route('group');

        $group = SettingsGroup::where('group_url',$groups)->first();
        
        return \view('Admin.Settings.create',\compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'settings_name' => 'required',
            'group_id' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);

        } else {

            $Settings = new Settings();

            $c = Settings::where('settings_name', $request->settings_name)->first();
    
            if (!$c) {
               $Settings->group_id = $request->group_id;
               $Settings->settings_name = Helper::seo($request->settings_name);
               $Settings->settings_type = $request->settings_type;
               $Settings->save();
            }
    
            $group = SettingsGroup::where('group_id',$request->group_id)->first();


           return \redirect()->route('admin.settings.group',['group'=> $group->group_url]);

        }
       
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        

        $group = $request->route('group');

        if(SettingsGroup::where('group_url',$group)->first())
        {
          $inputData = $request->except(['_token']);

            foreach($inputData as $key => $value)
            {

                $averi = Settings::where('settings_name',$key)->first();
                

                if($averi->settings_value != $value)
                {
                    Settings::where('settings_id',$averi->settings_id)->update(
                        [
                            'settings_value' => $value,
                        ],
                    );
                }
                
            }

            return redirect()->back();

        } else {
            return redirect()->route('admin.settings.index');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Settings = Settings::where('settings_id',$id)->where('settings_delete',true)->delete();

        if ($Settings) {
            return redirect()->back()->with('success','Silme işlemi başarılı');
            exit;
        } else {
            return redirect()->back()->with('success','Bir hata oluştu');
            exit;
        }
    }
}
