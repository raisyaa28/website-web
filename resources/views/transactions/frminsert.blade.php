<div class="card shadow-sm border-0">
    <div class="card-header pb-0 bg-transparent border-0 px-4 pt-4 d-flex align-items-center justify-content-between">
        <h6 class="mb-0">
            <span class="text-gradient text-primary">Transaction</span> Input Form
        </h6>

        <button type="submit"
            form="frm"
            class="btn bg-gradient-dark btn-sm mb-0 px-4"
            id="btnSubmitTransaction">
            <i class="fas fa-plus me-1"></i>
            ENTER VEHICLE
        </button>
    </div>

    <div class="card-body px-4 pt-3 pb-4">

        <form action="{{ route('transactions.store') }}" method="POST" id="frm">
            @csrf

            {{-- Location dan Vehicle Type yang dipilih --}}
            <input type="hidden" name="id_lokasi" value="{{ $selectedLocationId }}">
            <input type="hidden" name="id_jenis" value="{{ $selectedVehicleTypeId }}">

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label text-xs font-weight-bolder">
                        Ticket Number
                    </label>

                    <input type="text"
                        class="form-control form-control-lg"
                        name="no_tiket"
                        id="no_tiket"
                        value="TKT-{{ date('YmdHis') }}"
                        readonly>

                    @error('no_tiket')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label text-xs font-weight-bolder">
                        Police Number
                    </label>

                    <input type="text"
                        class="form-control form-control-lg"
                        name="no_polisi"
                        id="no_polisi"
                        value="{{ old('no_polisi') }}"
                        placeholder="B 1234 ABC">

                    @error('no_polisi')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
        </form>

    </div>
</div>

<script>
document.getElementById('frm').addEventListener('submit', function(e){

    const polisi = document.getElementById('no_polisi');

    if(polisi.value.trim() === ''){
        e.preventDefault();

        swal(
            'Error!',
            'Police Number cannot be empty!',
            'error'
        );

        polisi.focus();
        return false;
    }

});
</script>