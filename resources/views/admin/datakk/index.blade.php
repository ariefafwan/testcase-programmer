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
            <div class="inline-flex rounded-md shadow-sm mb-3" role="group">
                <!-- Modal toggle -->
                <button data-modal-target="createmodal" data-modal-toggle="createmodal" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    &nbsp;Create Data
                </button>
                <a href="{{ route('kartukeluarga.export') }}" class="inline-flex items-center text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800" target="_blank"><i class="fa fa-download" aria-hidden="true"></i>
                    &nbsp;Export Data
                </a>
            </div>
  
            @include('admin.datakk.create')
        
            <div class="relative overflow-x-auto shadow-md">
                <table id="table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                NO KK
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                IMG
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datakk as $index => $row)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="px-6 py-4" scope="row">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $row->no_kk }}</td>
                            <td class="px-6 py-4">{{ $row->village->name }}, {{ $row->village->district->name }}, {{ $row->village->district->regency->name }}, {{ $row->village->district->regency->province->name }}</td>
                            <td class="px-6 py-4">
                                <!-- Modal IMG -->
                                <button href="#" data-img="{{ $row->img }}" data-id="{{ $row->id }}" data-modal-target="imgmodal" data-modal-toggle="imgmodal" class="showimg block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </td>
                            <td class="px-6 py-4">
                                <div class="inline-flex rounded-md shadow-sm" role="group">
                                    <a href="#!" class="edit inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" data-id="{{ $row->id }}" data-modal-target="editmodal" data-modal-toggle="editmodal">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-r-md hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" onclick="event.preventDefault();
                                            document.getElementById('data-delete-form-{{ $row->id }}').submit();">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </a>
                                    <form id="data-delete-form-{{$row->id}}"
                                        action="{{ route('kartukeluarga.destroy', $row->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('admin.datakk.edit')
            @include('admin.datakk.showimg')
  </div>
  
@endsection

@push('js')
<script>
    $(document).ready(function() {
        
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

        //editdata

        $('.edit').on("click",function() {
            let editid = $(this).attr('data-id');
            $.ajax({
                url: '/admin/editdatakk/'+editid,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('#editid').val(data.id);
                    $('#editnokk').val(data.no_kk);
                    
                    $('#editprovince').val(data.village.regency.province.id);
                    
                    $.ajax({
                        url: '/getregency/'+data.village.regency.province.id,
                        type: "GET",
                        dataType: "JSON",
                        success:function(regency) {                      
                            $('#editregency').empty();
                            $('#editregency').append('<option value="'+ data.village.regency.id +'">'+ data.village.regency.name +'</option>');
                            $.each(regency, function(key, value) {
                            $('#editregency').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                    
                    $.ajax({
                        url: '/getdistrict/'+data.village.regency.id,
                        type: "GET",
                        dataType: "JSON",
                        success:function(district) {
                            $('#editdistrict').empty();
                            $('#editdistrict').append('<option value="'+ data.village.district.id +'">'+ data.village.district.name +'</option>');
                            $.each(district, function(key, value) {
                            $('#editdistrict').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                    
                    $.ajax({
                        url: '/getvillage/'+data.village.district.id,
                        type: "GET",
                        dataType: "JSON",
                        success:function(village) {
                            $('#editvillage').empty();
                            $('#editvillage').append('<option value="'+ data.village.id +'">'+ data.village.name +'</option>');
                            $.each(village, function(key, value) {
                            $('#editvillage').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }
            });
            $('#editprovince').on('change', function() {
                let editprovinceID = $('#editprovince').val();
                if(editprovinceID) {
                    $.ajax({
                        url: '/getregency/'+editprovinceID,
                        type: "GET",
                        dataType: "JSON",
                        success:function(data) {                      
                            $('#editregency').empty();
                            $('#editdistrict').empty();
                            $('#editvillage').empty();
                            $('#editregency').append('<option>---Choose Regency---</option>');
                            $.each(data, function(key, value) {
                            $('#editregency').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('#editregency').empty();
                }
            });
            $('#editregency').on('change', function() {
                let editregencyID = $(this).val();
                if(editregencyID) {
                    $.ajax({
                        url: '/getdistrict/'+editregencyID,
                        type: "GET",
                        dataType: "JSON",
                        success:function(data) {
                            $('#editdistrict').empty();
                            $('#editvillage').empty();
                            $('#editdistrict').append('<option>---Choose Your District---</option>');
                            $.each(data, function(key, value) {
                            $('#editdistrict').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('#editdistrict').empty();
                }
            });
            $('#editdistrict').on('change', function() {
                let editdistrictID = $(this).val();
                if(editdistrictID) {
                    $.ajax({
                        url: '/getvillage/'+editdistrictID,
                        type: "GET",
                        dataType: "JSON",
                        success:function(data) {
                            $('#editvillage').empty();
                            $('#editvillage').append('<option>---Choose Your Village---</option>');
                            $.each(data, function(key, value) {
                            // console.log(data);
                            $('#editvillage').append('<option value="'+ key +'">'+ value +'</option>');
                            });
                        }
                    });
                }else{
                    $('#editvillage').empty();
                }
            });
        });

        //showimg

        $('.showimg').on("click",function() {
            let imgid = $(this).attr('data-id');
            let img = $(this).attr('data-img');
            $.ajax({
                url: '/admin/editdatakk/'+imgid,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    var newSrc = 'http://testcase-programmer.test/storage/img/';;
                    $('#imgid').attr('src', newSrc + data.img);
                    // console.log(data.img);
                }
            });
        });
    });
</script>
@endpush