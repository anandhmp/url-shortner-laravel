<?php

namespace App\Http\Controllers;
use App\Models\Urls;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class UrlsController extends Controller
{
 public function Getlink(){
    $takenUrls = Urls::get();
    return view('shortner' , compact('takenUrls'));
 }   

 public function store(Request $request){
   $request -> validate(['link' => 'required|url']);
    $input['link'] = $request -> link;
    $input['Name'] = $request -> Name;
    $input['code'] = Str::random(1);
    Urls::create($input);
   return redirect('create')->withSuccess('shorten Link generated');

}
/* $request -> validate(['link' => 'required|url']);
    $input['link'] = $request -> link;
    $input['code'] = Str::random(6) ;]);
    Urls::create($input);*/
     

 public function shortenlink($code){
    $find = Urls::where('code',$code)->first();
    return redirect($find->link);
 }


 public function edit(int $id){
   $edit = Urls::findorFail($id);
   return view('edit',compact('edit'));
 }

 public function update(Request $request,int $id){
  $request -> validate([
   'link' => 'required',
   'Name' => 'required',
   'code' => Str::random(1)
  ]);

  Urls::findorFail($id)->update([
   'link' => $request->link,
   'Name' => $request->Name,
   'code' => Str::random(1),
  ]);
   return redirect('/create');
 }


 public function destroy(int $id){
      Urls::findorFail($id) -> delete();
      return redirect('create');
 }
}