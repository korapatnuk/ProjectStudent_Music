<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Arists extends Model
{
    protected $table= "tbl_arists";

    public function member(){
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function videos() {
        return $this->hasMany(VideoArist::class,'arists_id');
    }
    public function getLinkAttribute() {
        return url('/arists/'. $this->id);
    }
    public function getGetImageAttribute() {
        $image = Storage::get('/image_arist/'.$this->image_a);
        $type = pathinfo($this->image_a, PATHINFO_EXTENSION);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($image);
        return $base64;
    }
}
