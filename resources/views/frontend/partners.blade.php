@extends('layouts.frontend')

@section('css')
<style>
    i{
        font-size:1.5em;
    }
</style>
@endsection

@section('content')

<div class="container mt-7">
    <div class="row">
        <h2 class="card-title text-dark font-weight-bold text-xl text-center pt-4 pb-4">
           Our Partners 
        </h2>
        <h3 class="text-center pb-2">
            <span class="text-success text-gradient font-weight-bold"> GreenEarth </span> is possible, because of them. 
            <i class="fas fa-seedling text-success text-gradient ms-1"></i>
        </h3>
       
        <div class="col-lg-12">
            <div class="row">
                <div class="row mt-5">
                    <div class="col-lg-4 mb-lg-0 mb-4">
                        <a href="https://icrewsystems.com/en/" target="_blank">
                            <div class="card card-background move-on-hover">
                                <div class="full-background" style="background-image: url('https://media.discordapp.net/attachments/861662752174506035/888037927752462366/icrewsystems-bot.png')"></div>
                                    <div class="card-body pt-12">
                                        <h4 class="text-white font-weight-bolder text-lg"> icrewsystems </h4>
                                        <p> 
                                            A global web development company which is re-imagining the way web works. <br>
                                            Located in Chennai, India. <br>
                                            Sponsored the entire IT infrastructure.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

@endsection
