<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'title', 'text', 'image',
    ];

    private function genFileName()
    {
        return sha1(microtime(1) . mt_rand(1, 100000000)) . '.jpg';
    }

    public function loadFile(string $file)
    {
        if (file_exists($file)) {
            $this->image = $this->genFileName();
            move_uploaded_file($file, getcwd() . '/images/news/' . $this->image);
            $image = 'images/news/' . $this->image;
            $this->imageHandler($image);
        }
    }

    public function imageHandler(string $image)
    {
        $img = Image::make($image)
            ->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($image);
    }

    public function deleteImage(string $image)
    {
        $imageQuery = DB::table('news')->where('image', $image)->pluck('image')->all();
        $img = $imageQuery[0];
        if ($img) {
            $imgPath = 'images/news/' . $img;
            if (file_exists($imgPath)) {
                unlink($imgPath);
            }
        }
    }
}

