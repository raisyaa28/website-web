<div class="col-12">
  <div class="card shadow-sm border-0">
    <div class="card-header pb-0 bg-transparent border-0 px-4 pt-4">
      <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
        <h6 class="mb-0"><span class="text-gradient text-primary">Vehicle Type</span> Data Table</h6>
      </div>
    </div>

    <div class="card-body px-4 pt-3 pb-4">
      <div class="table-responsive">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Vehicle Type</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">First Hour Charges</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Next Hourly Charges</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Max Cost Per Day</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($datas as $nmr => $data)
            <tr>
              <td>
                <p class="text-sm font-weight-bold mb-0">{{ $nmr + 1 }}.</p>
              </td>
              <td>
                <a href="{{ route('vehicletype.edit', $data->id) }}" class="text-info me-2" title="Edit">
                  <i class="fas fa-pen"></i>
                </a>
                <form action="{{ route('vehicletype.destroy', $data->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="border-0 bg-transparent p-0 text-danger" onclick="return confirm('Anda yakin ingin menghapus tipe kendaraan ini?');" title="Delete">
                    <i class="fas fa-trash"></i>
                  </button>
                </form>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">{{ ucfirst($data->jenis) }}</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">Rp {{ number_format($data->perjam_pertama, 0, ',', '.') }}</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">Rp {{ number_format($data->perjam_berikutnya, 0, ',', '.') }}</p>
              </td>
              <td>
                <p class="text-sm font-weight-bold mb-0">Rp {{ number_format($data->max_perhari, 0, ',', '.') }}</p>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center py-4 text-sm text-secondary">No vehicle type data found.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>