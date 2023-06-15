@extends('layouts.navbar')


@section('conteudo')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Uma batalha de cada vez</h1>
            </div>
            <h3 class="lead text-body-secondary">Acerte em tudo que puder acertar. Mas não se torture com seus erros. </h3>
            <h5 class="lead text-body-secondary"> Paulo Coelho</h5>
        </div>
    </section>
    <div class="album">
        <h2 class="text-center mb-5">Sites e canais para estudos</h2>

        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">

                        <img src="{{ asset('images/KhanAcademy.png') }}" alt="Khan Academy" height="225">
                        <div class="card-body">
                            <h5>Khan Academy</h5>
                            <p class="card-text">Somos uma organização sem fins lucrativos com a missão de oferecer uma
                                educação gratuita de alta qualidade para qualquer pessoa, em qualquer lugar.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="https://pt.khanacademy.org/" class="btn btn-sm btn-outline-secondary">Ir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="https://scontent.ffor28-1.fna.fbcdn.net/v/t39.30808-6/288167042_5115661288511946_7686607588288470482_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=09cbfe&_nc_ohc=y2OLsH0HtmcAX8kKhuf&_nc_ht=scontent.ffor28-1.fna&oh=00_AfBO43sSQ_NOlVPQt-e_s_mtPKduIrVLCXMDsjEFRBV5RQ&oe=6490E690"
                         alt="Info escola" height="225">

                        {{-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%"
                                fill="#eceeef" dy=".3em">Not found</text>
                        </svg> --}}
                        <div class="card-body" >
                            <h5>Info escola</h5>
                            <p class="card-text" height="50">
                                Somos um portal de educação que oferece conteúdos sobre vestibulares, Enem, atualidades e conhecimento.
                            <br>⠀</p></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="https://www.infoescola.com/" class="btn btn-sm btn-outline-secondary">Ir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">

                        <img src="https://canaldoensino.com.br/blog/wp-content/uploads/2012/02/logo-2016.png"
                         alt="canal do ensino" height="225">
                        <div class="card-body">
                            <h5>canal do ensino</h5>

                                <p class="card-text">
                                    {{ mb_strimwidth('O Canal do Ensino é um Portal que está no ar desde janeiro de 2012. O portal é focado em compartilhar notícias sobre educação e ensino. Além disso, estão disponíveis no portal, livros de domínio público, cursos gratuitos, vídeo aulas, bolsas de estudo, dicas de concursos, dicas para estudantes e professores, bem como conteúdo sobre tecnologia educacional, mídias e redes sociais na educação.', 0, 185, '...') }}
                                </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="https://canaldoensino.com.br/blog/"
                                        class="btn btn-sm btn-outline-secondary">Ir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">

                        <img src="https://i.ytimg.com/an_webp/INuThdxxEgQ/mqdefault_6s.webp?du=3000&sqp=CKj4rKQG&rs=AOn4CLAJtjdDQXHvfvKYTIlzI6W7VZzVZw"
                         alt="História e Redação - debora aladim" height="225">
                        <div class="card-body">
                            <h5>História e Redação - debora aladim</h5>

                            <p class="card-text">
                                {{ mb_strimwidth('Débora Aladim é mineira, formada em História pela UFMG e desde 2013 faz vídeo-aulas que ajudaram milhões de pessoas a estudar e a passar no vestibular. Aqui você vai encontrar vídeo-aulas de História, um método único para fazer redações modelo ENEM e dicas de estudo! ', 0, 225, '...') }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="https://www.youtube.com/@deboraaladim"
                                        class="btn btn-sm btn-outline-secondary">Ir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">

                        <img src="https://yt3.ggpht.com/vW9wCazYr1ngBuJ2PyAonJtqvJRCCuXQFYgH19Z7XD88jUQfWkexK9qt_Qbed-XkaGPYgzBzkwMx=s640-c-fcrop64=1,00000000ffffffff-nd-v1"
                         alt="Língua Portuguesa - Professor Noslen" height="225">
                        <div class="card-body">
                            <h5>Língua Portuguesa - Professor Noslen</h5>
                            <p class="card-text">Canal voltado para o ensino de toda a Língua Portuguesa, com o intuito de
                                facilitar a aprendizagem de maneira rápida e divertida! Maior canal de educação do Brasil e
                                maior canal de ensino de LP do mundo!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="https://www.youtube.com/@ProfessorNoslen"
                                        class="btn btn-sm btn-outline-secondary">Ir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">

                        <img src="https://yt3.ggpht.com/BJDIvre_sHg3mqEWcZFGo9gPJwW_BP6TuQnFx4GiEcmrXN5Qahp2_8xzDDxaF0bKjybqQ76FFm7Q=s640-c-fcrop64=1,00000000ffffffff-nd-v1"
                         alt="Matemática Rio - Rafael Procopio" height="225">
                        <div class="card-body">
                            <h5>Matemática Rio - Rafael Procopio</h5>
                            <p class="card-text">Matemática para ENEM, vestibular, concurso público, ensino fundamental,
                                ensino médio, ensino superior e o que mais você desejar aprender! Este é o canal Matemática
                                Rio com Professor Rafael Procopio.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="https://www.youtube.com/@MatematicaRio"
                                        class="btn btn-sm btn-outline-secondary">Ir</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
