{{-- スロット。各ページで共通するヘッダーやナビゲーション等を使いまわす仕様 --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お問い合わせ詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    {{-- form開始 --}}
                    <form action="{{ route('contacts.update', ['id' => $contact->id]) }}" method="post">
                        @csrf
                        <section class="text-gray-600 body-font relative">
                            <div class="container px-5 py-12 mx-auto">
                                <div class="flex flex-col text-center w-full mb-3">
                                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                                        お問い合わせ詳細
                                    </h1>
                                    {{-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr
                                    hexagon brooklyn asymmetrical gentrify.</p> --}}
                                </div>
                                <div class="lg:w-1/2 md:w-2/3 mx-auto flex items-center justify-center">
                                    <div class=" -m-2">
                                        {{-- 名前 --}}
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="name"
                                                    class="leading-7 text-sm text-gray-600">お名前</label>
                                                <input type="text" id="name" name="name"
                                                    value ="{{ $contact->name }}"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        {{-- 件名 --}}
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="title" class="leading-7 text-sm text-gray-600">件名</label>
                                                <input type="text" id="title" name="title"
                                                    value = "{{ $contact->title }}"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        {{-- メールアドレス --}}
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="email"
                                                    class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                                <input type="email" id="email" name="email"
                                                    value = "{{ $contact->email }}"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        {{-- URL --}}
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="url"
                                                    class="leading-7 text-sm text-gray-600">URL</label>
                                                <input type="url" id="url" name="url"
                                                    value = "{{ $contact->url }}"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        {{-- 性別 --}}
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="gender"
                                                    class="leading-7 text-sm text-gray-600">性別</label><br>
                                                <input type="radio" id="gender" name="gender"
                                                    @if ($gender === '男性') checked @endif value="0"
                                                    class="mr-1">男性
                                                <input type="radio" id="gender" name="gender"
                                                    @if ($gender === '女性') checked @endif value="1"
                                                    class="mr-1">女性
                                            </div>
                                        </div>
                                        {{-- 年齢 --}}
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="age" class="leading-7 text-sm text-gray-600">年齢</label>
                                                <select name="age" id="age">
                                                    @for ($i = 10; $i < 81; $i++)
                                                        <option value="{{ $i }}">{{ $i }}歳
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="contact"
                                                    class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
                                                <textarea id="contact" name="contact" value ="{{ $contact->contact }}"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $contact->contact }}</textarea>
                                            </div>
                                        </div>
                                        {{-- *編集 --}}
                                        <div class="p-2 w-full">
                                            <button type="submit"
                                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">上書き</button>
                                        </div>
                                        {{-- *戻る --}}
                                        <div class="p-2 w-full">
                                            <button type="button"
                                                onclick="location.href='{{ route('contacts.show', ['id' => $contact->id]) }}'"
                                                class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">戻る</button>
                                        </div>
                                        <div class="p-2 w-full pt-8 mt-8 border-t border-gray-200 text-center">
                                            <a class="text-indigo-500">example@email.com</a>
                                            <p class="leading-normal my-5">49 Smith St.
                                                <br>Saint Cloud, MN 56301
                                            </p>
                                            <span class="inline-flex">
                                                <a class="text-gray-500">
                                                    <svg fill="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a class="ml-4 text-gray-500">
                                                    <svg fill="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a class="ml-4 text-gray-500">
                                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                        viewBox="0 0 24 24">
                                                        <rect width="20" height="20" x="2" y="2"
                                                            rx="5" ry="5">
                                                        </rect>
                                                        <path
                                                            d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <a class="ml-4 text-gray-500">
                                                    <svg fill="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" class="w-5 h-5"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
