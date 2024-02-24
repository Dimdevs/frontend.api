<div class="card-body">
    <div class="row">
            <div class="form-group col-md-6">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ isset($data) ? $data->name : '' }}">
            @error('name')
            <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
            @enderror
        </div>
        <div class="form-group col-md-6 mb-0">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ isset($data) ? $data->email : '' }}">
            @error('email')
            <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
            @enderror
        </div>
        <div class="form-group col-md-6 mb-0">
            <label for="status">Status</label>
            <select name="status" class="custom-select" id="status">
                <option value="" selected>Pilih Status</option>
                <option value="1" {{ isset($data->status) && $data->status == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ isset($data->status) && $data->status == 0 ? 'selected' : '' }}>Non Aktif</option>
            </select>
            @error('status')
            <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
            @enderror
        </div>
        <div class="form-group col-md-6 mb-0">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
            @error('password')
            <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
            @enderror
        </div>
    </div>
</div>
<div class="card-footer d-flex justify-content-between">
    <a href="{{ route($route.'index') }}" class="btn btn-secondary">Kembali</a>
    <button class="btn btn-primary mr-1" type="submit">Simpan</button>
</div>
