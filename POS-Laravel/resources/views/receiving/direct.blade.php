@extends('layouts.admin')
@section('content')

@section('title', 'Receiving')
@section('content-header', 'Direct Receiving')
   
    @section('content-actions')
    {{-- <a href="{{route('receiving.direct')}}" class="btn btn-success"><i class="fas fa-plus"></i> rd</a> --}}
    <form class="form-inline my-2 my-lg-0 " type = "GET" action="{{ route('searchbar') }}">
        <input type="search" name="query" id="" class="form-control mr-sm-2" placeholder="Search Product">
        <button class="btn btn-primary " type="submit">Search</button>
    </form>
    {{-- <a href="{{route('receiving.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Create Receving</a> --}}
        {{-- <div class="form-floating">
            <select class="form-select my-2 my-lg-0" id="floatingSelect" aria-label="Floating label select example">
            <option selected></option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
            </select>
            <label for="floatingSelect">Select Suppliers</label>
        </div >    --}}
    @endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
 @endsection 
@section('content')
<div class="card product-list"><!-- Log on to codeastro.com for more projects -->
    <div class="card-body">

        @if(isset($products))
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($products) > 0 ) 
                    @foreach ( $products as $product )
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                        </tr>
                    @endforeach
                @else 
                    <tr><td><h3>DATA NOT FOUND</h3></td></tr>
                @endif
                {{-- @foreach ($orders as $order) --}}
                <tr>
                    {{-- <td>{{$order->id}}</td>
                    <td>{{$order->getCustomerName()}}</td>
                    <td>{{ config('settings.currency_symbol') }} {{$order->formattedTotal()}}</td>
                    <td>{{ config('settings.currency_symbol') }} {{$order->formattedReceivedAmount()}}</td>
                    <td>
                        @if($order->receivedAmount() == 0)
                            <span class="badge badge-danger">Not Paid</span>
                        @elseif($order->receivedAmount() < $order->total())
                            <span class="badge badge-warning">Partial</span>
                        @elseif($order->receivedAmount() == $order->total())
                            <span class="badge badge-success">Paid</span>
                        @elseif($order->receivedAmount() > $order->total())
                            <span class="badge badge-info">Change</span>
                        @endif
                    </td>
                    <td>{{config('settings.currency_symbol')}} {{number_format($order->total() - $order->receivedAmount(), 2)}}</td>
                    <td>{{$order->created_at}}</td>
                    <td><button class="btn btn-primary" ><i class="fas fa-eye"></i></button></td> --}}
                    {{-- <td> <span class="badge badge-warning">Pending</span></td>
                    <td>
                        <button class="btn btn-primary" >Received</button>
                        <button class="btn btn-danger btn-delete">cancel</button>
                        
                        </td> --}}
                </tr>
                {{-- @endforeach --}}

            </tbody>
            <tfoot><!-- Log on to codeastro.com for more projects -->
                <tr>
                    <th></th>
                    <th></th>
                    {{-- <th>{{ config('settings.currency_symbol') }} {{ number_format($total, 2) }}</th>
                    <th>{{ config('settings.currency_symbol') }} {{ number_format($receivedAmount, 2) }}</th> --}}
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
        {{ $products->render()}}
        @endif
    </div>
</div><!-- Log on to codeastro.com for more projects -->

@endsection


@section('js')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.btn-delete', function () {
            $this = $(this);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    $.post($this.data('url'), {_method: 'DELETE', _token: '{{csrf_token()}}'}, function (res) {
                        $this.closest('tr').fadeOut(500, function () {
                            $(this).remove();
                        })
                    })
                }
            })
        })
    })
 
</script>
@endsection
