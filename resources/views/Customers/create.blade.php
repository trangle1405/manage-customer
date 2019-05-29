@extends('home')
@section('title', 'Thêm mới khách hàng')
@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>Thêm mới khách hàng</h1>
            </div>
            <div class="col-12">
                <p style='color:green'>{{ (isset($success)) ? $success : '' }}</p>
                <form method="post" action="{{ route('customers.store') }}">
                    @csrf
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}"
                               placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}"
                               placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Ngày sinh</label>
                        <input type="date" class="form-control" name="dob" value="{{old('dob')}}">

                        <div class="form-group">
                            <label>Tỉnh thành</label>
                            <select class="form-control" name="city_id">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
                    </div>
                </form>
                <div class="error-message">
                    @if ($errors->any())
                        @foreach($errors->all() as $nameError)
                            <p style="color:red">{{ $nameError }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection