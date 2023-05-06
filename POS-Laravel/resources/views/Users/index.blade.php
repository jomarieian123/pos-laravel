@extends('layouts.admin')

@section('title', 'Update User')
@section('content-header', 'Update User')

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
<div class="card product-list">
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
            
            @foreach($data as $datas)
            <tr>
                <td>{{ $datas->first_name }}</td>
                <td>{{ $datas->last_name }}</td>
                <td>{{ $datas->email }}</td>    
                <td>
                    <span class="right badge badge-{{ $datas->status ? 'success' : 'danger' }}">{{$datas->status ? 'Active' : 'Inactive'}}</span>
                </td>
                <td>
                    <a href="{{ route('user-setup.edit', $datas->id) }}" class="btn btn-primary">
                        <i  class="fas fa-edit"></i></a>
                    
                        <button class="btn btn-danger btn-delete" data-url="{{route('user-setup.destroy', $datas)}}"><i
                         class="fas fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->render()}}
    {{-- <button data-url="{{route('user-setup.show',$data)}}">click</button> --}}
    {{-- {{ $data->simplePaginate()}} --}}
    </div>
</div>
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

