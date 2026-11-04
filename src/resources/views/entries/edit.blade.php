<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>授業を編集</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen">
    <header class="bg-[#1f3a5f] text-white">
        <div class="max-w-5xl mx-auto px-4 py-4">
            <p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
            <h1 class="mt-1 text-xl font-bold">授業を編集</h1>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-6">
        <form action="/entries/{{ $entry->id }}" method="post" class="max-w-lg bg-white border border-slate-200 rounded-lg px-5 py-5 space-y-4">
        @csrf
        @method('PUT')

            <div>
                <label for="day" class="block text-sm font-medium text-slate-700">曜日</label>
                <p>曜日: {{ [1 => '月', 2 => '火', 3 => '水', 4 => '木', 5 => '金'][$entry->day] }}</p>
            </div>

            <div>
                <label for="period" class="block text-sm font-medium text-slate-700">時限</label>
                <p>時限: {{ $entry->period }}</p>
            </div>

            <div>
                <label for="title" class="block text-sm font-medium text-slate-700">授業名</label>
                <input id="title" name="title" type="text" value="{{ old('title', $entry->title ?? '') }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="room" class="block text-sm font-medium text-slate-700">教室</label>
                <input id="room" name="room" type="text" value="{{ old('room', $entry->room) }}" class="mt-1 w-full rounded border border-slate-300 px-3 py-2">
            </div>

            <div class="flex items-center gap-4 pt-2">
                <button type="submit" class="rounded bg-[#1f3a5f] px-4 py-2 text-sm font-bold text-white">保存する</button>
                <a href="/entries" class="text-sm text-slate-600 underline">一覧へ戻る</a>
            </div>
        </form>
    </main>
</body>
</html>
