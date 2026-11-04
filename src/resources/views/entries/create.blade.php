<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>授業を登録 | POSSE大学</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 text-slate-800 min-h-screen">
    <header class="bg-[#1f3a5f] text-white">
        <div class="max-w-5xl mx-auto px-4 py-4">
            <p class="text-xs tracking-widest text-blue-100">POSSE大学 学務ポータル</p>
            <h1 class="mt-1 text-xl font-bold">授業を登録</h1>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-6">
        <form action="/entries" method="post" class="max-w-lg bg-white border border-slate-200 rounded-lg px-5 py-5 space-y-4">
            @csrf

            <div>
                <label for="day" class="block text-sm font-medium text-slate-700">曜日</label>
                <select id="day" name="day" required class="mt-1 w-full rounded border border-slate-300 px-3 py-2">
                    <option value="1">月</option>
                    <option value="2">火</option>
                    <option value="3">水</option>
                    <option value="4">木</option>
                    <option value="5">金</option>
                </select>
            </div>

            <div>
                <label for="period" class="block text-sm font-medium text-slate-700">時限</label>
                <select id="period" name="period" required class="mt-1 w-full rounded border border-slate-300 px-3 py-2">
                    @for ($period = 1; $period <= 6; $period++)
                        <option value="{{ $period }}">{{ $period }}限</option>
                    @endfor
                </select>
            </div>

            <div>
                <label for="title" class="block text-sm font-medium text-slate-700">授業名</label>
                <input id="title" name="title" type="text" required class="mt-1 w-full rounded border border-slate-300 px-3 py-2">
            </div>

            <div>
                <label for="room" class="block text-sm font-medium text-slate-700">教室</label>
                <input id="room" name="room" type="text" class="mt-1 w-full rounded border border-slate-300 px-3 py-2">
            </div>

            <div class="flex items-center gap-4 pt-2">
                <button type="submit" class="rounded bg-[#1f3a5f] px-4 py-2 text-sm font-bold text-white">登録する</button>
                <a href="/entries" class="text-sm text-slate-600 underline">一覧へ戻る</a>
            </div>
        </form>
    </main>
</body>
</html>
