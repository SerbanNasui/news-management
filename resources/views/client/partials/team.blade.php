<section id="team" class="team section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Our Team</h2>
            <p>Teamwork is the ability to work together toward a common vision. The ability to direct individual accomplishments toward organizational objectives. It is the fuel that allows common people to attain uncommon results.</p>
        </div>

        <div class="row">
            @foreach($users as $user)
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            @if($user->profile)
                                <img src="{{ asset('storage/avatars/'.$user->profile->avatar) }}" class="img-fluid" alt="">
                            @else
                                <img src="{{ asset('client/assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
                            @endif
                            <div class="social">
                                <a href="{{ $user->profile->twitter??'#' }}" target="_blank"><i class="bi bi-twitter"></i></a>
                                <a href="{{ $user->profile->facebook??'#' }}" target="_blank"><i class="bi bi-facebook"></i></a>
                                <a href="{{ $user->profile->instagram??'#' }}" target="_blank"><i class="bi bi-instagram"></i></a>
                                <a href="{{ $user->profile->linkedin??'#' }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>{{ $user->name }}</h4>
                            <span>{{ strtoupper($user->roles->first()->name) }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
