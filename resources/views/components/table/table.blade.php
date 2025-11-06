<div class="w-full bg-zinc-50 shadow-sm overflow-x-auto rounded-xl border border-zinc-200">
    {{ $slot }}

    <table class="w-full table-auto">
        <thead>
            <tr>
                {{ $header }}
            </tr>
        </thead>

        <tbody class="bg-white">
            {{ $body }}
        </tbody>

        {{-- <tfoot>
            {{ $footer }}
        </tfoot> --}}
    </table>
</div>

