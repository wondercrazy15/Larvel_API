<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Myaccount;
use Validator;

class firstAPIController extends Controller
{
    //
    public function getData($id=null){
        return $id?Myaccount::find($id):Myaccount::all();
    }

    public function postData(Request $req){
        $data= new Myaccount;
        $data->username=$req->username;
        $data->email_id=$req->email_id;
        $data->pwd=$req->pwd;
        $res=$data->save();
        if($res)
        {
            return ["Result"=>"Data Inserted Successfull"];
        }
    }
    public function putData(Request $req){
        $data= Myaccount::find($req->id);
        $data->username=$req->username;
        $data->email_id=$req->email_id;
        $data->pwd=$req->pwd;
        $res=$data->save();
        if($res)
        {
            return ["Result"=>"Data Updated Successfully"];
        }
    }
    public function searchData($username){
       return Myaccount::where("username","like","%".$username."%")->get();
        //return $data; 
        //return ["Result"=>"Keyword Match"];
    }
    public function deleteData($id){
        $data= Myaccount::find($id);
        $data->delete();
        return ["Result"=> $id. "Record Deleted Successfully"];
    }
    public function validationData(Request $req){
        $data=array(
            "username" => "required |min:4",
            "email_id" => "required"
        );
        $valid = Validator::make($req->all(),$data);
        if($valid->fails())
        {
            return $valid->errors();
        }
        else{
            return ["Result"=>"Data Validate"];
        }
    }
    public function fileUpload(Request $req){
        $res=$req->file('xyz')->store('apiImage'); 
        return ["Result"=>$res];
    }

}
