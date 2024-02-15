<?php

namespace App\Http\Controllers\Web;

use App\Code;
use App\Meal;
use App\Town;
use App\Order;
use App\Table;
use App\Option;
use App\MenuItem;
use App\Promotion;
use App\ShopOrder;
use App\TableType;
use App\CuisineType;
use Illuminate\Http\Request;
use Minishlink\WebPush\WebPush;
use App\PushSubscription;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Minishlink\WebPush\Subscription;
use Illuminate\Support\Facades\Validator;

class CustomerShopController extends Controller
{
    protected function getSalePage(){

        $table_lists = Table::orderBy('table_type_id', 'ASC')->get();

        $table_types = TableType::all();

        return view('Customer.sale_page', compact('table_lists','table_types'));
    }
    protected function getShopOrderSalePage($table_id){
        // dd($table_id);
        $items = MenuItem::all();

        // dd($items);

        $meal_types = Meal::all();

        // dd($meal_types);

        $codes = Code::all();

        $cuisine_types = CuisineType::all();

        if ($table_id == 0) {

            $table_number = 0;

        } else {

            $order = ShopOrder::where('table_id', $table_id)->where('status', 1)->first();
            // dd($order->toArray());

            if(!empty($order) ){
                // dd("You Don't have Permission");
                return redirect()->route('add_more_customer_item',$order->id);

                // return redirect()->back();

            }else{
                // dd("hello2");add_more_cadd_more_customer_item
                $table = Table::where('id', $table_id)->first();

                $table_number = $table->id;
                // dd('you have already order');

            }
        }
        // dd($table->toArray());
        $pending_lists = ShopOrder::where('table_id', $table_id)->get();
        // dd($pending_lists->toArray());
        // $pending_lists = ShopOrder::get();
        // dd($pending_lists->toArray());
        $table_id = Table::where('status',2)->first();
        // dd($table_id);
        // dd($items->toArray());
        $table = 1;
        $ygn_towns = Town::where('state_id',13)->get();
        // $options = Option::get();
        // dd($options->toArray());
        // $options = Option::select('menu_item_id','brake_flag)->get();
        // dd($options->toArray());
        // dd($items->toArray());
        // $options = Option::select('menu_item_id','brake_flag')->get();
        $units = Option::get();
        // $item_id = $request->item_id;
        // $item = MenuItem::where('id', $item_id)->first();
        // dd($units->toArray());
        // $items = MenuItem::select('menu_item_id')->with('menu_item')->get();
        // foreach($items as $item){
        //     $units = Option::where('brake_flag', 2)->with('menu_item')->get();
        //     // dd($units->toArray());
        //     $bFlages = Option::where('brake_flag', 2)->get();
        //     dd($bFlages->toArray());
        //     if($units->brake_flag ){

        //     }
        // }
        // dd($items->toArray());


        return view('Customer.order_sale_page', compact('ygn_towns','codes','items','meal_types','table','cuisine_types','table_number','pending_lists','table_id'));
    }

    // getting menu items list

    public function menuItemListData(){
        $menu_items = MenuItem::get();
        return response()->json([
            "menu_items"=> $menu_items,
        ]);
    }

    //

    //start Modify
    protected function getShopOrderSaleMenu(){
        // dd('welcome');
        $items = MenuItem::all();

        // dd($items);

        $meal_types = Meal::all();

        // dd($meal_types);

        $codes = Code::all();

        $cuisine_types = CuisineType::all();

        $table = 1;

        $table_number = 0;

        $ygn_towns = Town::where('state_id',13)->get();
        return view('Customer.order_sale_page', compact('ygn_towns','codes','items','meal_types','table','cuisine_types','table_number'));
    }
    protected function shopMenuPage(){

        $table_lists = Table::orderBy('table_type_id', 'ASC')->get();

        $table_types = TableType::all();
        $table_id = Table::where('status',1)->first();
        // dd($table_id->toArray());
        $items = MenuItem::all();

        // dd($items);

        $meal_types = Meal::all();

        // dd($meal_types);

        $codes = Code::all();

        $cuisine_types = CuisineType::all();

        $table = 1;

        $table_number = 0;

        $ygn_towns = Town::where('state_id',13)->get();

        return view('Customer.sale_page', compact('table_lists','table_types','ygn_towns','codes','items','meal_types','table_id','cuisine_types','table_number','table'));
    }

