<div>

    @if (!is_null($templates))
        @foreach ($templates as $key)
            <section class="w-full bg-base-100 mb-5 p-4 rounded-xl shadow-lg">
                <div class="flex justify-between">
                    <h2 class="text-xl mb-5">{{ $key->name }}
                        <div @class([
                            'badge badge-sm',
                            'badge-warning' => $key->is_publish,
                            'badge-secondary' => !$key->is_publish,
                        ])>{{ $key->is_publish ? 'Publis' : 'Private' }}</div>
                    </h2>
                </div>

                <div class="flex mb-2 max-w-full">

                    @php
                        $covers = json_decode($key->cover_path);
                    @endphp

                    @for ($i = 0; $i < (count($covers) > 3 ? 3 : count($covers)); $i++)
                        <div class="border border-slate-400 h-44 w-32 m-2"
                            style="
                            background: url('{{ env('APP_URL') . '/storage-custom/cover/' . $covers[$i] }}');
                            background-size: 100% auto;
                            background-position: center center;
                            background-repeat: no-repeat;">
                        </div>
                    @endfor

                </div>

                {{-- footer --}}
                <div class="flex justify-end">
                    <a href="/template/preview/{{ $key->code }}" target="_blank"
                        class="btn btn-sm btn-warning ml-2">Preview</a>
                    <a href="/template/detail-template/{{ $key->code }}" class="btn btn-sm btn-primary ml-2">Detail
                        template</a>
                </div>
            </section>
        @endforeach
    @endif

</div>
