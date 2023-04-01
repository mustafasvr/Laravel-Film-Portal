<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\SettingsGroup;
use Illuminate\Support\Facades\Validator;

class SettingsGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group = SettingsGroup::orderBy('group_order','ASC')->get();
        return \view('admin.settings.group.index',\compact('group'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('admin.settings.group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'group_name' => 'required',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator);
        } else {

            $group = new SettingsGroup();
            $group->group_name = $request->group_name;
            $group->group_url =  Helper::seo($request->group_name);
            $group->group_icon = $request->group_icon;
            $group->group_desc = $request->group_desc;
            $group->group_order = $request->group_order;
            $group->save();


            return \redirect()->route('admin.settings.index');
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
        if($group = SettingsGroup::where('group_id',$id)->where('group_delete',true)->first())
        {
            return view('admin.settings.group.edit',compact('group'));
            exit;
        } else {
            return redirect()->route('admin.settings.index');
            exit;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = $request->route('id');

        if($request->group_url)
        {
            $url = $request->group_url;
        } else {
            $url =  Helper::seo($request->group_name);
        }


        $page=SettingsGroup::where('group_id',$id)->where('group_delete',true)->update(
            [
                'group_name' => $request->group_name,
                'group_url' => $url,
                'group_desc' => $request->group_desc,
                'group_icon' => $request->group_icon
            ],
        );

        if ($page)
        {
            return redirect()->route('admin.settings.index');
            exit;
        } else {
            return \redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = SettingsGroup::where('group_id',$id)->where('group_delete',true)->delete();

        if ($kategori) {
            return redirect()->back()->with('success','Silme işlemi başarılı');
            exit;
        } else {
            return redirect()->back()->with('success','Bir hata oluştu');
            exit;
        }
    }
}
