<!-- edit modal -->
<div id="editmodal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Data
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editmodal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
        <form action="{{ route('datapenduduk.update' ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <input type="hidden" id="editid" name="id">
                <div class="mb-3">
                    <label for="editnik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                    <input type="number" name="nik" id="editnik" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Number KK" required>
                </div>
                
                <div class="mb-3">
                    <label for="editkartukeluarga_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select KK</label>
                    <select id="editkartukeluarga_id" name="kartu_keluarga_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option selected>---Choose KK---</option>
                        @foreach ($kartukeluarga as $kk => $nokk)
                            <option value="{{ $kk }}">{{ $nokk }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="editnama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" name="nama" id="editnama" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Your Name" required>
                </div>
                
                <div class="grid gap-4 mb-3 sm:grid-cols-2 sm:gap-6 sm:mb-3">
                    <div class="w-full">
                        <label for="edittempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="edittempat_lahir" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Tempat Lahir" required>
                    </div>
                    <div class="w-full">
                        <label for="edittanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tangal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="edittanggal_lahir" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                    </div>
                    <div class="w-full">
                        <label for="editnomor_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HandPhone</label>
                        <input type="number" name="nomor_hp" id="editnomor_hp" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Input Your NUmber" required>
                        <ul class="helper-phone">
                            <li>*format acceptable = +628xxxxxxxxxx | 628xxxxxxxxxx | 08xxxxxxxxxx</li>
                        </ul>
                    </div>
                    <div class="w-full">
                        <label for="editjenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                        <select id="editjenis_kelamin" name="jenis_kelamin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option selected>---Choose Gender---</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="editagama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                        <select id="editagama" name="agama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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
                        <label for="editpekerjaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="editpekerjaan" placeholder="Input Pekerjaan..." class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                    </div>
                    <div class="w-full">
                        <label for="editprovince" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your province</label>
                        <select id="editprovince" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="province_id" required>
                            <option selected>---Choose Your Province---</option>
                            @foreach ($province as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="editregency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your regency</label>
                        <select id="editregency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="regency_id" required>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="editdistrict" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your district</label>
                        <select id="editdistrict" name="district_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="editvillage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your village</label>
                        <select id="editvillage" name="village_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Edit</button>
                <button data-modal-hide="editmodal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </form>
        </div>
    </div>
</div>