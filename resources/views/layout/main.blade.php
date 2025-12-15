<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite(['resources/js/app.js'])
</head>
<body class="">
<div class="user_section">
    @auth()
        <div class="bg" style="background-image: url({{asset(auth()->user()->backProfile)}});">

        </div>
        <div class="user_info">
            <div class="avatar">
                <img src="{{auth()->user()->avatar}}" alt="">
            </div>
            <h1>{{auth()->user()->name}} {{auth()->user()->first_name}}</h1>
            <p>{{auth()->user()->about}}</p>
        </div>
    @else
        <div class="auth">
            <x-forms.auth-form/>
        </div>
    @endauth
</div>
<div class="main_section">
    @if(session('success'))
        <div class="toast toast_success">
            <span>{{session('success')}}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="toast toast_error">
            <span>{{session('error')}}</span>
        </div>
    @endif
    @auth
        <nav class="advantages-nav">
            <div class="">
                <a href="">Главная</a>
                <a href="">Новости</a>
                <a href="">Сообщения</a>
            </div>
            <div class="setting_block">
                <div class="dropdown">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-gear-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                        </svg>
                        Настройки
                    </button>
                    <div class="dropdown_menu">
                        <a href="{{asset('safety')}}" class="dropdown_item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-lock2-fill" viewBox="0 0 16 16">
                                <path d="M7 6a1 1 0 0 1 2 0v1H7z"/>
                                <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2m-2 6v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V8.3c0-.627.46-1.058 1-1.224V6a2 2 0 1 1 4 0"/>
                            </svg>
                            Безопасность</a>
                        <a href="{{asset('general')}}" class="dropdown_item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-x" viewBox="0 0 16 16">
                                <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
                            </svg>
                            Общая информация
                        </a>
                    </div>
                </div>
                @if(auth()->user()?->role == App\Models\User::ROLE_ADMIN)
                    <a href="{{route('admin.index')}}">Админпанель</a>
                @endif
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit">Выход</button>
                </form>
            </div>
        </nav>
    @else
        <!-- Секция с карточками преимуществ -->
        <div class="advantages-section">
            <h2 class="advantages-title">Преимущества блога</h2>
            <div class="advantages-cards">
                <!-- Карточка 1 -->
                <div class="advantage-card">
                    <div class="advantage-icon-container">
                        <div class="advantage-icon">⚡</div>
                    </div>
                    <h3 class="advantage-title">Экспертные знания</h3>
                    <p class="advantage-description">Актуальные статьи о front-end разработке, лучших практиках и
                        современных технологиях. Только проверенная информация от практикующего специалиста.</p>
                </div>

                <!-- Карточка 2 -->
                <div class="advantage-card">
                    <div class="advantage-icon-container">
                        <div class="advantage-icon">🛡️</div>
                    </div>
                    <h3 class="advantage-title">Качественный код</h3>
                    <p class="advantage-description">Примеры кода с подробными объяснениями, лучшие решения для типовых
                        задач и разбор сложных случаев из реальных проектов.</p>
                </div>

                <!-- Карточка 3 -->
                <div class="advantage-card">
                    <div class="advantage-icon-container">
                        <div class="advantage-icon">🚀</div>
                    </div>
                    <h3 class="advantage-title">Практические примеры</h3>
                    <p class="advantage-description">Готовые решения, которые можно применять в своих проектах. От
                        простых компонентов до сложных архитектурных решений.</p>
                </div>
            </div>
        </div>
    @endauth
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>
