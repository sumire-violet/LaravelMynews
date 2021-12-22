<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Profiles Modelが使えるように追記
use App\Profiles;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    public function create(Request $request)
    {
      // Varidationを行う
      $this->validate($request, Profiles::$rules);
      $profiles = new Profiles;
      $form = $request->all();
      // データベースに保存する
      $profiles->fill($form);
      $profiles->save();
    //admin/profile/createにリダイレクトする
        return redirect('admin/profile/create');
    }

    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
