@if($fromadd == 0)
    @foreach($name as $opname)
        @foreach($option_name as $optqty)
            @if($optqty->tocook == 0)
                @if($opname->id == $optqty->option_id)
                    @if ($opname->menu_item->cuisine_type_id == 1)
                        {{-- <tr>
                            <td class="font-weight-bold">(Salad)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                            <td>{{$total_price}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                        <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 2)
                        {{-- <tr>
                            <td class="font-weight-bold">(Breakfast)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 3)
                        {{-- <tr>
                            <td class="font-weight-bold">(Healthy Food)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 4)
                        {{-- <tr>
                            <td class="font-weight-bold">(Main)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 5)
                    {{-- <tr>
                        <td class="font-weight-bold">(Snacks)</td>
                        <td class="font-weight-bold">{{$opname->name}}</td>
                        <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                        <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                        <td>{{$optqty->note}}</td>
                    </tr> --}}
                    @foreach ($notte as $notes)
                        @if ($notes->option_id == $opname->id)
                            <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                            </tr>
                        @endif
                    @endforeach
                    @endif
                @endif
            @endif
        @endforeach
    @endforeach
@endif


@if($fromadd == 1)
    @foreach($name as $opname)
        @foreach($option_name as $optqty)
            @if($optqty->tocook == 1)
                @if($opname->id == $optqty->option_id)
                    @if ($opname->menu_item->cuisine_type_id == 1)
                        {{-- <tr>
                            <td class="font-weight-bold">(Salad)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 2)
                        {{-- <tr>
                            <td class="font-weight-bold">(Breakfast)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 3)
                        {{-- <tr>
                            <td class="font-weight-bold">(Healthy Food)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 4)
                                {{-- <tr>
                                    <td class="font-weight-bold">(Main)</td>
                                    <td class="font-weight-bold">{{$opname->name}}</td>
                                    <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                                    <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                                    <td>{{$optqty->note}}</td>
                                </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 5)
                                {{-- <tr>
                                    <td class="font-weight-bold">(Snacks)</td>
                                    <td class="font-weight-bold">{{$opname->name}}</td>
                                    <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                                    <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                                    <td>{{$optqty->note}}</td>
                                </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endif
            @endif
        @endforeach
    @endforeach
@endif


@if($fromadd == 3)
    @foreach($name as $opname)
        @foreach($option_name as $optqty)
            @if($optqty->tocook == 0)
                @if($opname->id == $optqty->option_id)
                    @if ($opname->menu_item->cuisine_type_id == 1)
                        {{-- <tr>
                            <td class="font-weight-bold">(Salad)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 2)
                        {{-- <tr>
                            <td class="font-weight-bold">(Breakfast)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 3)
                        {{-- <tr>
                            <td class="font-weight-bold">(Healthy Food)</td>
                            <td class="font-weight-bold"> {{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 4)
                                {{-- <tr>
                                    <td class="font-weight-bold">(Main)</td>
                                    <td class="font-weight-bold">{{$opname->name}}</td>
                                    <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                                    <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                                    <td>{{$optqty->note}}</td>
                                </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 5)
                                {{-- <tr>
                                    <td class="font-weight-bold">(Snacks)</td>
                                    <td class="font-weight-bold">{{$opname->name}}</td>
                                    <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                                    <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                                    <td>{{$optqty->note}}</td>
                                </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endif
            @endif
        @endforeach
    @endforeach
@endif



@if ($pending_order_details->status == 1)
{{-- Start Fromadd --}}
@if($fromadd == 0)
    @foreach($name as $opname)
        @foreach($option_name as $optqty)
            @if($optqty->tocook == 0)
                @if($opname->id == $optqty->option_id)
                    @if ($opname->menu_item->cuisine_type_id == 1)
                        {{-- <tr>
                            <td class="font-weight-bold">(Salad)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                            <td>{{$total_price}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                        <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 2)
                        {{-- <tr>
                            <td class="font-weight-bold">(Breakfast)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 3)
                        {{-- <tr>
                            <td class="font-weight-bold">(Healthy Food)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 4)
                        {{-- <tr>
                            <td class="font-weight-bold">(Main)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 5)
                    {{-- <tr>
                       Shop-Order-Voucher/2494<td class="font-weight-bold">(Snacks)</td>
                        <td class="font-weight-bold">{{$opname->name}}</td>
                        <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                        <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                        <td>{{$optqty->note}}</td>
                    </tr> --}}
                    @foreach ($notte as $notes)
                        @if ($notes->option_id == $opname->id)
                            <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                            </tr>
                        @endif
                    @endforeach
                    @endif
                </tbody>
                @endif
            @endif
        @endforeach
    @endforeach
@endif

@if($fromadd == 1)
    @foreach($name as $opname)
        @foreach($option_name as $optqty)
            @if($optqty->tocook == 1)
                @if($opname->id == $optqty->option_id)
                    @if ($opname->menu_item->cuisine_type_id == 1)
                        {{-- <tr>
                            <td class="font-weight-bold">(Salad)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 2)
                        {{-- <tr>
                            <td class="font-weight-bold">(Breakfast)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 3)
                        {{-- <tr>
                            <td class="font-weight-bold">(Healthy Food)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 4)
                                {{-- <tr>
                                    <td class="font-weight-bold">(Main)</td>
                                    <td class="font-weight-bold">{{$opname->name}}</td>
                                    <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                                    <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                                    <td>{{$optqty->note}}</td>
                                </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 5)
                                {{-- <tr>
                                    <td class="font-weight-bold">(Snacks)</td>
                                    <td class="font-weight-bold">{{$opname->name}}</td>
                                    <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                                    <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                                    <td>{{$optqty->note}}</td>
                                </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
                @endif
            @endif
        @endforeach
    @endforeach
@endif

@if($fromadd == 3)
    @foreach($name as $opname)
        @foreach($option_name as $optqty)
            @if($optqty->tocook == 0)
                @if($opname->id == $optqty->option_id)
                    @if ($opname->menu_item->cuisine_type_id == 1)
                        {{-- <tr>
                            <td class="font-weight-bold">(Salad)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 2)
                        {{-- <tr>
                            <td class="font-weight-bold">(Breakfast)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 3)
                        {{-- <tr>
                            <td class="font-weight-bold">(Healthy Food)</td>
                            <td class="font-weight-bold"> {{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            <td>{{$optqty->note}}</td>
                        </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 4)
                                {{-- <tr>
                                    <td class="font-weight-bold">(Main)</td>
                                    <td class="font-weight-bold">{{$opname->name}}</td>
                                    <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                                    <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                                    <td>{{$optqty->note}}</td>
                                </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 5)
                                {{-- <tr>
                                    <td class="font-weight-bold">(Snacks)</td>
                                    <td class="font-weight-bold">{{$opname->name}}</td>
                                    <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                                    <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                                    <td>{{$optqty->note}}</td>
                                </tr> --}}
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
                @endif
            @endif
        @endforeach
    @endforeach
@endif
{{-- End Fromadd --}}
@endif



@if($fromadd == 0)
    @foreach($name as $opname)
        @foreach($option_name as $optqty)
            @if($optqty->tocook == 0)
                @if($opname->id == $optqty->option_id)
                    @if ($opname->menu_item->cuisine_type_id == 1)
                        <tr>
                            <td class="font-weight-bold">(Salad)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            {{-- <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td> --}}
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            {{-- <td>{{$optqty->note}}</td> --}}
                            <td>{{$total_price}}</td>
                        </tr>
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 2)
                        <tr>
                            <td class="font-weight-bold">(Breakfast)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            {{-- <td>{{$optqty->note}}</td> --}}
                        </tr>
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 3)
                        <tr>
                            <td class="font-weight-bold">(Healthy Food)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            {{-- <td>{{$optqty->note}}</td> --}}
                        </tr>
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 4)
                        <tr>
                            <td class="font-weight-bold">(Main)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            {{-- <td>{{$optqty->note}}</td> --}}
                        </tr>
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 5)
                        <tr>
                            <td class="font-weight-bold">(Snacks)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            {{-- <td>{{$optqty->note}}</td> --}}
                        </tr>
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
            </tbody>
                @endif
            @endif
        @endforeach
    @endforeach
@endif

@if($fromadd == 1)
    @foreach($name as $opname)
        @foreach($option_name as $optqty)
            @if($optqty->tocook == 1)
                @if($opname->id == $optqty->option_id)
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 2)
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                    <th class="text-danger font-weight-bold">Notes</th>
                                    <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 3)
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 4)
                    @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 5)
                    @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endif
            @endif
        @endforeach
    @endforeach
@endif



@if($fromadd == 0)
    @foreach ($pending_order_details->option as $option)
        <tr>
            <td>
                <p
                style="width: 90px;white-space: nowrap;overflow: hidden;text-overflow: clip;">
                {{ $option->menu_item->item_name }}</p>
            </td>
            {{-- <td>{{$option->name}}</td> --}}
            <td>{{ $option->pivot->quantity }}</td>
            {{-- <td>{{$option->sale_price}}</td> --}}
            <td><?= $option->pivot->quantity * $option->sale_price ?></td>
            {{-- @if ($option->pivot->status == 0)
            <td>
        <span class="badge-pill badge-warning">Pending</span>
    </td>
    @elseif($option->pivot->status == 1)
    <td>
        <span class="badge-pill badge-danger">Cooking</span>
    </td>
    @else
    <td>
        <span class="badge-pill badge-success">Finished</span>
    </td>
    @endif --}}
        <td>
            {{-- <a href="{{ route('customercanceldetail', ['order_id' => $pending_order_details->id, 'option_id' => $option->id]) }}">
                <span class="badge-pill badge-danger">-</span>
            <a> --}}
            @if ($pending_order_details->status == 1)
            <a href="{{route('customercanceldetail', ['order_id' => $pending_order_details->id, 'option_id' => $option->id])}}"><span class="badge-pill badge-danger">-</span></a></td>
            @endif
        </td>
    </tr>
    @endforeach
    @foreach($name as $opname)
        @foreach($option_name as $optqty)
            @if($optqty->tocook == 0)
                @if($opname->id == $optqty->option_id)
                @if ($opname->menu_item->cuisine_type_id == 1)
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 2)
                        <tr>
                            <td class="font-weight-bold">(Breakfast)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            {{-- <td>{{$optqty->note}}</td> --}}
                        </tr>
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 3)
                        <tr>
                            <td class="font-weight-bold">(Healthy Food)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            {{-- <td>{{$optqty->note}}</td> --}}
                        </tr>
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 4)
                        <tr>
                            <td class="font-weight-bold">(Main)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            {{-- <td>{{$optqty->note}}</td> --}}
                        </tr>
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @elseif ($opname->menu_item->cuisine_type_id == 5)
                        <tr>
                            <td class="font-weight-bold">(Snacks)</td>
                            <td class="font-weight-bold">{{$opname->name}}</td>
                            <td class="font-weight-bold">{{$opname->menu_item->item_name}}</td>
                            <td class="font-weight-bold">{{$optqty->quantity -$optqty->old_quantity}}</td>
                            {{-- <td>{{$optqty->note}}</td> --}}
                        </tr>
                        @foreach ($notte as $notes)
                            @if ($notes->option_id == $opname->id)
                                <tr>
                                <th class="text-danger font-weight-bold">Notes</th>
                                <td class="text-danger" colspan="3">{{$notes->note}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
            </tbody>
                @endif
            @endif
        @endforeach
    @endforeach
@endif

@if($fromadd == 1)
@foreach ($pending_order_details->option as $option)
<tr>

    <td>
        <p
            style="width: 90px;white-space: nowrap;overflow: hidden;text-overflow: clip;">
            {{ $option->menu_item->item_name }}</p>
    </td>
    {{-- <td>{{$option->name}}</td> --}}
    <td>{{ $option->pivot->quantity }}</td>
    {{-- <td>{{$option->sale_price}}</td> --}}
    <td><?= $option->pivot->quantity * $option->sale_price ?></td>
    {{-- @if ($option->pivot->status == 0)
<td>
    <span class="badge-pill badge-warning">Pending</span>
</td>
@elseif($option->pivot->status == 1)
<td>
    <span class="badge-pill badge-danger">Cooking</span>
</td>
@else
<td>
    <span class="badge-pill badge-success">Finished</span>
</td>
@endif --}}
    <td>
        {{-- <a href="{{ route('customercanceldetail', ['order_id' => $pending_order_details->id, 'option_id' => $option->id]) }}">
            <span class="badge-pill badge-danger">-</span>
        <a> --}}
        @if ($pending_order_details->status == 1)
        <a href="{{route('customercanceldetail', ['order_id' => $pending_order_details->id, 'option_id' => $option->id])}}"><span class="badge-pill badge-danger">-</span></a></td>
        @endif
    </td>
</tr>
@endforeach
    @foreach($name as $opname)
   @foreach($option_name as $optqty)
    @if($optqty->tocook == 1)
    @if($opname->id == $optqty->option_id)
    @if ($opname->menu_item->cuisine_type_id == 1)

    @foreach ($notte as $notes)
        @if ($notes->option_id == $opname->id)
            <tr>
            <th class="text-danger font-weight-bold">Notes</th>
            <td class="text-danger" colspan="3">{{$notes->note}}</td>
            </tr>
        @endif
    @endforeach

    @elseif ($opname->menu_item->cuisine_type_id == 2)
    @foreach ($notte as $notes)
        @if ($notes->option_id == $opname->id)
            <tr>
            <th class="text-danger font-weight-bold">Notes</th>
            <td class="text-danger" colspan="3">{{$notes->note}}</td>
            </tr>
        @endif
    @endforeach

    @elseif ($opname->menu_item->cuisine_type_id == 3)
    </tr>
    @foreach ($notte as $notes)
        @if ($notes->option_id == $opname->id)
            <tr>
            <th class="text-danger font-weight-bold">Notes</th>
            <td class="text-danger" colspan="3">{{$notes->note}}</td>
            </tr>
        @endif
    @endforeach

    @elseif ($opname->menu_item->cuisine_type_id == 4)
    </tr>
    @foreach ($notte as $notes)
        @if ($notes->option_id == $opname->id)
            <tr>
            <th class="text-danger font-weight-bold">Notes</th>
            <td class="text-danger" colspan="3">{{$notes->note}}</td>
            </tr>
        @endif
    @endforeach

    @elseif ($opname->menu_item->cuisine_type_id == 5)
    </tr>
    @foreach ($notte as $notes)
        @if ($notes->option_id == $opname->id)
            <tr>
            <th class="text-danger font-weight-bold">Notes</th>
            <td class="text-danger" colspan="3">{{$notes->note}}</td>
            </tr>
        @endif
    @endforeach

    @endif
    @endif
    @endif
    @endforeach
    @endforeach
   @endif
{{-- Fromadd Session End --}}

@endif

<a type="button" class="btn"  aria-label="Close" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-xmark"></i></a>
