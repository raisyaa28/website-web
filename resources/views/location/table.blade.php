<div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>{{ $title }} Data</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Location Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Max Motorcycle</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Max Car</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Max Truck/Bus/Other</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($datas as $nmr => $data)
                    <tr>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $nmr + 1 }}</p>
                      </td>
                      <td>
                        <a href="{{ route('location.edit', $data->id) }}"><i data-feather="edit"></i></a>
                        <form action="{{ route('location.destroy', $data->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="border-0 bg-white" onclick="return confirm('Anda yakin ingin menghapus lokasi ini?');"><i data-feather="trash-2"></i></button>
                        </form>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $data->location_name }}</p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $data->max_motorcycle }}</p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $data->max_car }}</p>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{ $data->max_other }}</p>
                      </td>
                    </tr>
                    @empty
                    <tr>
                      <td colspan="6" class="text-center py-4 text-sm text-secondary">No location data found.</td>
                    </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>