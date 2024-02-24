<div class="card-body">
    <div class="row">
            <div class="form-group col-md-6">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ isset($data) ? $data->name : '' }}">
            @error('name')
            <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="image">Upload File</label>
            <input type="file" name="image" class="form-control" value="{{ isset($data) ? $data->image : '' }}">
            @error('image')
            <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="gender">Jenis Kelamin</label>
            <select name="gender" class="custom-select" id="gender">
                <option value="" selected>Pilih Jenis Kelamin</option>
                <option value="Laki - Laki" {{ isset($data->gender) && $data->gender == 'Laki - Laki' ? 'selected' : '' }}>Laki - Laki</option>
                <option value="Perempuan" {{ isset($data->gender) && $data->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender')
            <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
            @enderror
        </div>
        <div class="form-group col-md-12 mb-0">
            <label for="address">Address</label>
            <textarea type="text" name="address" class="form-control">{{ isset($data->address) && $data->address }}</textarea>
            @error('address')
            <p style="font-size: 12px;" class="mb-0 text-danger mt-1 font-italic font-weight-bold">{{$message}} !</p>
            @enderror
        </div>
    </div>
</div>
<div class="card-body">
   <div class="row">

        @include('admin.pages.colleger.course.field')

   </div>
</div>
<div class="card-footer d-flex justify-content-between">
    <a href="{{ route($route.'index') }}" class="btn btn-secondary">Kembali</a>
    <button class="btn btn-primary mr-1" type="submit">Simpan</button>
</div>
