protected function customerStoreShopOrder(Request $request){
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
        $option_lists = json_decode($request->option_lists);
        try {
            $table = Table::where('id', $request->table_id)->first();
// dd($table);
                if (empty($table)) {
                    $order = ShopOrder::create([
                        'table_id' => $request->table_id,
                        'status' => 1,
                        'is_mobile'=> 1,
                        'take_away_flag'=>$take_away,
                        'sale_by' =>$user_name,										// Order Status = 1
                    ]);
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
                        $order = ShopOrder::create([
                            'table_id' => $request->table_id,
                            'status' => 1,
                             'type' => 1,
                             'is_mobile'=> 1,
                             'take_away_flag'=>$take_away,
                             'sale_by' =>$user_name,
                        ]);
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
        // dd($orders->toArray());

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
        // dd($orders->toArray());
        $table_number = 0;


        $total_qty = 0 ;

        $total_price = 0 ;

        foreach ($orders->option as $option) {

            $total_qty += $option->pivot->quantity;

            $total_price += $option->sale_price * $option->pivot->quantity;
        }
        // dd($orders->toArray());

     // dd($order_id);


    // kitchen list modify

     // dd($order_id);
     $table_number = 0;
     $pending_lists = ShopOrder::where('status', 1)->get();
     // dd($pending_lists->toArray());
     $promotion = Promotion::all();
     try {

     $pending_order_details = ShopOrder::findOrFail($orders->id);
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
    //  dd($total_price);
    // kitchen list modify end
    //  dd($notte);

    $option_name = DB::table('option_shop_order')
        ->where('shop_order_id', $orders->id)
        ->get();
    // dd($option_name);
    $name = [];
    // $qty = [];
    foreach ($option_name as $optionss) {
        // dd($optionss->option_id);
        $oname = Option::find($optionss->option_id);
        array_push($name, $oname);
        // array_push($qty,$oname->quantity);
        // $temp['value']=array('key1'=>$oname->id,'key2'=>$oname->name);
    }
    // dd($name);
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
    // dd($name);
    return view('Customer.kitchen_list',compact('take_away','notte','orders','tableno','option_name','real_date','oname','name','alloption','fromadd','tablenoo','pending_order_details','total_price'));
    // return view('Customer.pending_order_details', compact('promotion','pending_lists','pending_order_details','total_qty','total_price','table_number','notte','name','option_name','fromadd'));
    }
