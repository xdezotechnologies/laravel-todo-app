<head>

    @livewireStyles

</head>

<body>



    <div>
        {{-- Care about people's approval and you will be their prisoner. --}}
        <h1>Hello World!</h1>
        <div style="text-align: center">

        <button wire:click="increment">+</button>

        <h1>{{ $count }}</h1>

    </div>



    @livewireScripts

</body>

</html>
