@extends('backend.layouts.master')
@section('title','Merchant Overview')
@section('main-content')

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Merchant Overview - {{ $brand->name }} ({{ $brand->title }})</h6>
    <a href="{{ route('brand.index') }}" class="btn btn-secondary btn-sm float-right">
      <i class="fas fa-arrow-left"></i> Back
    </a>
  </div>

  <div class="card-body">
    <div class="row mb-4 text-center">
      <div class="col-md-3">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <h6>Total Orders</h6>
            <h4>{{ $totalOrders }}</h4>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <h6>Orders This Month</h6>
            <h4>{{ $monthlyOrders }}</h4>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <h6>Total Sales</h6>
            <h4>₹{{ number_format($totalSales,2) }}</h4>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <h6>Sales This Month</h6>
            <h4>₹{{ number_format($monthlySales,2) }}</h4>
          </div>
        </div>
      </div>
    </div>

    <h5 class="mb-3">All Orders</h5>
    <div class="table-responsive">
      <table class="table table-bordered" id="order-dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Order No</th>
            <th>Customer</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Payment</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr>
            <td>{{ $order->order_number }}</td>
            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
            <td>₹{{ number_format($order->total_amount, 2) }}</td>
            <td>
              <span class="badge badge-{{ $order->status == 'delivered' ? 'success' : 'warning' }}">
                {{ ucfirst($order->status) }}
              </span>
            </td>
            <td>{{ ucfirst($order->payment_status) }}</td>
            <td>{{ $order->created_at->format('d M Y') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
  $('#order-dataTable').DataTable();
</script>
@endpush