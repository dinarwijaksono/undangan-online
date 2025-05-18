@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Konfirmasi kehadiran</h1>

        <div class="mb-5 px-6 py-2 rounded-xl bg-base-100 flex gap-2">
            <div class="basis-5/12">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Kehadiran</legend>
                    <select class="select select-sm w-full">
                        <option selected>Semua</option>
                        <option>Hadir</option>
                        <option>Ragu-rahu</option>
                        <option>Tidak hadir</option>
                    </select>
                </fieldset>
            </div>

            <div class="basis-6/12">
                <fieldset class="fieldset">
                    <legend class="fieldset-legend">Undangan</legend>
                    <select class="select select-sm w-full">
                        <option selected>Semua</option>
                        <option>Hadir</option>
                        <option>Ragu-rahu</option>
                        <option>Tidak hadir</option>
                    </select>
                </fieldset>
            </div>

            <div class="basis-1/12 pt-8">
                <button class="btn btn-primary btn-sm w-full">Filter</button>
            </div>
        </div>

        @for ($i = 0; $i < 10; $i++)
            <section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">

                <div>
                    <table class="table">
                        <tr>
                            <td>Undangan</td>
                            <td>:</td>
                            <td>
                                <a href="#" class="link link-primary no-underline">Aku dan kamu</a>
                            </td>
                        </tr>

                        <tr>
                            <td>Isi pesan</td>
                            <td>:</td>
                            <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</td>
                        </tr>

                        <tr>
                            <td>konfirmasi kehadiran</td>
                            <td>:</td>
                            <td>
                                <div class="badge badge-primary">Hadir</div>
                            </td>
                        </tr>

                        <tr>
                            <td>Dibuat</td>
                            <td>:</td>
                            <td>10:33 - 7 maret 2025</td>
                        </tr>
                    </table>

                    <div class="flex justify-end">
                        <button class="btn btn-primary btn-sm w-2/12">Sembunyikan</button>
                    </div>
                </div>

            </section>
        @endfor

    </main>
@endsection
