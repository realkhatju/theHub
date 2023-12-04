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
