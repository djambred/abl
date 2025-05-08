<x-filament-panels::page>
    <div class="space-y-4">
        <h2 class="text-xl font-bold">Remote Product List</h2>

        <table class="w-full table-auto border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Price</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($this->products as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $product['id'] ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $product['name'] ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $product['price'] ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center border px-4 py-2">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-filament-panels::page>
