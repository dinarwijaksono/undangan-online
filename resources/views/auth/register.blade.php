<!DOCTYPE html>
<html data-theme="fantasy" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    @vite('resources/css/app.css')

</head>

<body>

    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content flex lg:flex-row-reverse">
            <div class="text-center basis-4/12 lg:text-left">
                <h1 class="text-5xl font-bold">Buat akun!</h1>
                <p class="py-6 mb-4">
                    Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                    quasi. In deleniti eaque aut repudiandae et a id nisi.
                </p>

                <a href="/" class="link link-secondary italic link-hover">Kembali ke halaman beranda</a>
            </div>

            <div class="card bg-base-100 basis-4/12 max-w-sm shrink-0 shadow-2xl">
                <div class="card-body">
                    <fieldset class="fieldset">
                        <label class="label">Email</label>
                        <input type="email" class="input" placeholder="Email" />
                        <p class="mb-3 text-error italic text-sm">Lorem ipsum dolor sit amet consectetur.</p>


                        <label class="label">Password</label>
                        <input type="password" class="input" placeholder="Password" />

                        <label class="label">Konfirmasi password</label>
                        <input type="password" class="input" placeholder="Konfirmasi password" />

                        <div><a href="/login" class="link link-hover">Sudah punya akun</a></div>

                        <button class="btn btn-neutral mt-4">Register</button>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
