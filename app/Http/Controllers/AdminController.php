<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    protected function imageUpload(Request $request, Model $model, string $folder)
    {
        $image = $request->file('image');

        $relativePath = "public/shop/uploads/images/$folder/";

        $imageName = $model->slug . '.' . $image->getClientOriginalExtension();

        $request->file('image')->storeAs($relativePath, $imageName);

        return asset("storage/shop/uploads/images/$folder/" . $imageName);
    }
}
