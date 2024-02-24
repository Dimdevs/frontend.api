
@if (isset($data))
<div class="col-12 table-responsive">
    <table id="courseTable" class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mata Kuliah</th>
            <th scope="col">
                <button type="button" class="btn btn-primary m-1 addRow">Tambah</button>
            </th>
          </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($data->course as $item)
            <tr>
                <th scope="row">{{$no++}}</th>
                <td><input type="text" class="form-control" name="course[]" value="{{$item->name}}"></td>
                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-danger m-1 removeRow">Hapus</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
@else
<div class="col-12 table-responsive">
    <table id="courseTable" class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mata Kuliah</th>
            <th scope="col">
                <button type="button" class="btn btn-primary m-1 addRow">Tambah</button>
            </th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td><input type="text" class="form-control" name="course[]"></td>
                <td>
                    <div class="d-flex">
                        <button type="button" class="btn btn-danger m-1 removeRow">Hapus</button>
                    </div>
                </td>
            </tr>
        </tbody>
      </table>
</div>
@endif
