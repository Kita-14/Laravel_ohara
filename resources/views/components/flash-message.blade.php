{{-- 初期値をstatusをinfoに設定 --}}
@props(['status' => 'info'])

{{-- bladeファイル内で生のphpを書く場合 --}}

@php
    if ($status === 'info') {
        $bgColor = 'bg-blue-300';
    }
    if ($status === 'error') {
        $bgColor = 'bg-red-500';
    }
@endphp

{{-- コントローラーから渡ってきたmessageを表示 --}}
@if (session('message'))
    {{ session('message') }}
@endif
