<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Symfony\Component\CssSelector\Node\FunctionNode;
use App\Models\month;
use App\Models\daliya;
use App\Models\date_d;
use App\Models\date;
use App\Models\main;
use App\Models\year;
use Illuminate\Validation\ValidationException;

 // public function update(){
    //     // $data = Users::whereIn('id',[4,5])->sum('money');
    //     // echo $data;


    // //     echo "<pre>";
    // //    print_r($data[1]['id']); b
    //     // foreach($data as $value)
    //     // {
    //     //    $value['money'] += 1;
    //     //    $value->save();
    //     // }
    //     // if($value->save())
    //     // {
    //     //     echo $sum;
    //     // }
    // }



class Mycontroller extends Controller
{
    public function login_check(Request $req)
    {
        $data = daliya::where('name',$req['name'])->where('password',$req['password'])->first();

        if($data)
        {
            session()->put('uname',$data['name']);
            session()->put('u_id',$data['id']);
            session()->put('type',$data['type']);

            return redirect('dashboard');
        }
        else
        {
            session()->flash('error','તમરું નામ અને પાસવર્ડ ખોટો છે. ');
            return redirect('/');
        }
    }

    public function homepage(){
        return view('dashboard');
    }

    public function add_new(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'password'=>'required|min:6|max:8',
            'address'=>'required',
            'image'=>'required'
        ],
        [
            'name.required'=>'ઉપર તમારું નામ લખો',
            'password.required'=>'ઉપર તમારો પાસવર્ડ લખો',
            'password.min'=>'પાસવર્ડ 6 આંકડા થી વધારે રાખો',
            'password.max'=>'પાસવર્ડ 8 આંકડા થી ઓછો રાખો',
            'address.required'=>'ઉપર તમારું સરનામું લખો',
            'image.required'=>'દાળિયા નો ફોટો અપલોડ કરો'
        ]
    );
        $data =new daliya;
        if($req->file('image'))
        {
            $img = $req->file('image');
            $ext = $req->file('image')->extension();
            $ext2 = ['jpg','png','gif','jpeg'];
            if(in_array($ext,$ext2))
            {
                $name = time()."-HN.".$ext;
                $img->move(public_path('Images'),$name);
                $data->name = $req['name'];
                $data->password = $req['password'];
                $data->address = $req['address'];
                $data->image = 'public/Images/'.$name;
                $data->type = $req['type'];
                if($data->save())
                {
                    session()->flash('result','નવું દાળિયું ઉમેરાય ગયું છે');
                    return redirect()->route('new.add');
                }
                else
                {
                    session()->flash('result','sorry દાળિયું ઉમેરાણુ નથી');
                    return redirect()->route('new.add');
                }
            }
            else
            {
                session()->flash('image','માત્ર ફોટો જ અપલોડ કરો');
                return redirect()->route('new.add');
            }
        }
        else
        {
            return redirect()->route('new.add');
        }
    }


    public function select_date()
    {
        $month = month::get();
        $year = year::get();
        $date = date::get();

        return view('select_date')->with('month',$month)->with('year',$year)->with('date',$date);
    }

    public function selected_date(Request $req)
    {
       $users = daliya::get();

       return view('add_daliya')->with('users',$users)->with('date',$req['date'])->with('year',$req['year'])->with('month',$req['month']);
    }

    public function add_date(Request $req)
    {
        $total_dali = count($req['daliya']);
        $daliya = implode(',',$req['daliya']);
        if($req['dali']!=null)
        {

            $total_m = $total_dali * $req['dali'];
            $data = new date_d;
            $data->date = $req['date'];
            $data->month = $req['month'];
            $data->year = $req['year'];
            $data->daliya = $daliya;
            $data->total_d = $total_dali;
            $data->hisab = $total_m;
            $data->result = 'બાકી';

            $user = daliya::wherein('id',$req['daliya'])->get();

            foreach($user as $users)
            {
                $users['total_d'] += 1;
                $users['total_p'] += $req['dali'];
                $users->save();
            }

            if($data->save())
            {

                session()->flash('success',$req['date']."-".$req['month']."-".$req['year']."  આ તારીખ ના દાળિયા ઉમેરાય ગયા છે.");
                return redirect()->route('select.date');
            }
            else
            {
                session()->flash('error','Sorry કઈક વાંધો આવ્યો છે માફ કરજો');
                return redirect()->route('select.date');
            }
        }
        else
        {
            session()->flash('dali','તમે દાળી નાખેલ નથી કૃપા કરી ફરીથી પ્રયાસ કરો અને દાળી દાખલ કરો');
            return redirect('select_date');
        }
    }

    public function seen_d()
    {
        $data = date_d::get();
        return view('seen_d')->with('data',$data);
    }

    public function seen_show(Request $req)
    {
        $result = date_d::where('month',$req['month'])->where('year',$req['year'])->where('date',$req['date'])->first();

        if($result)
        {
            $all = explode(',',$result['daliya']);
            $data = DB::table('daliya')->wherein('id',$all)->get();
            return view('show_d')->with('result',$result)->with('data',$data);
        }
        else
        {
            session()->flash('error',$req['date']."-".$req['month']."-".$req['year']." તારીખ ની કોઈ પણ દાળી નથી");
            return redirect()->route('seen.daliya');
        }
    }

}
