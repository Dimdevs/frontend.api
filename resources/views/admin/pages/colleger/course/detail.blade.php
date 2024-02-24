<div class="col-12 table-responsive">
    <table id="courseTable" class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mata Kuliah</th>
            <th scope="col">
                #
            </th>
          </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data->course as $item)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td><input type="text" readonly class="form-control" value="{{ $item->name }}" name="course[]"></td>
                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-danger m-1 removeRow">#</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
