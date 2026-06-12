<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0">
      <h6>Edit {{ $title }} Data</h6>
    </div>

    <div class="card-body">

      {{-- ALERT --}}
      @if(session('success'))
        <script>
          document.addEventListener('DOMContentLoaded', function(){
            swal("Success", "{{ session('success') }}", "success");
          });
        </script>
      @elseif(session('error'))
        <script>
          document.addEventListener('DOMContentLoaded', function(){
            swal("Error", "{{ session('error') }}", "error");
          });
        </script>
      @elseif($errors->any())
        <script>
          document.addEventListener('DOMContentLoaded', function(){
            swal("Validation Error", "{!! implode('\\n', $errors->all()) !!}", "error");
          });
        </script>
      @endif

      <form action="{{ route('location.update', $data->id) }}" method="POST" id="frm">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label class="form-label">Location Name</label>
          <input type="text" class="form-control" id="location_name"
            name="location_name"
            value="{{ old('location_name', $data->location_name) }}"
            placeholder="Input Location Name">
        </div>

        <div class="mb-3">
          <label class="form-label">Address</label>
          <textarea class="form-control" id="alamat"
            name="alamat"
            placeholder="Input Address">{{ old('alamat', $data->alamat) }}</textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="no_telpon"
            name="no_telpon"
            value="{{ old('no_telpon', $data->no_telpon) }}"
            placeholder="Input Phone Number">
        </div>

        <div class="text-end">
          <a href="{{ route('location.index') }}" class="btn btn-outline-secondary me-2">
            Cancel
          </a>

          {{-- GANTI jadi submit langsung --}}
          <button type="submit" class="btn btn-primary">
            Save {{ $title }}
          </button>
        </div>

      </form>

    </div>
  </div>
</div>