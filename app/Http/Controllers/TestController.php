<?php

namespace App\Http\Controllers;

use DateTime;
use App\Table;
use App\Option;
use App\Promotion;
use App\ShopOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Validation\Validator;

class TestController extends Controller
{
    protected function customerAddMoreItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'option_lists' => 'required',
        ]);
        if ($validator->fails()) {
            alert()->error('Something Wrong! Validation Error.');
            return redirect()->back();
        }
        try {
            $shop_order = ShopOrder::findOrFail($request->order_id);
        } catch (\Exception $e) {
            alert()->error('Something Wrong! Shop Order Cannot be Found.');
            return redirect()->back();
        }
        $option_lists = json_decode($request->option_lists);
        if ($shop_order->status == 1) {
            foreach ($option_lists as $option) {
                $test = $shop_order->option()->where('option_id', $option->id)->first();
                if (empty($test)) {
                    $shop_order->option()->attach($option->id, ['quantity' => $option->order_qty, 'tocook' => 1, 'note' => "Note Default", 'status' => 0]);
                } else {
                    $update_qty = $option->order_qty + $test->pivot->quantity;
                    $shop_order->option()->updateExistingPivot($option->id, ['quantity' => $update_qty, 'tocook' => 1, 'add_same_item_status' => 1, 'old_quantity' => $test->pivot->quantity, 'new_quantity' => $option->order_qty, 'status' => 5]);
                }
            }
            $shop_order->type = 1;
            $shop_order->save();
            alert()->success('Successfully Added');
            $orders = ShopOrder::find($request->order_id);
            $tableno = Table::find($orders->table_id);
            $alloption = Option::all();
            $option_name = DB::table('option_shop_order')
                ->where('shop_order_id', $orders->id)
                ->where('tocook', 1)
                ->get();
            $name = [];
            foreach ($option_name as $optionss) {
                $oname = Option::find($optionss->option_id);
                array_push($name, $oname);
            }
            $take_away = $request->take_away;
            $fromadd = 1;
            $tablenoo = 0;
            $date = new DateTime('Asia/Yangon');
            $real_date = $date->format('d-m-Y h:i:s');
            $code_lists = json_decode($request->code_lists);
            $notte = [];
            if ($code_lists != null) {
                foreach ($code_lists as $code) {
                    $remark_note = DB::table('option_shop_order')
                        ->where('option_id', $code->id)
                        ->update(['note' => $code->remark]);
                    $note_remark = DB::table('option_shop_order')
                        ->where('option_id', $code->id)
                        ->first();
                    array_push($notte, $note_remark);
                }
            }
            $table_number = 0;
            $pending_lists = ShopOrder::where('status', 1)->get();
            $promotion = Promotion::all();
            try {
                $pending_order_details = ShopOrder::findOrFail($orders->id);
            } catch (\Exception $e) {

                alert()->error("Pending Order Not Found!")->persistent("Close!");

                return redirect()->back();
            }
            $total_qty = 0;

            $total_price = 0;

            foreach ($pending_order_details->option as $option) {

                $total_qty += $option->pivot->quantity;

                $total_price += $option->sale_price * $option->pivot->quantity;
            }
            $option_name = DB::table('option_shop_order')
                ->where('shop_order_id', $orders->id)
                ->get();
            $name = [];
            foreach ($option_name as $optionss) {
                $oname = Option::find($optionss->option_id);
                array_push($name, $oname);
            }
            $notte = [];
            if ($code_lists != null) {
                foreach ($code_lists as $code) {
                    $remark_note = DB::table('option_shop_order')
                        ->where('option_id', $code->id)
                        ->update(['note' => $code->remark]);
                    $note_remark = DB::table('option_shop_order')
                        ->where('option_id', $code->id)
                        ->first();
                    array_push($notte, $note_remark);
                }
            }
            return view('Customer.kitchen_list', compact('promotion', 'pending_lists', 'pending_order_details', 'total_qty', 'total_price', 'table_number', 'notte', 'name', 'option_name', 'fromadd', 'real_date', 'tableno', 'tablenoo', 'take_away', 'orders'));
            alert()->error('Something Wrong! Shop Order is colsed.');
            return redirect()->back();
        }
    }

    protected function customerStoreShopOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'table_id' => 'required',
            'option_lists' => 'required',
        ]);
        if ($validator->fails()) {

            alert()->error('Something Wrong! Validation Error.');

            return redirect()->back();
        }
        $user_name =  'mg mg';
        $take_away = $request->take_away;
        try {
            $table = Table::where('id', $request->table_id)->first();
            if (empty($table)) {
                $order = ShopOrder::create([
                    'table_id' => $request->table_id,
                    'status' => 1,
                    'is_mobile' => 1,
                    'take_away_flag' => $take_away,
                    'sale_by' => $user_name,                                        // Order Status = 1
                ]);
                $order->order_number = "ORD-" . sprintf("%04s", $order->id);
                $order->save();
                $option_lists = json_decode($request->option_lists);
                    foreach ($option_lists as $option) {
                        $order->option()->attach($option->id, ['quantity' => $option->order_qty, 'note' => null, 'status' => 7]);
                    }
                } else {
                    if ($table->status == 2) {
                        alert()->error('Something Wrong! Table is not available.');
                        return redirect()->back();
                    } else {
                        $table->status = 2;
                        $table->save();
                        $order = ShopOrder::create([
                            'table_id' => $request->table_id,
                            'status' => 1,
                            'type' => 1,
                            'is_mobile' => 1,
                            'take_away_flag' => $take_away,
                            'sale_by' => $user_name,
                        ]);
                        $order->order_number = "ORD-" . sprintf("%04s", $order->id);

                        $order->save();
                        $option_lists = json_decode($request->option_lists);
                        foreach ($option_lists as $option) {

                            $order->option()->attach($option->id, ['quantity' => $option->order_qty, 'note' => null, 'status' => 7]);
                        }
                    }
            }
        }catch (Exception $e) {
            alert()->error("Something Wrong! When Store Shop Order");
            return redirect()->back();
        }
        alert()->success('Successfully Store Shop Order');
        $orders = ShopOrder::find($order->id);
        $tableno = Table::find($orders->table_id);
        $alloption = Option::all();
        $option_name = DB::table('option_shop_order')
            ->where('shop_order_id', $orders->id)
            ->get();
        $name = [];
        foreach ($option_name as $optionss) {
            $oname = Option::find($optionss->option_id);
            array_push($name, $oname);
        }
        $fromadd = 0;
        $tablenoo = 0;
        $date = new DateTime('Asia/Yangon');

        $real_date = $date->format('d-m-Y h:i:s');
        $code_lists = json_decode($request->code_lists);
        $notte = [];
        if ($code_lists != null) {
            foreach ($code_lists as $code) {
                $remark_note = DB::table('option_shop_order')
                    ->where('option_id', $code->id)
                    ->update(['note' => $code->remark]);
                $note_remark = DB::table('option_shop_order')
                    ->where('option_id', $code->id)
                    ->first();
                array_push($notte, $note_remark);
            }
        }
        $table_number = 0;


        $total_qty = 0;

        $total_price = 0;

        foreach ($orders->option as $option) {

            $total_qty += $option->pivot->quantity;

            $total_price += $option->sale_price * $option->pivot->quantity;
        }
        try {

            $pending_order_details = ShopOrder::findOrFail($orders->id);
        } catch (\Exception $e) {

            alert()->error("Pending Order Not Found!")->persistent("Close!");

            return redirect()->back();
        }
        return view('Customer.kitchen_list', compact('take_away', 'notte', 'orders', 'tableno', 'option_name', 'real_date', 'oname', 'name', 'alloption', 'fromadd', 'tablenoo', 'pending_order_details', 'total_price'));
    }

    protected function customerStoreShopOrder(Request $request)
        {
            $user_name =  'mg mg';
            $take_away = $request->take_away;
            try {
                $table = Table::where('id', $request->table_id)->first();
                if (empty($table)) {
                    $order = ShopOrder::create([
                        'table_id' => $request->table_id,
                        'status' => 1,
                        'is_mobile' => 1,
                        'take_away_flag' => $take_away,
                        'sale_by' => $user_name,                                        // Order Status = 1
                    ]);
                    $order->order_number = "ORD-" . sprintf("%04s", $order->id);
                    $order->save();
                    $option_lists = json_decode($request->option_lists);
                        foreach ($option_lists as $option) {
                            $order->option()->attach($option->id, ['quantity' => $option->order_qty, 'note' => null, 'status' => 7]);
                        }
                    } else {
                        if ($table->status == 2) {
                            alert()->error('Something Wrong! Table is not available.');
                            return redirect()->back();
                        } else {
                            $table->status = 2;
                            $table->save();
                            $order = ShopOrder::create([
                                'table_id' => $request->table_id,
                                'status' => 1,
                                'type' => 1,
                                'is_mobile' => 1,
                                'take_away_flag' => $take_away,
                                'sale_by' => $user_name,
                            ]);
                            $order->order_number = "ORD-" . sprintf("%04s", $order->id);

                            $order->save();
                            $option_lists = json_decode($request->option_lists);
                            foreach ($option_lists as $option) {

                                $order->option()->attach($option->id, ['quantity' => $option->order_qty, 'note' => null, 'status' => 7]);
                            }
                        }
                }
            }catch (Exception $e) {
                alert()->error("Something Wrong! When Store Shop Order");
                return redirect()->back();
            }
            alert()->success('Successfully Store Shop Order');
            $orders = ShopOrder::find($order->id);
            $tableno = Table::find($orders->table_id);
            $alloption = Option::all();
            $option_name = DB::table('option_shop_order')
                ->where('shop_order_id', $orders->id)
                ->get();
            $name = [];
            foreach ($option_name as $optionss) {
                $oname = Option::find($optionss->option_id);
                array_push($name, $oname);
            }
            $fromadd = 0;
            $tablenoo = 0;
            $date = new DateTime('Asia/Yangon');

            $real_date = $date->format('d-m-Y h:i:s');
            $code_lists = json_decode($request->code_lists);
            $notte = [];
            if ($code_lists != null) {
                foreach ($code_lists as $code) {
                    $remark_note = DB::table('option_shop_order')
                        ->where('option_id', $code->id)
                        ->update(['note' => $code->remark]);
                    $note_remark = DB::table('option_shop_order')
                        ->where('option_id', $code->id)
                        ->first();
                    array_push($notte, $note_remark);
                }
            }
            $table_number = 0;


            $total_qty = 0;

            $total_price = 0;

            foreach ($orders->option as $option) {

                $total_qty += $option->pivot->quantity;

                $total_price += $option->sale_price * $option->pivot->quantity;
            }
            try {

                $pending_order_details = ShopOrder::findOrFail($orders->id);
            } catch (\Exception $e) {

                alert()->error("Pending Order Not Found!")->persistent("Close!");

                return redirect()->back();
            }
            return view('Customer.kitchen_list', compact('take_away', 'notte', 'orders', 'tableno', 'option_name', 'real_date', 'oname', 'name', 'alloption', 'fromadd', 'tablenoo', 'pending_order_details', 'total_price'));
        }
    }
}


