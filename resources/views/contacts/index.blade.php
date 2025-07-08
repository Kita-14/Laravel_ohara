{{-- スロット。各ページで共通するヘッダーやナビゲーション等を使いまわす仕様 --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            HOME
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-8 mx-auto">
                            {{-- フラッシュメッセージ --}}
                            {{-- @if (session('message'))
                                {{ session('message') }}
                            @endif --}}
                            <x-flash-message status="info" />
                            <div class="flex flex-col text-center w-full mb-4">
                                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-1 text-gray-900">お問い合わせ一覧</h1>
                                {{-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Banh mi cornhole echo park
                                    skateboard authentic crucifix neutra tilde lyft biodiesel artisan direct trade
                                    mumblecore 3 wolf moon twee</p> --}}
                            </div>
                            {{-- 検索ボックス --}}
                            <form action="{{ route('contacts.index') }}" method="get">
                                <input type="text" name="search" placeholder="検索">
                                <input type="submit" value="検索する"
                                    class="mx-auto mb-20 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                            </form>
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                {{-- テーブル開始 --}}
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    {{-- テーブルヘッダー --}}
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                id</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                氏名</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                性別</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                件名</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                お問い合わせ日時</th>
                                            <th
                                                class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                                詳細
                                            </th>
                                        </tr>
                                    </thead>
                                    {{-- テーブルボディー --}}
                                    <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td class="px-4 py-3">{{ $contact->id }}</td>
                                                <td class="px-4 py-3">{{ $contact->name }}</td>
                                                <td class="px-4 py-3">
                                                    @if ($contact->gender === 0)
                                                        男性
                                                    @else
                                                        女性
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3">{{ $contact->title }}</td>
                                                <td class="px-4 py-3">{{ $contact->created_at }}</td>
                                                <td class="px-4 py-3"><a
                                                        href="{{ route('contacts.show', ['id' => $contact->id]) }}">詳細</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- ペジネーション --}}
                                {{ $contacts->links() }}
                            </div>
                        </div>
                    </section>
                    {{-- indexページです。 --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
