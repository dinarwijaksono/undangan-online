@extends('../layout/main-layout')

@section('main-section')
    <main class="basis-10/12 px-4 bg-base-200 py-6">
        <h1 class="text-3xl mb-5">Beranda</h1>

        <div role="alert" class="alert alert-vertical bg-error mb-5 sm:alert-horizontal rounded-xl shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div>
                <h3 class="font-bold">New message!</h3>
                <div class="text-xs">You have 1 unread message</div>
            </div>
            <button class="btn btn-sm btn-error">Tutup</button>
        </div>

        <section class="w-full bg-base-100 mb-5 p-6 rounded-xl shadow-lg">
            <h2 class="text-2xl mb-5">Profile</h2>

            <table class="table w-full">
                <tbody>
                    <tr>
                        <td class="w-3/12">Nama</td>
                        <td class="w-1/12 text-center">:</td>
                        <td class="w-8/12">{{ auth()->user()->name }}</td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td class="text-center">:</td>
                        <td>{{ auth()->user()->email }}</td>
                    </tr>

                    <tr>
                        <td>Bergabung</td>
                        <td class="text-center">:</td>
                        <td>{{ date('j M Y', strtotime(auth()->user()->created_at)) }}</td>
                </tbody>
            </table>
        </section>

        <section class="stats w-full bg-base-100 shadow-lg rounded-xl justify-center flex">
            <div class="stat basis-4/12 text-center">
                <div class="stat-title font-bold">Total undangan dibuat</div>
                <div class="stat-value">31K</div>
            </div>

            <div class="stat basis-4/12 text-center">
                <div class="stat-title font-bold">Total undangan aktiv</div>
                <div class="stat-value">4,200</div>
            </div>

            <div class="stat basis-4/12 text-center">
                <div class="stat-title font-bold">Total Nonaktiv</div>
                <div class="stat-value">1,200</div>
            </div>
        </section>

    </main>
@endsection
