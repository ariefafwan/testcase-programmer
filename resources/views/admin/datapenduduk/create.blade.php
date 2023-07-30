@extends('admin.layouts.app')

@section('body')

@if($errors->any())
    <div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
    </div>
@endif
    <div class="p-4 bg-white rounded-lg dark:border-gray-900">
        <form action="{{ route('datapenduduk.store' ) }}" method="post" enctype="multipart/form-data">
            @csrf
                <div id="form" class="mb-6">
                    <div class="mb-3">
                        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                        <input type="number" name="nik[]" id="nik" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Number KK" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="kartukeluarga_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select KK</label>
                        <select id="kartukeluarga_id" name="kartu_keluarga_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option selected>---Choose KK---</option>
                            @foreach ($kartukeluarga as $kk => $nokk)
                                <option value="{{ $kk }}">{{ $nokk }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama[]" id="nama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Your Name" required>
                    </div>
                    
                    <div class="grid gap-4 mb-3 sm:grid-cols-2 sm:gap-6 sm:mb-3">
                        <div class="w-full">
                            <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir[]" id="tempat_lahir" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Tempat Lahir" required>
                        </div>
                        <div class="w-full">
                            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tangal Lahir</label>
                            <input type="date" name="tanggal_lahir[]" id="tanggal_lahir" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                        </div>
                        <div class="w-full">
                            <label for="nomor_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HandPhone</label>
                            <input type="number" name="nomor_hp[]" id="nomor_hp" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Your NUmber" required>
                            <ul class="helper-phone">
                                <li>*format acceptable = +628xxxxxxxxxx | 628xxxxxxxxxx | 08xxxxxxxxxx</li>
                            </ul>
                        </div>
                        <div class="w-full">
                            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option selected>---Choose Gender---</option>
                                <option value="L">Laki - Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                            <select id="agama" name="agama[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                <option selected>---Choose Religion---</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Kristen Katolik">Kristen Katolik</option>
                                <option value="Budha">Budha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Khonghucu">Khonghucu</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                            <input type="text" name="pekerjaan[]" id="pekerjaan" placeholder="Input Pekerjaan..." class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                        </div>
                        <div class="w-full">
                            <label for="province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your province</label>
                            <select id="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="province_id" required>
                                <option selected>---Choose Your Province---</option>
                                @foreach ($province as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="regency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your regency</label>
                            <select id="regency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="regency_id" required>
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="district" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your district</label>
                            <select id="district" name="district_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="village" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your village</label>
                            <select id="village" name="village_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </select>
                        </div>
                    </div>
                </div>
                <div id="button">
                    <button style="display: none" type="button" id="remove" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Remove</button>
                    <button style="display: inline-block" type="button" id="more" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">+ Add More</button>
                    <button style="display: inline-block" type="submit" id="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var i = 0;
            $("#more").click(function () {
                ++i;
                $('#more').attr('style', 'display: none');
                $('#remove').attr('style', 'display: inline-block');
                $("#form").after(`

                        <div class="mt-6" id="form2">
                            <hr class="mt-6">
                            <div class="mb-3 mt-6">
                                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                <input type="number" name="nik[]" id="nik" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Number KK" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="kartukeluarga_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select KK</label>
                                <select id="kartukeluarga_id" name="kartu_keluarga_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option selected>---Choose KK---</option>
                                    @foreach ($kartukeluarga as $kk => $nokk)
                                        <option value="{{ $kk }}">{{ $nokk }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input type="text" name="nama[]" id="nama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Your Name" required>
                            </div>
                            
                            <div class="grid gap-4 mb-3 sm:grid-cols-2 sm:gap-6 sm:mb-3">
                                <div class="w-full">
                                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir[]" id="tempat_lahir" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Tempat Lahir" required>
                                </div>
                                <div class="w-full">
                                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tangal Lahir</label>
                                    <input type="date" name="tanggal_lahir[]" id="tanggal_lahir" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="w-full">
                                    <label for="nomor_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HandPhone</label>
                                    <input type="number" name="nomor_hp[]" id="nomor_hp" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Your NUmber" required>
                                    <ul class="helper-phone">
                                        <li>*must be a minimum of 10 digits and a maximum of 15 digits</li>
                                    </ul>
                                </div>
                                <div class="w-full">
                                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        <option selected>---Choose Gender---</option>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="agama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                    <select id="agama" name="agama[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        <option selected>---Choose Religion---</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen Protestan">Kristen Protestan</option>
                                        <option value="Kristen Katolik">Kristen Katolik</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                                    <input type="text" name="pekerjaan[]" id="pekerjaan" placeholder="Input Pekerjaan..." class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                </div>
                                <div class="w-full">
                                    <label for="province1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your province</label>
                                    <select id="province1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="province_id" required>
                                        <option selected>---Choose Your Province---</option>
                                        @foreach ($province as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="regency1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your regency</label>
                                    <select id="regency1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="regency_id" required>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="district1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your district</label>
                                    <select id="district1" name="district_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="village1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your village</label>
                                    <select id="village1" name="village_id[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                `);

                $('#province1').on('change', function() {
                    let provinceID = $('#province1').val();
                    if(provinceID) {
                        $.ajax({
                            url: '/getregency/'+provinceID,
                            type: "GET",
                            dataType: "JSON",
                            success:function(data) {                      
                                $('#regency1').empty();
                                $('#district1').empty();
                                $('#village1').empty();
                                $('#regency1').append('<option>---Choose Regency---</option>');
                                $.each(data, function(key, value) {
                                // console.log(data);
                                $('#regency1').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                            }
                        });
                    }else{
                        $('#regency1').empty();
                    }
                });
                $('#regency1').on('change', function() {
                    let regencyID = $(this).val();
                    if(regencyID) {
                        $.ajax({
                            url: '/getdistrict/'+regencyID,
                            type: "GET",
                            dataType: "JSON",
                            success:function(data) {
                                $('#district1').empty();
                                $('#village1').empty();
                                $('#district1').append('<option>---Choose Your District---</option>');
                                $.each(data, function(key, value) {
                                $('#district1').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                            }
                        });
                    }else{
                        $('#district1').empty();
                    }
                });
                $('#district1').on('change', function() {
                    let districtID = $(this).val();
                    if(districtID) {
                        $.ajax({
                            url: '/getvillage/'+districtID,
                            type: "GET",
                            dataType: "JSON",
                            success:function(data) {
                                $('#village1').empty();
                                $('#village1').append('<option>---Choose Your Village---</option>');
                                $.each(data, function(key, value) {
                                $('#village1').append('<option value="'+ key +'">'+ value +'</option>');
                                });
                            }
                        });
                    }else{
                        $('#village1').empty();
                    }
                });

            });

            $('#remove').on('click', function() {
                $('#form2').remove();
                $('#more').attr('style', 'display: inline-block');
                $('#remove').attr('style', 'display: none');
            });

            //crete data
            $('#province').on('change', function() {
                let provinceID = $('#province').val();
                if(provinceID) {
                    $.ajax({
                        url: '/getregency/'+provinceID,
                        type: "GET",
                        dataType: "JSON",
                        success:function(data) {                      
                            $('#regency').empty();
                            $('#district').empty();
                            $('#village').empty();
                            $('#regency').append('<option>---Choose Regency---</option>');
                            $.each(data, function(key, value) {
                            // console.log(data);
                            $('#regency').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('#regency').empty();
                }
            });
            $('#regency').on('change', function() {
                let regencyID = $(this).val();
                if(regencyID) {
                    $.ajax({
                        url: '/getdistrict/'+regencyID,
                        type: "GET",
                        dataType: "JSON",
                        success:function(data) {
                            $('#district').empty();
                            $('#village').empty();
                            $('#district').append('<option>---Choose Your District---</option>');
                            $.each(data, function(key, value) {
                            $('#district').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('#district').empty();
                }
            });
            $('#district').on('change', function() {
                let districtID = $(this).val();
                if(districtID) {
                    $.ajax({
                        url: '/getvillage/'+districtID,
                        type: "GET",
                        dataType: "JSON",
                        success:function(data) {
                            $('#village').empty();
                            $('#village').append('<option>---Choose Your Village---</option>');
                            $.each(data, function(key, value) {
                            $('#village').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('#village').empty();
                }
            });
        });
    </script>
@endpush