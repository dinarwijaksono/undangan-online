<div class="hero bg-base-200 min-h-screen">
    <div class="hero-content flex lg:flex-row-reverse">
        <div class="text-center basis-4/12 lg:text-left">
            <h1 class="text-5xl font-bold">Buat akun!</h1>
            <p class="py-6 mb-4">
                Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                quasi. In deleniti eaque aut repudiandae et a id nisi.
            </p>

            <a href="/" class="link link-primary italic link-hover">Kembali ke halaman beranda</a>
        </div>

        <div class="card bg-base-100 basis-4/12 max-w-sm shrink-0 shadow-2xl">
            <div class="card-body">

                @if (session()->has('registerSuccess'))
                    <div role="alert" class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session()->get('registerSuccess') }}</span>
                    </div>
                @endif

                <fieldset class="fieldset">
                    <label class="label" for="name">Nama</label>
                    <input type="text" wire:model="name" class="input" placeholder="Nama" />
                    @error('name')
                        <p class="mb-3 text-error italic text-sm">{{ $message }}</p>
                    @enderror

                    <label class="label">Email</label>
                    <input type="email" wire:model="email" class="input" placeholder="Email" />
                    @error('email')
                        <p class="mb-3 text-error italic text-sm">{{ $message }}</p>
                    @enderror

                    <label class="label">Password</label>
                    <input type="password" wire:model="password" class="input" placeholder="Password" />
                    @error('password')
                        <p class="mb-3 text-error italic text-sm">{{ $message }}</p>
                    @enderror

                    <label class="label">Konfirmasi password</label>
                    <input type="password" wire:model="passwordConfirmation" class="input"
                        placeholder="Konfirmasi password" />
                    @error('passwordConfirm')
                        <p class="mb-3 text-error italic text-sm">{{ $message }}</p>
                    @enderror

                    <div><a href="/login" class="link link-primary no-underline hover:underline italic">Sudah punya
                            akun</a></div>

                    <button type="button" wire:click="doRegister" class="btn btn-neutral mt-4">Register</button>
                </fieldset>
            </div>
        </div>
    </div>
</div>
