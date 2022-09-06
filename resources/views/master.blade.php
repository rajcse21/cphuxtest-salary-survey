<html>
    <head>
        <title>CPHUX Salary Survey - @yield('title')</title>
        @vite('resources/css/app.css')
        @livewireStyles
    </head>
    <body>
        @section('header')
      
            <div class="flex items-center justify-between">
      <h2 class="text-4xl text-gray-900 dark:text-white text-center">CPHUX - Salary Survey</h2>
    </div>
    <section>
      <header class="bg-white justify-right  space-y-2 p-4 sm:px-8 sm:py-6 lg:p-4 xl:px-8 xl:py-6">
            <a  href="/" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Homepage</a>
            <a href="/import-survey" type="button" class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Import Salary Survey</a>        
      </header>
    </section>
        @show
 
        <div class="container">
            @yield('content')
        </div>
        @livewireScripts
    </body>
</html>