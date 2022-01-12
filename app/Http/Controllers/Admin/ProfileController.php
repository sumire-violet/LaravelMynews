<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Profiles Modelが使えるように追記
use App\Profile;
use App\ProfileHistory;
use Carbon\Carbon;

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
      $this->validate($request, Profile::$rules);
      $profile = new Profile;
      $form = $request->all();
      // データベースに保存する
      $profile->fill($form);
      $profile->save();
    //admin/profile/createにリダイレクトする
        return redirect('admin/profile/');
    }
    public function index(Request $request)
    {
          $posts = Profile::all();
      return view('admin.profile.index', ['posts' => $posts]);
    }
    public function edit(Request $request)
    {
         // News Modelからデータを取得する
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
        return view('admin.profile.edit',['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
          // Validationをかける
      $this->validate($request, Profile::$rules);
      // News Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();
      unset($profile_form['_token']);

      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();
      
      $history = new ProfileHistory();
      $history->profile_id = $profile->id;
      $history->edited_at = Carbon::now('Asia/Tokyo');
      $history->save();

      return redirect('admin/profile/');
    }
    public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $profile = Profile::find($request->id);
      // 削除する
      $profile->delete();
      return redirect('admin/profile/');
  }  
}
