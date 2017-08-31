@extends('layouts.app')


@section('content')
  <div class="container">

    <div class="row">
    	<div class="col-sm-12">
    		<h4 class="page-title">Print Order</h4>
        <ol class="breadcrumb">
          <li>
            <a href="#">Order</a>
          </li>
          <li>
            <a href="#">Order List</a>
          </li>
          <li class="active">
            Print Order
          </li>
        </ol>
    	</div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <!-- <div class="panel-heading">
                    <h4>Invoice</h4>
                </div> -->
                <div class="panel-body">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-right"><img src="{{ asset('assets/images/logo.png') }}" alt="velonic"></h4>

                        </div>
                        <div class="pull-right">
                            <h4 class="font-16">Daily Report # <br>
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="pull-left m-t-30">
                                <address>
                                    <strong>Taiwan Tea House.</strong><br>
                                    Jl. DR. Cipto Mangunkusumo, No 26<br>
                                    Kesambi, Cirebon 45131<br>
                                    <abbr title="Phone">P:</abbr> (0231) 236-352
                                </address>
                            </div>
                            <div class="pull-right m-t-30">
                                <p><strong>Order Date: </strong> {{ $order->created_at->format('d/m/Y')}} </p>
                                <p class="m-t-10">
                                    <strong>Order Status: </strong> 
                                    <span class="label label-pink">
                                        @if ($order->status == 'or')
                                            Order
                                        @elseif($order->status == 'cm')
                                            Order Confirmed
                                        @elseif($order->status == 'cl')
                                            Order Canceled
                                        @else
                                            Order Delivered
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="m-h-50"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table m-t-30">
                                    <thead>
                                      <tr><th>#</th>
                                          <th>Invoice</th>
                                          <th>Customer</th>
                                          <th>Item</th>
                                          <th>Harga</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->invoice }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>Menu:
                                                <ul>  
                                                    @foreach ($order->orderDetails as $row)
                                                        <li>
                                                          @php
                                                            $item = App\Models\Item::find($row['item_id']);
                                                            echo $item->name . "($item->price)";
                                                            $orderDetailTop = App\Models\OrderDetailTop::where('order_detail_id', $row['id'])->get();
                                                          @endphp
                                                        </li>
                                                        Topping:
                                                        @foreach ($orderDetailTop as $row1)
                                                          @php
                                                            $topping = App\Models\Topping::find($row1['topping_id']);
                                                            echo $topping->name . "($topping->price)";
                                                          @endphp
                                                        @endforeach
                                                    @endforeach  
                                                </ul>
                                            </td>
                                            <td>Rp {{ number_format($order->total_price) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="pull-right col-md-3 offset-md-9">
                            <p class="text-right"><b>Total:</b> Rp {{ number_format($order->total_price) }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

  </div> <!-- container -->
@endsection

@section('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#lfm').filemanager('image');
        });
    </script>

    <script type="text/javascript">
    function createslug()
        {
            var title = $('#title').val();
            $('#slug').val(slugify(title));
        }

        function slugify(text)
        {
            return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')           // Replace spaces with -
                    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                    .replace(/^-+/, '')             // Trim - from start of text
                    .replace(/-+$/, '');            // Trim - from end of text
        }
    </script>

@endsection
