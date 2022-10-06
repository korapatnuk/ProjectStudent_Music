<?php

namespace App\Http\Controllers;

use App\Arists;
use App\Events;
use App\Http\Requests\AristRegisterRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\TypeMusic;
use App\VideoArist;
use Illuminate\Http\Request;

class AristController extends Controller
{
    public function arist(Request $request) {
        $style = TypeMusic::with(['arist'=> function($q) use ($request){
            $q->when($request->aname, function($qu) use($request) {
                $qu->where('aname', 'like', "%{$request->aname}%");
            });
        }])->get();

        return view('arist.arist', compact('style'));
    }
    public function detail(Arists $item, $id) {
        $item = $item->with('videos')->find($id);
        return view('detail', compact('item'));
    }
    public function register() {
        $style = TypeMusic::get();
        if(!auth()->check()) {
            return back()->with('error_message','กรุณาเข้าสู่ระบบก่อนลงทะเบียนวงดนตรี');
        }
        if(count(auth()->user()->arist) > 0) {
            return back()->with('error_message','มีการลงทะเบียนวงดนตรีแล้ว');
        }
        return view('arist.register', compact('style'));
    }

    public function store(AristRegisterRequest $request) {
        $inputs = $request->except(['_token']);
        $inputs['member_id'] = auth()->user()->id;
        $inputs['created_at'] = now();
        $inputs['image_a'] = $this->uploadFile($inputs['image_a'], 'image_arist');
        Arists::insert($inputs);

        return redirect('/')->with('message', 'ลงทะเบียนวงดนตรีเรียบร้อยแล้ว');
    }

    public function addVideo ($id) {
            return view('arist.add-video', compact('id'));
    }

    public function addVideoPost(UpdateVideoRequest $request, $id){
        $inputs = $request->except(['_token']);
        $inputs['arists_id'] = $id;
        $inputs['created_at'] = now();

        VideoArist::insert($inputs);
        return redirect('/arists/'. $id)->with('message', 'ทำรายการเรียบร้อยแล้ว');

    }

    public function storeEvent (Request $request, $id){
        $inputs = $request->all();
        $inputs['member_id'] = auth()->user()->id;
        $inputs['arists_id'] = $id;
        $inputs['event_b'] = 1;
        $inputs['created_at'] = now();
        // dd($inputs);
        Events::insert($inputs);
        return back()->with('message', 'ทำรายการเรียบร้อยแล้ว');
    }
}
