@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Undanganku</h1>

        <div class="overflow-x-auto bg-base-100 shadow-lg rounded-xl">
            <table class="table w-full">
                <!-- head -->
                <thead>
                    <tr class="bg-warning text-slate-500 w-full">
                        <th class="text-center w-1/12">No</th>
                        <th class="text-center w-3/12">Name</th>
                        <th class="text-center w-2/12">Dibuat</th>
                        <th class="text-center w-2/12">Expired</th>
                        <th class="text-center w-2/12">Status</th>
                        <th class="text-center w-2/12"></th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 5; $i++)
                        <!-- row 1 -->
                        <tr class="hover:bg-sky-100">
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td>Aku & Kamu</td>
                            <td class="text-center">12 Mei 2025</td>
                            <td class="text-center">12 Mei 2025</td>
                            <td class="text-center">
                                <div class="badge badge-error text-[12px]">
                                    <svg class="size-[1em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
                                            <circle cx="12" cy="12" r="10" fill="none"
                                                stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10"
                                                stroke-width="2"></circle>
                                            <path d="m12,17v-5.5c0-.276-.224-.5-.5-.5h-1.5" fill="none"
                                                stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10"
                                                stroke-width="2"></path>
                                            <circle cx="12" cy="7.25" r="1.25" fill="currentColor"
                                                stroke-width="2"></circle>
                                        </g>
                                    </svg>
                                    Expired
                                </div>
                            </td>
                            <td>
                                <div class="flex gap-2">
                                    <div class="basis-6/12">
                                        <button class="btn btn-sm w-full text-white btn-primary">Aktifkan</button>
                                    </div>

                                    <div class="basis-6/12">
                                        <a href="/invitation/edit-invitation"
                                            class="btn btn-sm w-full text-white btn-secondary">Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endfor

                </tbody>
            </table>
        </div>

        <div class="overflow-x-auto flex justify-center mt-8">
            <a href="/invitation/select-a-theme" class="btn btn-secondary btn-sm w-5/12">Buat undangan baru</a>
        </div>

    </main>
@endsection
