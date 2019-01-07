<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public function owner()
    {
        return $this->morphTo();
    }

    public static function storeFiles(array $files, $owner_id, $owner_type)
    {
        foreach ($files as $file) {
            $name = date('H-i-s-').$file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);

            $image = new File();
            $image->name = $name;
            $image->owner_id = $owner_id;
            $image->owner_type = $owner_type;
            $image->save();
        }
    }

    public static function deleteFiles($owner_id, $owner_type)
    {
        File::where([['owner_id', '=', $owner_id], ['owner_type', '=', $owner_type]])->get()->each(function ($file, $key) {
            if (file_exists(public_path('images/' . $file->name))) {
                unlink(public_path('images/' . $file->name));
            }
            $file->delete();
        });
    }
}
