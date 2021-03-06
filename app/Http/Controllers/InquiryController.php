<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\SendEmail;
use App\Mail\SendEmailCustomer;
use App\Mail\SendEmailAdmin;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class InquiryController extends Controller
{   
    public function store(Request $request) {
        $rule = [
            'contact_person' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'zip_code' => 'required',
            'min_order' => 'required',
            'lead_time' => 'required',
            'type' => 'required',
            'material' => 'required',
            'file_reference' => 'nullable|file|mimes:jpg,jpeg,bmp,png|max:2000',
        ];
        
        Validator::make($request->all(), $rule)->validate();

        $contact_person = $request->input('contact_person');
        $email = $request->input('email');
        $country = $request->input('country');
        $zip_code = $request->input('zip_code');
        $min_order = $request->input('min_order');
        $lead_time = $request->input('lead_time');
        $type = $request->input('type');
        $material = $request->input('material');
        $description = $request->input('description');
        $ip_address = $request->ip();

        $inquiry = new Inquiry();
        $inquiry->contact_person = $contact_person;
        $inquiry->email = $email;
        $inquiry->id_country = $country;
        $inquiry->zip_code = $zip_code;
        $inquiry->min_order = $min_order;
        $inquiry->lead_time = $lead_time;
        $inquiry->type = $type;
        $inquiry->material = $material;
        $inquiry->description = $description;
        $inquiry->ip_address = $ip_address;
        //$token_inquiry = Str::uuid();
        $inquiry->token = Str::uuid();
        $inquiry->save();
        $id_inquiry = $inquiry->id_inquiry;

        //save reference
        $data_to_insert = ['id_inquiry' => $id_inquiry];
        if ($request->hasFile('file_reference')) {
            $fileName_reference = 'reference_'.$this->_generateRandomString().time().'.'.$request->file_reference->extension();  
            $request->file_reference->move(public_path('file/reference/'), $fileName_reference);

            $data_to_insert['type'] = 'img';
            $data_to_insert['link_imgname'] = $fileName_reference;
            DB::table('data_inquiry_reference')->insert($data_to_insert);
        }

        if($request->input('link1')!='') {
            $data_to_insert['type'] = 'link';
            $data_to_insert['link_imgname'] = $request->input('link1');
            DB::table('data_inquiry_reference')->insert($data_to_insert);
        }
        if($request->input('link2')!='') {
            $data_to_insert['type'] = 'link';
            $data_to_insert['link_imgname'] = $request->input('link2');
            DB::table('data_inquiry_reference')->insert($data_to_insert);
        }

        //send email to user
        $link_inquiry = url('inquiry/detail/'.$inquiry->token);

        $param = (object) [
            'subject' => "Thank you for inquiry",
            //'body' => $body_email,
            'contact_person'=>$contact_person, 
            'link_inquiry' => $link_inquiry
        ];
        Mail::to($email)->send(new SendEmailCustomer($param));

        //get list data admin
        $data_user = User::where('role','admin')->get();
        foreach ($data_user as $key => $value) {
            $param = (object) [
                'subject' => "A new inquiry received",
                //'body' => $body_email
                'email'=>$email,
                'link_inquiry' => $link_inquiry,
                'min_order' => $min_order,
                'type' => $type
            ];
            Mail::to($value->email)->send(new SendEmailAdmin($param));
        }

        return response()->json(['status'=>'success', 'data'=> $inquiry, 'message'=>'Inquiry has been submitted']);

    }

    private function _generateRandomString($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function detail(Request $request, $uuid) {
        //check uuid
        $data_inquiry = Inquiry::where('token',$uuid)->whereRaw('(CURDATE() <= DATE_ADD(created_at, INTERVAL 1 MONTH))')->first();
        if(!empty($data_inquiry)) {
            $created_date = $data_inquiry->created_at;

            
            $data_inquiry->created_date = date('d M Y H:i:s',strtotime($data_inquiry->created_at));
            $data_inquiry->material = $data_inquiry->material=='both'?'Silver & Gold':$data_inquiry->material;

            //get reference file
            $data_reference = DB::table('data_inquiry_reference')->where('id_inquiry',$data_inquiry->id_inquiry)->get();
        } else {abort(404);}

        return view('inquiry.v_detail',['data_inquiry' => $data_inquiry, 'data_reference' => $data_reference]);
        
    }
}