    // // notify Controller Start
    // protected function notifyPost(PushSubscription $sub, Request $request){
    //     dd('hello');
    //     $webPush = new WebPush([
    //         "VAPID" => [
    //             "publicKey" => "BHK-fZXWC80sFT9QJA-wr8Kd70XwmG_eBKCyaqRMd8F0Crkn3HetpzZU0fm3zDPQqd2dAWL1azODD6UP28bVUrA",
    //             "privateKey" => "I4qdNBJ07oJIDoKVstQXdT0xU9TjW-lABOw5fz2-oj4",
    //             "subject" => "http://127.0.0.1"
    //         ]
    //     ]);
    //     // dd($webPush);
    //     $result = $webPush->sendOneNotification(
    //         Subscription::create(json_decode($sub->data ,true)),
    //         json_encode($request->input())
    //     );
    //     return redirect()->route('admin#home');
    //     dd("Successfully sent to Admin");
    //     // dd($result);
    // }

    // notify Controller End


    //end modify
    protected function getPendingShopOrderDetails($order_id){
        $table_number = 0;
        try {

            $pending_order_details = ShopOrder::findOrFail($order_id);
            // dd($pending_order_details->option);
        } catch (\Exception $e) {

            alert()->error("Pending Order Not Found!")->persistent("Close!");

            return redirect()->back();
        }

        $total_qty = 0 ;

        $total_price = 0 ;

        foreach ($pending_order_details->option as $option) {

            $total_qty += $option->pivot->quantity;

            $total_price += $option->sale_price * $option->pivot->quantity;
        }

        return view('customer.pending_order_details', compact('pending_order_details','total_qty','total_price','table_number'));
    }
    protected function storeShopOrder(Request $request){
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'table_id' => 'required',
            'option_lists' => 'required',
        ]);

        if ($validator->fails()) {

            alert()->error('Something Wrong! Validation Error.');

            return redirect()->back();
        }
        $user_name =  session()->get('user')->name;
        //  dd($user_name);
        $take_away = $request->take_away;
        $option_lists = json_decode($request->option_lists);
        // $agent = new \Jenssegers\Agent\Agent;
        // $is_mobile = $agent->isMobile();
        // $is_desktop = $agent->isDesktop();
        try {
            // dd($is_mobile,$is_desktop);
            $table = Table::where('id', $request->table_id)->first();
// dd($table);
            if (empty($table)) {
                // if($is_desktop == true || $is_mobile == true){
                $order = ShopOrder::create([
                    'table_id' => $request->table_id,
                    'status' => 1,
                    'is_mobile'=> 1,
                    'take_away_flag'=>$take_away,
                    'sale_by' =>$user_name,										// Order Status = 1
                ]);
                // }
                $order->order_number = "ORD-".sprintf("%04s", $order->id);

                $order->save();

                foreach ($option_lists as $option) {

                    $order->option()->attach($option->id, ['quantity' => $option->order_qty,'note' => null,'status' => 7]);
                }

            } else {

                if ($table->status == 2) {

                    alert()->error('Something Wrong! Table is not available.');

                    return redirect()->back();

                } else {

                    $table->status = 2;

                    $table->save();
                    // if($is_desktop == true || $is_mobile == true){
                    $order = ShopOrder::create([
                        'table_id' => $request->table_id,
                        'status' => 1, 										// Order Status = 1
                        'type' => 1,
                        'is_mobile'=> 1,
                        'take_away_flag'=>$take_away,
                        'sale_by' =>$user_name,
                    ]);
                    // }
                    $order->order_number = "ORD-".sprintf("%04s", $order->id);

                    $order->save();

                    foreach ($option_lists as $option) {

                        $order->option()->attach($option->id, ['quantity' => $option->order_qty,'note' => null,'status' => 7]);
                    }
                }
            }

        } catch (Exception $e) {

            alert()->error("Something Wrong! When Store Shop Order");

            return redirect()->back();
        }

        alert()->success('Successfully Store Shop Order');
        //   $allow_print = true;
        $orders = ShopOrder::find($order->id);
        // dd($orders->option()->price);
        $tableno = Table::find($orders->table_id);
        $alloption = Option::all();
        $option_name = DB::table('option_shop_order')
            ->where('shop_order_id',$orders->id)
            ->get();
        // dd($option_name);
        $name = [];
        // $qty = [];
        foreach($option_name as $optionss)
        {
            // dd($optionss->option_id);
            $oname = Option::find($optionss->option_id);
            array_push($name,$oname);
            // array_push($qty,$oname->quantity);
            // $temp['value']=array('key1'=>$oname->id,'key2'=>$oname->name);
        }
        // dd($name);


        $fromadd = 0;
        $tablenoo = 0;
        $date = new DateTime('Asia/Yangon');

        $real_date = $date->format('d-m-Y h:i:s');
        $code_lists = json_decode($request->code_lists);
        $notte = [];
        if($code_lists != null){
            foreach($code_lists as $code){
                $remark_note = DB::table('option_shop_order')
                    ->where('option_id',$code->id)
                    ->update(['note' => $code->remark]);
                $note_remark = DB::table('option_shop_order')
                    ->where('option_id',$code->id)
                    ->first();
                array_push($notte,$note_remark);
            }
        }
        return view('Sale.kitchen_lists',compact('take_away','notte','orders','tableno','option_name','real_date','oname','name','alloption','fromadd','tablenoo'));

    }
    protected function addMoreItemUI($order_id){  //Finished UI
        $table = 1;
        try {

            $order = ShopOrder::findOrFail($order_id);
            // dd($order);
        } catch (\Exception $e) {

            alert()->error("Shop Order Not Found!")->persistent("Close!");

            return redirect()->back();

        }

        $items = MenuItem::all();

        $meal_types = Meal::all();

        $codes = Code::all();

        $cuisine_types = CuisineType::all();

        DB::table('option_shop_order')
            ->where('shop_order_id', $order_id)
            ->update(['tocook' => 0]);

        $table_number = $order->table->table_number??0;
        // dd($table);
        return view('Customer.order_sale_page', compact('codes','items','meal_types','cuisine_types','table_number','order','table'));
    }
    protected function getCountingUnitsByItemId(Request $request){

        $item_id = $request->item_id;

        $item = MenuItem::where('id', $item_id)->first();

        $units = Option::where('menu_item_id', $item->id)->with('menu_item')->get();

        return response()->json($units);
    }
    protected function getPendingDeliveryOrderList(){

        $pending_lists = Order::where('status', 2)->get();
        // dd('hello');
        return view('Sale.delivery_pending_lists', compact('pending_lists'));
    }
    protected function getPendingShopOrderList(){

        $pending_lists = ShopOrder::where('status', 1)->get();

        $promotion = Promotion::all();

        return view('Customer.pending_lists', compact('pending_lists','promotion'));
    }

    // Notify Start

    protected function notifyPost(PushSubscription $sub, Request $request){
        // dd('hello');
        $webPush = new WebPush([
            "VAPID" => [
                "publicKey" => "BHK-fZXWC80sFT9QJA-wr8Kd70XwmG_eBKCyaqRMd8F0Crkn3HetpzZU0fm3zDPQqd2dAWL1azODD6UP28bVUrA",
                "privateKey" => "I4qdNBJ07oJIDoKVstQXdT0xU9TjW-lABOw5fz2-oj4",
                "subject" => "http://127.0.0.1"
            ]
        ]);
        // dd($webPush);
        $result = $webPush->sendOneNotification(
            Subscription::create(json_decode($sub->data ,true)),
            json_encode($request->input()),
            $req = $request->input(),
        );
        // dd($req);


        // Start Noti Status

            $change = ShopOrder::find($req['body']);
            // dd($change);
            $change->brake_flag = 2;
            $change->save();
            // return back();
            alert()->success('Successfully Ordered');


            $pending_order_details = ShopOrder::findOrFail($change->id);
            // dd($pending_order_details->toArray());
        // dd('Successfully Ordered');
        return view('Customer.success',compact('pending_order_details'));
    }

// Notify End
}


