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
                            <h4 class="font-16">Delivery Report<br>
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
                                <p><strong>Order Date: </strong> {{ $date['start'] }} to {{ $date['end'] }}</p>
                                <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Delivered</span></p>
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
                                      @foreach ($orderData as $data)
                                        <tr>
                                            <td>{{ $data['id'] }}</td>
                                            <td>{{ $data['invoice'] }}</td>
                                            <td>{{ $data['name'] }}</td>
                                            <td>Menu:
                                                <ul>
                                                  @foreach ($data['orderdetail'] as $row)

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
                                            <td>Rp {{ number_format($data['total_price']) }}</td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="pull-right col-md-3 offset-md-9">
                            <p class="text-right"><b>Total:</b> Rp {{ number_format($total) }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="hidden-print">
                        <div class="text-right">
                            <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
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
