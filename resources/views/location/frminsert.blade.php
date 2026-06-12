<div class="col-12">
  <div class="card shadow-sm border-0">
    <div class="card-header pb-0 bg-transparent border-0 px-4 pt-4">
      <h6 class="mb-0"><span class="text-gradient text-primary">Location</span> Input Form</h6>
    </div>

    <div class="card-body px-4 pt-3 pb-4">
      <form action="{{ route('location.store') }}" method="POST" id="frm">
        @csrf

        <div class="mb-3">
          <label for="location_name" class="form-label text-xs font-weight-bolder">Location Name</label>
          <input type="text" class="form-control" id="location_name" name="location_name" value="{{ old('location_name') }}" placeholder="Location name">
          @error('location_name')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="max_motorcycle" class="form-label text-xs font-weight-bolder">Max Motorcycle</label>
          <input type="number" class="form-control" id="max_motorcycle" name="max_motorcycle" value="{{ old('max_motorcycle', 0) }}" min="0" placeholder="0">
          @error('max_motorcycle')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-3">
          <label for="max_car" class="form-label text-xs font-weight-bolder">Max Car</label>
          <input type="number" class="form-control" id="max_car" name="max_car" value="{{ old('max_car', 0) }}" min="0" placeholder="0">
          @error('max_car')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="mb-4">
          <label for="max_other" class="form-label text-xs font-weight-bolder">Max Truck/Bus/Other</label>
          <input type="number" class="form-control" id="max_other" name="max_other" value="{{ old('max_other', 0) }}" min="0" placeholder="0">
          @error('max_other')
            <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="row g-3">
          <div class="col-md-6">
            <a href="{{ route('location.index') }}" class="btn btn-dark w-100 mb-0">Cancel</a>
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-primary w-100 mb-0" id="btnSimpan">Save Location</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  document.getElementById('btnSimpan').addEventListener('click', function (event) {
    const locationName = document.getElementById('location_name');
    const maxMotorcycle = document.getElementById('max_motorcycle');
    const maxCar = document.getElementById('max_car');
    const maxOther = document.getElementById('max_other');

    if (locationName.value.trim() === '') {
      event.preventDefault();
      locationName.focus();
      swal('Error!', 'Location Name cannot be empty!', 'error');
      return;
    }

    if (maxMotorcycle.value === '' || Number(maxMotorcycle.value) < 0) {
      event.preventDefault();
      maxMotorcycle.focus();
      swal('Error!', 'Max Motorcycle must be valid!', 'error');
      return;
    }

    if (maxCar.value === '' || Number(maxCar.value) < 0) {
      event.preventDefault();
      maxCar.focus();
      swal('Error!', 'Max Car must be valid!', 'error');
      return;
    }

    if (maxOther.value === '' || Number(maxOther.value) < 0) {
      event.preventDefault();
      maxOther.focus();
      swal('Error!', 'Max Truck/Bus/Other must be valid!', 'error');
      return;
    }
  });
</script>