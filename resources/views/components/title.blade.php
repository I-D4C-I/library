<div class="border-bottom mb-3 pb-3">

    @isset($link)
        <div class="mb-3">
            {{ $link }}
        </div>
    @endisset

    <div class="d-flex justify-content-between">
        <div>
            <h3 class="text-center">

                {{ $slot }}

            </h3>
        </div>

        @isset($right)
        <div>
            {{ $right }}
        </div>
        @endisset

    </div>
</div>

<x-errors></x-errors>

