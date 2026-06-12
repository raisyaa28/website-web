<div class="col-12">
  <div class="card shadow-sm border-0">
    <div class="card-header pb-0 bg-transparent border-0 px-4 pt-4">
      <h6 class="mb-0"><span class="text-gradient text-primary">Vehicle Type</span> Input Form</h6>
    </div>

    <div class="card-body px-4 pt-3 pb-4">
      <form action="{{ route('vehicletype.store') }}" method="POST" id="frm">
        @csrf

        <div class="mb-3">
          <label for="jenis" class="form-label text-xs font-weight-bolder">Vehicle Type</label>
          <input type="text" class="form-control" id="jenis" name="jenis" value="{{ old('jenis') }}" placeholder="Motorcycle / Car / Other">
        </div>

        <div class="mb-3">
          <label for="perjam_pertama" class="form-label text-xs font-weight-bolder">First Hour Charges</label>
          <input type="number" class="form-control" id="perjam_pertama" name="perjam_pertama" value="{{ old('perjam_pertama', 0) }}" min="0" placeholder="0">
        </div>

        <div class="mb-3">
          <label for="perjam_berikutnya" class="form-label text-xs font-weight-bolder">Next Hour Charges</label>
          <input type="number" class="form-control" id="perjam_berikutnya" name="perjam_berikutnya" value="{{ old('perjam_berikutnya', 0) }}" min="0" placeholder="0">
        </div>

        <div class="mb-4">
          <label for="max_perhari" class="form-label text-xs font-weight-bolder">Max Cost Per Day</label>
          <input type="number" class="form-control" id="max_perhari" name="max_perhari" value="{{ old('max_perhari', 0) }}" min="0" placeholder="0">
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <a href="{{ route('vehicletype.index') }}" class="btn btn-dark w-100 mb-0">Cancel</a>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary w-100 mb-0" id="btnSimpan">Save Vehicle Type</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById('btnSimpan').addEventListener('click', function (event) {
    const jenis = document.getElementById('jenis');
    const perjamPertama = document.getElementById('perjam_pertama');
    const perjamBerikutnya = document.getElementById('perjam_berikutnya');
    const maxPerhari = document.getElementById('max_perhari');

    if (jenis.value.trim() === '') {
      event.preventDefault();
      jenis.focus();
      swal('Error!', 'Vehicle Type cannot be empty!', 'error');
      return;
    }

    if (perjamPertama.value === '' || Number(perjamPertama.value) < 0) {
      event.preventDefault();
      perjamPertama.focus();
      swal('Error!', 'First Hour Charges must be valid!', 'error');
      return;
    }

    if (perjamBerikutnya.value === '' || Number(perjamBerikutnya.value) < 0) {
      event.preventDefault();
      perjamBerikutnya.focus();
      swal('Error!', 'Next Hour Charges must be valid!', 'error');
      return;
    }

    if (maxPerhari.value === '' || Number(maxPerhari.value) < 0) {
      event.preventDefault();
      maxPerhari.focus();
      swal('Error!', 'Max Cost Per Day must be valid!', 'error');
      return;
    }
  });
</script>