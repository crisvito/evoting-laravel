<x-guest-layout :title=$title>

    <div class="flex flex-col items-center">

        {{-- home --}}
        <div class="w-10/12 bg-gray-50 h-96 lg:flex pt-12">

            {{-- title --}}
            <div class="welcome-title flex flex-col flex-1 gap-4 text-center lg:text-left">
                <h1 class="lg:text-6xl text-2xl font-bold lg:leading-tight tracking-wider text-gray-700">
                    E-voting
                    <span class="block">Kepala Desa</span>
                </h1>
                <h5 class="tracking-widest text-gray-700 lg:text-base text-md ">Pilihlah Kepala Desa Anda dengan Adil
                </h5>
                <img src={{ asset('assets/img/more.png') }} alt="err" class="w-2/5">
            </div>

            {{-- content-home --}}
            <div class="welcome-home flex-1 lg:mt-0 mt-10">
                <div class="h-5/6 lg:relative flex lg:flex-col justify-center lg:gap-0 gap-5">
                    <img class="lg:absolute top-0 lg:w-1/2 lg:h-auto w-1/4 h-1/4 rounded-lg"
                        src={{ asset('assets/img/alam1.jpg') }} alt="err">

                    <img class="lg:absolute lg:w-1/2 lg:h-auto w-1/4 h-1/4 right-5 top-10 rounded-lg"
                        src={{ asset('assets/img/alam2.jpg') }} alt="err">

                    <img class="lg:absolute lg:w-1/2 lg:h-auto w-1/4 h-1/4 bottom-0 right-32 rounded-lg"
                        src={{ asset('assets/img/alam3.jpg') }} alt="err">
                </div>
            </div>
        </div>

        {{-- more --}}
        <div class="w-10/12">
            <div class="w-3/5">
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, illum totam! Porro ea, laudantium,
                    tenetur magni animi itaque obcaecati quas adipisci cum hic aperiam perspiciatis minus. Corrupti qui
                    vitae voluptatibus?. Jika Ingin Voting Login terlebih dahulu</h1>
                <span class="text-blue-900">
                    <a href="login">Login</a> |
                    <a href="register">Register</a>
                </span>
            </div>
        </div>
    </div>

</x-guest-layout>
