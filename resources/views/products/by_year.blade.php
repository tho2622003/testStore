<x-layout>
    <x-grid>
        @php
        $groupedProducts = $products->groupBy('year');
        @endphp
        @foreach ($groupedProducts as $year => $yearProducts)
        <div class="col-span-full">
            <div class="flex justify-between">
                <x-heading>{{ $year }}</x-heading>
                <h1 class="text-lg">{{count($yearProducts)}} entries</h1>
            </div>
        </div>
        @foreach ($yearProducts as $product)
        <x-card :product="$product"></x-card>
        @endforeach
        @endforeach
    </x-grid>
</x-layout>

@if($message)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            alert("{{ $message }}");
            window.history.back();
        })
    </script>
@endif