<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Image;
use File;
use Illuminate\Support\Facades\Validator;


class ImageController extends Controller
{

    const path = [
        'product' => 'admin/dist/img/product/',
        'profile' => 'admin/dist/img/profile/'
    ];


    /**
     * return image
     *
     * @param Request $request
     * @param $image
     * @param null $thumb
     * @return mixed
     */

    public function get(Request $request, $image, $profile = null)
    {
        $imagesPath = ($profile) ? self::path['profile'] : self::path['image'];
        return Image::make(public_path($imagesPath . $image))->response();
    }

    /**
     * return image
     *
     * @param Request $request
     * @param $image
     * @param null $thumb
     * @return mixed
     */
    public function get_other(Request $request, $path, $image)
    {
        return Image::make(storage_path('app/' . $path . '/' . $image))->response();
    }

    /**
     * delete image from storage
     *
     * @param $imageName
     * @return mixed
     */
    public static function imageDelete($imageName, $profile = null, $id = null)
    {
        $imagesPath = ($profile) ? self::path['profile'] : self::path['product'];
        $imagesPath = ($id) ? $imagesPath . $id . '/' : $imagesPath;

        $img = explode('/', $imageName);
        $full_img_url = $imagesPath . '/' . end($img);
        if (file_exists($full_img_url)) {
            $image_url = public_path($full_img_url);

            return File::delete(["$image_url"]);
        }
        return;


    }

    public static function pathDelete($profile = null, $id = null)
    {
        $imagesPath = ($profile) ? self::path['profile'] : self::path['product'];
        $imagesPath = ($id) ? $imagesPath . $id : $imagesPath;
        if (file_exists($imagesPath)) {
            rmdir($imagesPath);
        }

    }


    /**
     * upload image to storage
     *
     * @param $request
     * @param null $imageName
     * @param int $iHeight
     * @param int $tHeight
     * @return int|null|string
     */
    public static function imageUpload1($request, $imageName = null, $tWidth = 1017, $iWidth = 448)
    {
        if (isset($request->image)) {
            $image = $request->image;
        } else {
            $image = $request;
        }
        if ($image) {
            if (!$imageName) {
                $imageName = time() . '.' . $image->getClientOriginalName();
            }
            $upload_image = $image->move(public_path(self::path['image']), $imageName);
            // resizing an uploaded file
            if ($upload_image) {
                Image::make(public_path(self::path['image']) . $imageName)->resize($tWidth,
                    $iWidth)->save(public_path(self::path['image']) . $imageName);
                return url('/') . '/user/uploads/' . $imageName;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public static function imageUpload($img, $profile = null, $id = null, $tWidth = 448, $iWidth = 448)
    {
        $imagesPath = ($profile) ? self::path['profile'] : self::path['product'];
        $imagesPath = ($id) ? $imagesPath . $id . '/' : $imagesPath;

        $imageName = md5(uniqid(time())) . '.' . $img->extension();

        $upload_image = $img->move(public_path($imagesPath), $imageName);

        if ($upload_image) {
            Image::make(public_path($imagesPath) . $imageName)
                ->resize($tWidth, $iWidth)
                ->save(public_path($imagesPath) . $imageName);
            return url('/') . '/' . $imagesPath . '/' . $imageName;
        }

    }

//    public static  function imageUploadDefault( $request,$imageName=null){
//        if(isset($request->image)){
//            $image=$request->image;
//        }else{
//            $image=$request;
//        }
//        if ($image) {
//            if(!$imageName){
//                $imageName = time() . '.' .$image->getClientOriginalName();
//            }
//            $upload_image = $image->move(public_path(self::path['image']), $imageName);
//            // resizing an uploaded file
//            if($upload_image){
//                Image::make(public_path(self::path['image']).$imageName)->save(public_path(self::path['image']) . $imageName);
//                return url('/').'/user/uploads/'.$imageName;
//            }
//            else{
//                return 0;
//            }
//        }
//        else{
//            return 0;
//        }
//    }

    public function upload(Request $request)
    {
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = self::path['image'] . uniqid() . '.png';

        file_put_contents($file, $image_base64);
        Image::make(public_path($file))->resize(1017, 448)->save(public_path($file));
        return response()->json(['success' => 'success', 'name' => url('/') . '/' . $file]);
    }
}
