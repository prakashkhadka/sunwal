<?php

namespace App\Http\Controllers\User;


use App\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;


class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function update(Request $request, $id)
    {
        //return $request->all();
        

        $input['phone'] = $request->phone;
        $input['municipility'] = $request->municipility;
        $input['ward'] = $request->ward;
        $input['tol'] = $request->tol;
        $input['address'] = $request->address;

        

        if($request->hasFile('file')){
            /*
            if($oldUserPhoto = UserInfo::findOrFail($id)->file){
                unlink(public_path() .'/userPhoto/' . $oldUserPhoto);
            }
            */
            $file = $request->file('file');
            //return $exif_data = exif_read_data($file);
            $photoName = time() . $file->getClientOriginalName();
            $input['file'] = $photoName;
            $file->move('userPhoto', $photoName);

            //$oldUserPhoto = UserInfo::findOrFail($id)->userphoto;
            //unlink(public_path() .'/userPhoto/' . $oldUserPhoto);
            
        }


        $userInfo = UserInfo::findOrFail($id);
        $userInfo->update($input);

        
        

        $user = $userInfo->user;
        
        $user['name'] = $request->name;
        
        $user->update();
        
        return redirect('/home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
}
