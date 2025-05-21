<sidebar class="basis-2/12 py-4 px-2">
    <ul class="menu rounded-box w-full">
        <li><a href="/main" @class(['btn mb-2', 'btn-primary' => $active == 'main'])>Beranda</a></li>
        <li><a href="/invitation/my-invitation" @class(['btn mb-2', 'btn-primary' => $active == 'invitation'])>Undanganku</a></li>
        <li><a href="/invitation-template" @class([
            'btn mb-2',
            'btn-primary' => $active == 'invitation-template',
        ])>Templetku</a></li>
        <li><a href="/confirm-attendance" @class(['btn mb-2', 'btn-primary' => $active == 'confirm-attendance'])>Konfirmasi kehadiran</a></li>
    </ul>
</sidebar>
