@extends('layouts.main')
@section('title')
    Home
@endsection

@section('container')
    <div class="min-h-screen dark:bg-gray-800 dark:text-gray-100">
        <div class="py-6 space-y-8">
            <main>
                <div class="container mx-auto space-y-16">
                    <section class="grid gap-6 text-center lg:grid-cols-2 xl:grid-cols-5">
                        <div
                            class="w-full p-6 rounded-md sm:p-16 xl:col-span-2 bg-cyan-200 dark:bg-gray-700 bg-opacity-80 shadow-lg">
                            <span class="block mb-2 dark:text-cyan-400">Apa Relawan TIK ?</span>
                            <h1 class="text-5xl font-extrabold dark:text-gray-50">Relawan TIK</h1>
                            <p class="my-8 font-normal text-justify">
                                <span class="font-medium dark:text-gray-50 "> Organisasi Sosial kemasyarakatan </span> yang
                                bersifat nir-laba, independen, philantrophis, mandiri mendasarkan pada upaya pengembangan
                                pengetahuan, keterampilan ilmu pengetahuan di bidang TIK bagi anggota serta warga
                                masyarakat, aktivitas dirintis sejak tanggal 9 Desember 2008 di Jakarta dan dibentuk
                                kepengurusan di Bangkalan tanggal 23 April 2019.
                            </p>

                        </div>
                        <img src="https://source.unsplash.com/random/480x360" alt=""
                            class="object-cover w-full h-full rounded-md xl:col-span-3 dark:bg-gray-500">
                    </section>
                    <section>
                        <span
                            class="block mb-2 text-xs font-medium tracking-widest uppercase lg:text-center dark:text-cyan-400">How
                            it works</span>
                        <h2 class="text-5xl font-bold lg:text-center dark:text-gray-50">Building with Mamba is simple
                        </h2>
                        <div class="grid gap-6 my-16 lg:grid-cols-3">
                            <div
                                class="flex flex-col p-8 space-y-4 rounded-md bg-cyan-200 dark:bg-gray-700 bg-opacity-80 shadow-lg">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-xl font-bold rounded-full dark:bg-cyan-400 dark:text-gray-900">
                                    1</div>
                                <p class="text-2xl font-semibold">
                                    <b>Nulla.</b>Nostrum, corrupti blanditiis. Illum, architecto?
                                </p>
                            </div>
                            <div
                                class="flex flex-col p-8 space-y-4 rounded-md bg-cyan-200 dark:bg-gray-700 bg-opacity-80 shadow-lg">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-xl font-bold rounded-full dark:bg-cyan-400 dark:text-gray-900">
                                    2</div>
                                <p class="text-2xl font-semibold">
                                    <b>Accusantium.</b>Vitae saepe atque neque sunt eius dolor veniam alias debitis?
                                </p>
                            </div>
                            <div
                                class="flex flex-col p-8 space-y-4 rounded-md bg-cyan-200 dark:bg-gray-700 bg-opacity-80 shadow-lg">
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-12 h-12 text-xl font-bold rounded-full dark:bg-cyan-400 dark:text-gray-900">
                                    3</div>
                                <p class="text-2xl font-semibold">
                                    <b>Maxime.</b>Expedita temporibus culpa reprehenderit doloribus consectetur odio!
                                </p>
                            </div>
                        </div>
                    </section>
                    <section class="grid gap-6 lg:grid-cols-2">
                        <img src="https://source.unsplash.com/random/360x480" alt=""
                            class="object-cover w-full rounded-md max-h-96 dark:bg-gray-500">
                        <div
                            class="flex flex-col items-center w-full p-6 space-y-8 rounded-md lg:h-full lg:p-8 bg-cyan-200 dark:bg-gray-700 bg-opacity-80 shadow-lg">
                            <img src="https://source.unsplash.com/random/100x100" alt=""
                                class="object-cover w-20 h-20 rounded-full dark:bg-gray-500">
                            <blockquote class="max-w-lg text-lg italic font-medium text-center">"Et, dignissimos obcaecati.
                                Recusandae praesentium doloribus vitae? Rem unde atque mollitia!"</blockquote>
                            <div class="text-center dark:text-gray-400">
                                <p>Leroy Jenkins</p>
                                <p>CEO of Company Co.</p>
                            </div>
                            <div class="flex space-x-2">
                                <button type="button" aria-label="Page 1"
                                    class="w-2 h-2 rounded-full dark:bg-gray-50"></button>
                                <button type="button" aria-label="Page 2"
                                    class="w-2 h-2 rounded-full dark:bg-gray-600"></button>
                                <button type="button" aria-label="Page 3"
                                    class="w-2 h-2 rounded-full dark:bg-gray-600"></button>
                                <button type="button" aria-label="Page 4"
                                    class="w-2 h-2 rounded-full dark:bg-gray-600"></button>
                            </div>
                        </div>
                        <div
                            class="p-8 space-y-8 rounded-md lg:col-span-full lg:py-12 bg-cyan-200 dark:bg-gray-700 bg-opacity-80 shadow-lg">
                            <h2 class="text-5xl font-bold dark:text-gray-50">Create with us</h2>
                            <p class="dark:text-gray-400">Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                                Nesciunt facilis quod accusantium beatae cum nam adipisci reiciendis omnis possimus error
                                quo animi voluptas magni, at incidunt. Nulla ex at ullam corporis quidem adipisci vitae,
                                perferendis dolorem libero minus atque tenetur enim pariatur cupiditate commodi in beatae,
                                ipsa eligendi? Quis, saepe.</p>
                        </div>
                    </section>
                    <section>
                        <div class="grid gap-6 lg:grid-cols-3">
                            <div class="overflow-hidden rounded lg:flex lg:col-span-3">
                                <img src="https://source.unsplash.com/random/485x365" alt=""
                                    class="object-cover w-full h-auto max-h-96 dark:bg-gray-500">
                                <div
                                    class="p-6 space-y-6 lg:p-8 md:flex md:flex-col bg-cyan-200 dark:bg-gray-700 bg-opacity-80 shadow-lg">
                                    <span
                                        class="self-start px-3 py-1 text-sm rounded-full dark:bg-cyan-400 dark:text-gray-900">Business</span>
                                    <h2 class="text-3xl font-bold md:flex-1">Curating a workplace that inspires team
                                        movement</h2>
                                    <div>
                                        <p class="dark:text-gray-400">November 30, 2020</p>
                                        <p class="dark:text-gray-400">By Leroy Jenkins</p>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 rounded lg:p-8 lg:py-12 bg-cyan-200 dark:bg-gray-700 bg-opacity-80 shadow-lg">
                                <h3 class="inline font-medium dark:text-gray-50">Panel-based blocks.</h3>
                                <p class="inline">Flexible panels that are perfect for building functional layouts.
                                </p>
                            </div>
                            <div class="p-6 rounded lg:p-8 lg:py-12 bg-cyan-200 dark:bg-gray-700 bg-opacity-80 shadow-lg">
                                <h3 class="inline font-medium dark:text-gray-50">Responsive design.</h3>
                                <p class="inline">Panels look great no matter the device.</p>
                            </div>
                            <div class="p-6 rounded lg:p-8 lg:py-12 bg-cyan-200 dark:bg-gray-700 bg-opacity-80 shadow-lg">
                                <h3 class="inline font-medium dark:text-gray-50">Premium support.</h3>
                                <p class="inline">Join over 50 000 satisfied customers who use our templates.</p>
                            </div>
                        </div>
                    </section>

                    <section class="max-w-screen-xl py-5 mx-auto dark:bg-coolGray-800 dark:text-coolGray-100">
                        <h1 class="border-b mb-2 py-1">LATEST POST</h1>
                        <div class="grid grid-cols-1 gap-5 lg:grid-cols-4 sm:grid-cols-2">
                            @foreach ($posts as $post)
                                <div class="relative flex items-end justify-start w-full text-left bg-center bg-cover h-96 dark:bg-coolGray-500"
                                    style="background-image: url({{ isset($post->image) ? asset('storage/' . $post->image) : 'https://dummyimage.com/200x400/d4d4d4/ffffff&text=Image+not+found' }});">
                                    <div
                                        class="absolute top-0 bottom-0 left-0 right-0 bg-gradient-to-b dark:via-transparent dark:from-coolGray-900 dark:to-coolGray-900">
                                    </div>
                                    <div class="absolute top-0 left-0 right-0 flex items-center justify-between mx-5 mt-3">
                                        <a href="#"
                                            class="px-3 py-2 text-xs font-semibold tracking-wider uppercase dark:text-coolGray-100 bgundefined">{{ $post->category->name }}</a>
                                        <div class="flex flex-col justify-start text-center dark:text-coolGray-100">
                                            <span class="text-3xl font-semibold leading-none tracking-wide">{{ $post->created_at->format('d') }}</span>
                                            <span class="leading-none uppercase">{{ $post->created_at->format('M') }}</span>
                                        </div>
                                    </div>
                                    <h2 class="z-10 p-5">
                                        <a href="#" class="font-medium text-md hover:underline dark:text-coolGray-100">
                                            {{ $post->title }}</a>
                                    </h2>
                                </div>
                            @endforeach
                        </div>
                    </section>

                </div>
            </main>

        </div>
    </div>
@endsection
