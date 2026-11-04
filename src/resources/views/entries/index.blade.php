<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>履修一覧 | POSSE大学</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen">
    <header class="bg-[#1f3a5f] text-white">
        <div class="max-w-5xl mx-auto px-4 py-4 flex items-center justify-between gap-4">
            <div>
                <p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
                <h1 class="mt-1 text-xl font-bold">登録した授業</h1>
            </div>
            <a href="/entries/create" class="shrink-0 rounded bg-white px-4 py-2 text-sm font-bold text-[#1f3a5f]">授業を登録</a>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-6">
        <section class="bg-white border border-slate-200 rounded-lg">
            @if ($entries->isEmpty())
                <p class="px-5 py-8 text-slate-600">まだ授業が登録されていません</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-slate-700">
                        <thead class="bg-slate-50 text-slate-600">
                            <tr>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">曜日</th>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">時限</th>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">授業名</th>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">教室</th>
                                <th class="px-4 py-2 font-medium whitespace-nowrap">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $dayLabels = [1 => '月', 2 => '火', 3 => '水', 4 => '木', 5 => '金'];
                            @endphp
                            @foreach ($entries as $entry)
                                <tr class="border-t border-slate-200">
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $dayLabels[$entry->day] }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $entry->period }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $entry->title }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $entry->room }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        <a href="/entries/{{ $entry->id }}/edit" class="underline">編集</a>
                                        <form action="/entries/{{ $entry->id }}" method="post" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="underline">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </main>
</body>
</html>
