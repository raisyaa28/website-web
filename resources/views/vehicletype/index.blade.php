@extends('be.master')
@section('menu')
    @include('be.menu')
@endsection
@section('main')
<!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{$title}}</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">{{$title}}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

          <div class="collapse navbar-collapse mt-sm-0 mt-2" id="navbar">

    <div class="ms-md-auto d-flex align-items-center">

        <div class="input-group me-3" style="width:250px;">
            <span class="input-group-text text-body">
                <i class="fas fa-search"></i>
            </span>
            <input type="text" class="form-control" placeholder="Type here...">
        </div>

        <a href="{{ route('vehicletype.create') }}"
           class="btn bg-gradient-primary mb-0 me-3">
            <i class="fas fa-plus"></i>
            ADD NEW VEHICLE TYPE
        </a>

    </div>

    <ul class="navbar-nav justify-content-end">
        <li class="nav-item d-flex align-items-center">
            <a href="#" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-1"></i>
                <span>Sign Out</span>
            </a>
        </li>
    </ul>

</div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      @include('vehicletype.table')
      <form action="" method="post" id="frm">
        @csrf
        @method('DELETE')
      </form>
      </div>

      <script>
        let frm = document.getElementById('frm');

        function hapus(event, element){
          event.preventDefault();
          const id = element.getAttribute('data-id');
          swal({
            title: "Are you sure?",
            text: "You Will Not Be Able To Recover This Data!",
            type: "warning",
            ShowCancelButton: true,
            ConfirmButtonClass: "btn-danger",
            ConfirmButtonText: "Yes, delete it!",
            CloseOnConfirm: true,
          },
          function() {
            frm.setAttribute('action',element.getAttribute('href'));
            frm.submit();
        });
        }

        @if (session('success'))
            Swal("Success!", '{{ session('success') }}', 'success');
        @endif
      </script>
@endsection