<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderDetailTop;

use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use Validator;
use Illuminate\Support\Collection;
use DB;

class OrderController extends Controller
{
    private $bread;

    /**
     * Data For Breadcrumbs
     */
    public function __construct()
    {
        $this->bread = [
            '0' => route('home'),
            'page-title' => 'Order List',
            'menu' => 'Dashboard',
            'submenu' => 'Order',
            'active' => 'Order List'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrderDelivered(Request $request, Builder $htmlBuilder){
      $bread = $this->bread;
      $orderList = new Collection;
      if ($request->ajax()) {
          $orders = Order::where('status', 'od')->get();

          foreach ($orders as $row) {
              $orderList->push([
                  'id' => $row->id,
                  'invoice' => $row->invoice,
                  'name' => $row->name,
                  'phone' => $row->phone,
                  'status' => $row->getStatus($row->status),
                  'date' => $row->created_at->format('d/m/Y')
              ]);
          }

          
          return Datatables::of($orderList)
              ->addColumn('action', function($data){
                  return view('layouts.partials.datatable._action', [
                      'model' => $data,
                      // 'form_url' => route('order.updateStatus', $data['id']),
                      // 'edit_url' => route('order.edit', $data['id']),
                      'show_url' => route('ordermanager.show', $data['id'])
                  ]);
              })->make(true);
      }



      $html = $htmlBuilder
          ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID'])
          ->addColumn(['data' => 'invoice', 'name' => 'invoice', 'title' => 'Invoice'])
          ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Customer'])
          ->addColumn(['data' => 'phone', 'name' => 'phone', 'title' => 'Phone'])
          ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
          ->addColumn(['data' => 'date', 'name' => 'date', 'title' => 'Date'])
          ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => 'false']);

      return view('pages.order.order_list', compact('bread', 'html'));
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder){
      $bread = $this->bread;
      $orderList = new Collection;
      if ($request->ajax()) {
          $orders = Order::orderBy('id', 'desc')->get();

          foreach ($orders as $row) {
              $orderList->push([
                  'id' => $row->id,
                  'invoice' => $row->invoice,
                  'name' => $row->name,
                  'phone' => $row->phone,
                  'status' => $row->getStatus($row->status)
              ]);
          }

          return Datatables::of($orderList)
              ->addColumn('action', function($data){
                  return view('pages.order._action', [
                      'model' => $data,
                      // 'form_url' => route('order.updateStatus', $data['id']),
                      'edit_url' => route('order.edit', $data['id']),
                      'show_url' => route('order.show', $data['id'])
                  ]);
              })->make(true);
      }



      $html = $htmlBuilder
          ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'ID', 'orderable' => 'desc'])
          ->addColumn(['data' => 'invoice', 'name' => 'invoice', 'title' => 'Invoice'])
          ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Customer'])
          ->addColumn(['data' => 'phone', 'name' => 'phone', 'title' => 'Phone'])
          ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
          ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => 'false']);

      return view('pages.order.order_list', compact('bread', 'html'));
  }

    public function show($id){
      $order = Order::findOrFail($id);
      return view('pages.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bread = $this->bread;
        $bread[0] = route('order.list');
        $orderStatus = ['or' => 'Order', 'cm' => 'Order Confirmed', 'cl' => 'Order Canceled', 'od' => 'Order Delivered'];
        $order = Order::findOrFail($id);
        return view('pages.order.edit', compact('order', 'orderStatus', 'bread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
          'status' => 'required'
      ]);

      $order = Order::findOrFail($id);
      $order->update($request->all());

      notify()->flash('Done!', 'success', [
          'timer' => 1500,
          'text' => 'Order successfully updated',
      ]);

      return redirect()->route('order.list');
    }

    public function checkCustomer(Request $request) {
      $phone = $request->phone;
      $checkOrder = Order::where('phone', $phone)->orderby('id', 'desc')->first();
      if ($checkOrder) {
        $customer = [
          'name' => $checkOrder->name,
          'phone' => $checkOrder->phone,
          'address' => $checkOrder->address
        ];

        return $data = [
          'status' => 200,
          'message' => 'Data Available',
          'data' => $customer
        ];
      } else {
        $customer = [
          'name' => '',
          'phone' => $phone,
          'address' => ''
        ];

        return $data = [
          'status' => 404,
          'message' => 'Data Not Found. Create new',
          'data' => $customer
        ];
      }
    }

    public function postOrder(Request $request){
    	$order = $request->get('order');
    	$order_detail = $request->get('order_detail');


    	$insertOrder = Order::create($order);

    	foreach ($order_detail as $data) {
    		$OrderDetail = [
    			'order_id' => $insertOrder->id,
    			'item_id' => $data['item'],
    		];

    		$insertOrderDetail = OrderDetail::create($OrderDetail);

    		foreach ($data['order_detail_top'] as $row) {
    			$OrderDetailTop = [
    				'order_detail_id' => $insertOrderDetail['id'],
    				'topping_id' => $row['topping_id']
    			];

    			$insertOrderDetailTopping = OrderDetailTop::create($OrderDetailTop);
    		}
    	}

    	return $data = [
          'code' => 200,
          'message' => 'Success order',
      ];
    }

    public function postOrderDate(Request $request){
      $date['start'] = $request->start;
      $date['end'] = $request->end;

      $order = Order::where('status', 'od')
              ->whereBetween('created_at', [$date['start'], $date['end']])
              ->get();

      $orderData = [];
      $test = [];
      $total = 0;
      foreach ($order as $row) {
        $orderData[] = [
          'id' => $row->id,
          'invoice' => $row->invoice,
          'name' => $row->name,
          'orderdetail' => $order_detail = OrderDetail::where('order_id', $row->id)->get(),
          'total_price' => $row->total_price
        ];
        $total += $row->total_price;
      }



      // return $orderData;
      return view('pages.order.order_report', compact('orderData', 'date', 'total'));
    }

    public function getNewOrder(){
      return Order::where('status', 'or')->count();
    }
}
