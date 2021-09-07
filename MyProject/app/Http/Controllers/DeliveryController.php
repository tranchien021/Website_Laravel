<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Moneyship;

class DeliveryController extends Controller
{
    public function delivery(Request $request){
        $city=City::orderBy('matp','ASC')->get();
        return view('admin.delivery.create',compact('city'));
    }
    public function select_delivery(Request $request){
       
        $data=$request->all();
        
        if($data['action']){
            $output="";
            if($data['action']=="city"){
                $select_province=Province::where('matp',$data['ma_id'])->orderBy('maqh','ASC')->get();
                $output.="<option>----- Chọn quận huyện mới--------</option>";
                foreach($select_province as $key => $province){
                    $output.='<option value=" '.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
                
               
            
            }else{
                $select_wards=Wards::where('maqh',$data['ma_id'])->orderBy('xaid','ASC')->get();
                $output.="<option>----- Chọn xã phường mới --------</option>";
                foreach($select_wards as $key => $ward){
                    $output.='<option value=" '.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }
              
               
            }
        }
        echo $output;
    }
    public function insert_delivery(Request $request){
        $data=$request->all();
        $money_ship=new Moneyship();
        $money_ship->mship_matp=$data['city'];
        $money_ship->mship_maqh=$data['province'];
        $money_ship->mship_xaid=$data['wards'];
        $money_ship->mship_money=$data['money_ship'];
        $money_ship->save();
    }
    public function money_delivery(){
        $money_ship=Moneyship::orderBy('mship_id','DESC')->get();
        $output="";
        $output.='<div class="table-responsive"> 
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tên thành phố</th>
                        <th>Tên quận huyện</th>
                        <th>Tên xã phường</th>
                        <th>Phí vận chuyển</th>
                    </tr>
                </thead>
                <tbody>
            ';
            foreach($money_ship as $key => $money){
                $output.='
                <tr>
                    <td>'.$money->city->name_city.'</td>
                    <td>'.$money->province->name_quanhuyen.'</td>
                    <td>'.$money->wards->name_xaphuong.'</td>
                    <td contenteditable data-mship_id="'.$money->mship_id.'" class="mship_edit" >'.number_format($money->mship_money,0,',','.').'  </td>
                </tr>
                ';
            }
                   
        $output.='
                </tbody>
            </table></div>
        ';
        echo $output;
        
      

    }
    public function update_delivery(Request $request){
        $data=$request->all();
        $money_ship=Moneyship::find($data['mship_id']);
        $money_value=rtrim($data['mship_value'],'.');
        $money_ship->mship_money= $money_value;
        $money_ship->save();
    }
}
