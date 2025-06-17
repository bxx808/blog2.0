@extends('layout.main')

@section('content')
    <form class="article_form">
        <textarea placeholder="Напишите что-нибудь"></textarea>
        <button>
            <img src="{{asset('/images/icons/send.svg')}}">
        </button>
    </form>

    <div class="articles">
        <div class="article">
            <img class="main_photo" src="{{asset('/images/rectangle.jpg')}}">
            <div class="text_content">
                <h2>Как писать код быстро и безболезненно?</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Elementum volutpat orci turpis urna. Et
                    vestibulum, posuere tortor lacinia sit. Sagittis porttitor orci auctor in at tincidunt arcu
                    egestas.
                    Fusce arcu sodales lacinia eu auctor nunc nam id. Diam sit sed volutpat massa. Egestas ornare
                    vel
                    volutpat.
                </p>
                <div class="row">
                    <div class="left">
                        <span>21.06.2020</span>
                        <img src="{{asset('/images/icons/ellipse.svg')}}" alt="">
                        <span>создание сайтов</span>
                    </div>
                    <a href="">читать</a>
                </div>
            </div>
        </div>
    </div>
@endsection
