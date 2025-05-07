<x-dash-layout>
    <table class="table-auto w-full text-sm text-left text-gray-700 border border-gray-300 mt-8">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">المستخدم</th>
                <th class="px-4 py-2">الكتاب</th>
                <th class="px-4 py-2">المراجعة</th>
                <th class="px-4 py-2">التاريخ</th>
                <th class="px-4 py-2">التحكم</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $index => $review)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $review->user->name }}</td>
                    <td class="px-4 py-2">{{ $review->book->title }}</td>
                    <td class="px-4 py-2">{{ Str::limit($review->review, 50) }}</td>
                    <td class="px-4 py-2">{{ $review->created_at->format('Y-m-d') }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('review.destroy', $review) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه المراجعة؟')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>    

</x-dash-layout>