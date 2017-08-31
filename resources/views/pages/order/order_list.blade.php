@extends('layouts.app')


@section('styles')
  <link href="{{ asset('assets/plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">

  <!-- DataTables CSS -->
  <link href="{{ asset('assets/plugins/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="{{ asset('assets/plugins/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">
@endsection


@section('content')
    <div class="container">

        @include('layouts.partials._bread', ['data' => empty($bread) ? '' : $bread])

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card-box table-responsive">
                    @if (Auth::user()->role == 'manager')
                      <form action="{{ route('order.date')}}" method="post">
                          <div class="form-group">
                              <label>Print Report</label>
                              <div>
                                  <div class="input-daterange input-group" id="date-range">
                                      <input type="text" class="form-control" name="start">
                                      <span class="input-group-addon bg-custom text-white b-0">to</span>
                                      <input type="text" class="form-control" name="end">
                                  </div>
                              </div>
                          </div>
                          <div class="form-group text-right m-b-0">
                              <button class="btn btn-primary waves-effect waves-light" type="submit">
                                  Submit
                              </button>
                          </div>

                      </form>
                    @endif
                    <h4 class="m-t-0 header-title"><b>Orders</b></h4>
                    {!! $html->table(['class'=>'table table-striped table-bordered', "id"=>"datatable"]) !!}
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
@endsection

@section('scripts')
  <!-- DataTables JavaScript -->
  <script src="{{ asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-responsive/dataTables.responsive.js') }}"></script>

  <script src="{{ asset('assets/plugins/moment/moment.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

  {{-- <!-- Include Date Range Picker -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" /> --}}

  {!! $html->scripts() !!}

  <script type="text/javascript">
  $(function() {
    jQuery('#date-range').datepicker({
        toggleActive: true,
        format: "yyyy-mm-dd",
    });
  });
</script>
@endsection
