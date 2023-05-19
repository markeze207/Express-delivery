<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>Wildberries</title>
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="relative min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-gray-500 bg-no-repeat bg-cover relative items-center"
     style="background-image: url({{ asset('images/Frame_115.jpg') }});">
    <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
    <div class="sm:max-w-lg w-full p-10 bg-white rounded-xl z-10">
        <div class="text-center">
            <h2 class="mt-5 text-3xl font-bold text-gray-900">
                Отправка формы
            </h2>
            <p class="mt-2 text-sm text-gray-400">Отправьте форму, чтобы мы приняли ваш заказ.</p>
        </div>
        <form class="mt-8 space-y-3" action="{{ route('wildberries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">ФИО</label>
                <input value="{{ old('FN') }}" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" name="FN" type="text" placeholder="Укажите, пожалуйста, ваше ФИО">
                @error('FN')
                <p style="color: red;" class="text-center">ФИО обязательный параметр</p>
                @enderror
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Телефон</label>
                <input value="{{ old('phone') }}" data-phone-pattern class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" name="phone" type="tel">
                @error('phone')
                <p style="color: #ff0000;" class="text-center">Телефон обязательный параметр</p>
                @enderror
            </div>
            <p style="text-align: center; font-size: 17px;" class="font-bold text-gray-500 tracking-wide">Если мобильное приложение WB</p>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Прикрепи QR-Код для получения заказа</label>
                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col rounded-lg border-4 border-dashed w-full h-60 p-10 group text-center">
                        <div class="h-full w-full text-center flex flex-col items-center justify-center items-center  ">
                            <div class="flex flex-auto max-h-48 w-2/5 mx-auto -mt-10">
                                <img class="has-mask h-36 object-center" src="https://img.freepik.com/free-vector/image-upload-concept-landing-page_52683-27130.jpg?size=338&ext=jpg" alt="freepik image">
                            </div>
                            <p class="pointer-none text-gray-500 text-photo"><span class="text-sm">Drag and drop</span> files here <br /> or select a file from your computer</p>
                        </div>
                        <input class="hidden input_photo" name="qr_photo" accept="image/jpeg,image/png" type="file">
                    </label>
                </div>
                <p style="text-align: center; font-size: 17px;" class="font-bold text-gray-500 tracking-wide">Если WB с компьютера</p>
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Код для получения заказа</label>
                <input value="{{ old('order_number') }}" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" name="order_number" type="text" placeholder="Введите 3 цифры указанные на сайте WB">
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Телефон WB</label>
                <input value="{{ old('order_phone') }}" class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" name="order_phone" type="tel" placeholder="Введите последние 4 цифры телефона WB">
            </div>
            <input name="service" value="1" type="hidden">
            @if ($errors->has('qr_photo') || $errors->has('order_phone') || $errors->has('order_number'))
                <p style="color: #ff0000;" class="text-center">Заполните пожалуйста qr код либо номер заказа с телефоном</p>
            @endif
            <div>
                <input type="submit" class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide
               font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script>
    // Phone mask
    var $jscomp=$jscomp||{};$jscomp.scope={};$jscomp.arrayIteratorImpl=function(a){var b=0;return function(){return b<a.length?{done:!1,value:a[b++]}:{done:!0}}};$jscomp.arrayIterator=function(a){return{next:$jscomp.arrayIteratorImpl(a)}};$jscomp.makeIterator=function(a){var b="undefined"!=typeof Symbol&&Symbol.iterator&&a[Symbol.iterator];return b?b.call(a):$jscomp.arrayIterator(a)};
    document.addEventListener("DOMContentLoaded",function(){var a=function(e){var c=e.target,n=c.dataset.phoneClear;c=(c=c.dataset.phonePattern)?c:"+7(___) ___-__-__";var g=0,k=c.replace(/\D/g,""),d=e.target.value.replace(/\D/g,"");"false"!==n&&"blur"===e.type&&d.length<c.match(/([_\d])/g).length?e.target.value="":(k.length>=d.length&&(d=k),e.target.value=c.replace(/./g,function(l){return/[_\d]/.test(l)&&g<d.length?d.charAt(g++):g>=d.length?"":l}))},b=document.querySelectorAll("[data-phone-pattern]");
    b=$jscomp.makeIterator(b);for(var f=b.next();!f.done;f=b.next()){f=f.value;for(var m=$jscomp.makeIterator(["input","blur","focus"]),h=m.next();!h.done;h=m.next())f.addEventListener(h.value,a)}});

    $(document).ready(function() {
        $('.input_photo').change(function() {
            if (this.files[0]) // если выбрали файл
                $('.text-photo').text(this.files[0].name);
        });
    });
</script>

</body>
</html>
