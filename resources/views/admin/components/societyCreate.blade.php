@extends("admin.layout")

@section('content')
    <div class="table__box">
        @include('components.errors')
        <table class="table">
            <thead role="rowgroup">
            <tr role="row" class="title-row">
                <th>تایتل نمایندگی</th>
                <th>بیوگرافی نمایندگی</th>
                <th>استان انجمن</th>
                <th>شهر انجمن</th>
                <th>کد نمایندگی</th>
                <th>عملیات</th>
            </tr>
            </thead>
            <tbody>

            <form action="{{route('admin.society.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <tr role="row" class="">
                    <td><input name="name" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;" placeholder="نام نمایندگی..."></td>

                    <td><textarea name="description" id="description" cols="30" rows="5" class="form-control" style="resize: none; height: 120px !important;" placeholder="متن نمایندگی..."></textarea></td>

                    <td>

                        <!-- province -->
                        <div class="mb-3">
                            <label for="province" class="form-label">استان</label>
                            <select id="province" name="province" class="form-control" id="exampleInputUser" aria-describedby="userHelp"
                                    required>
                                <option class="form-control" value="">انتخاب استان</option>
                                @foreach ($provinces as $info)
                                    <option value="{{ $info['id'] }}">{{ $info['name'] }}</option>
                                @endforeach

                            </select>
                        </div>


                    </td>

                    <td>
                        <!-- city -->
                        <div class="mb-3">
                            <label for="city"  class="form-label"/>
                            <select id="city" class="form-control"  name="city_id"
                                    required autofocus autocomplete="city">
                                <option name="city_id" class="form-control" value="">انتخاب شهر</option>
                            </select>
                            {{-- <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')"
                                required autofocus autocomplete="city" /> --}}
                            <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            {{-- @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror --}}
                        </div>
                    </td>

                    <td><input name="code" type="text" style="outline:1px solid gray;border-radius: 4px;padding: 1vh;"></td>

                    <!-- <td>5 دوره</td> -->
                    <!-- <td class="text-success">تاییده شده</td> -->
                    <td>
                        <!-- <a href="" class="item-delete mlg-15" title="حذف"></a> -->
                        <button  type="submit" class="btn item-confirm mlg-15 text-success"  title="تایید"></button>
                        <!-- <a href="" class="item-reject mlg-15" title="رد"></a> -->
                        <!-- <a href="edit-user.html" target="_blank" class="item-eye mlg-15" title="مشاهده"></a> -->
                        <!-- <a href="edit-user.html" class="item-edit " title="ویرایش"></a> -->
                    </td>
                </tr>
            </form>

            </tbody>
        </table>
    </div>
@endsection


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#province').change(function() {
            var provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    url: '/get_city/' + provinceId,
                    type: 'GET',
                    success: function(data) {
                        $('#city').empty().prop('disabled', false);
                        $('#city').append('<option value="">انتخاب شهر</option>');
                        $.each(data, function(key, city) {
                            $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                        });
                    }
                })
                    .fail(function(jqXHR, textStatus, errorThrown) {
                        // Handle error
                        console.error("Error: " + textStatus + " - " + errorThrown);
                    });

            } else {
                $('#city').empty().prop('disabled', true);
            }
        });
    });
</script>
