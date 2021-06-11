<div class="company-profile">
    <div class="box">
        <div class="copy">
            <h2 class="title">Crea el perfil de <br> tu compañia</h2>
            <p class="description">La reputación de tu empresa es importante para nosotros y para la comunidad Dequr, regístrate y ofrece las respuestas que tus consumidores
                necesitan.</p>
            @if(isset($user))
                <a href="{{route('profile.index')}}" class="create-profile">Crear mi perfil</a>
            @else
                <a href="{{route('login')}}" class="create-profile">Crear mi perfil</a>
            @endif
        </div>
        <div class="wrap-image">
            <img src="{{asset('asset/frontend/assets/img/brands-business.png')}}" alt="Crear perfil de compañia">
        </div>
    </div>
</div>

