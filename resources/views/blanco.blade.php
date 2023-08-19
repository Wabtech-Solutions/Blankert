@isset($auto5Id)
<div class="offer-item">
    <div class="container">
        <div class="offer-title">
            <h1 style="padding-top: 10px;">{{ $Merkauto5 . ' ' . $Typeauto5 . ' ' . $Uitvoeringauto5 }}
            </h1>
        </div>
        <div class="offerte-img"> <img width="200px" style="border-radius: 10px;"
                src="{{ $Afbeeldinggauto5 }}" alt="">
            <center><a href="{{ $URLgauto5 }}/"><button class="offerte-btn"
                        style="margin-right: 20px">Bekijk op de website</button></a>
            </center>
        </div>
        <div class="offer-specs-layout">
            <div class="specs-flex">
                <div class="specs-item">
                    <center>
                        <p class="specs-tr">Brandstof</p>
                        <p class="specs-td">{{ $Brandstofauto5 }}</p>
                    </center>
                </div>
                <div class="specs-item">
                    <center>
                        <p class="specs-tr">Transmissie</p>
                        <p class="specs-td">{{ $Transmissieauto5 }}</p>
                </div>
                <div class="specs-item">
                    <center>
                        <p class="specs-tr">Fiscale waarde</p>
                        <p class="specs-td">€ {{ $FiscaleWaardeauto5 }}</p>
                </div>
                <div class="specs-item">
                    <center>
                        <p class="specs-tr">Bijtelling</p>
                        <p class="specs-td">{{ $Bijtellingauto5 }}</p>
                </div>
            </div>
            <div class="tarieven-box">
                @isset($looptijd1auto5)
                    <div class="tarieven">
                        <p class="tarief-title">{{ $looptijd1auto5 }} maand of langer</p>
                        @isset($looptijd1auto5Tarief1)
                            <p class="tarief-value">€ {{ $looptijd1auto5Tarief1 }},-
                                @isset($btw)
                                    @php
                                        $looptijd1auto5Tarief1BTW = $looptijd1auto5Tarief1 * 1.21;
                                        $looptijd1auto5Tarief1BTWRounded = number_format($looptijd1auto5Tarief1BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd1auto5Tarief1BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd1auto5KM1 }}km </b> per
                                maand (
                                @php
                                    $looptijd1auto5KM112Mnd = $looptijd1auto5KM1 * 12;
                                    $looptijd1auto5KM112MndRoundedTop = ceil($looptijd1auto5KM112Mnd / 1000) * 1000;
                                    $looptijd1auto5KM112MndRounded = number_format($looptijd1auto5KM112MndRoundedTop, 0, '.', '.');
                                @endphp

                                {{ $looptijd1auto5KM112MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                        @isset($looptijd1auto5Tarief2)
                            <p class="tarief-value"> € {{ $looptijd1auto5Tarief2 }},-
                                @isset($btw)
                                    @php
                                        $looptijd1auto5Tarief2BTW = $looptijd1auto5Tarief2 * 1.21;
                                        $looptijd1auto5Tarief2BTWRounded = number_format($looptijd1auto5Tarief2BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd1auto5Tarief2BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd1auto5KM2 }}km </b> per
                                maand (
                                @php
                                    $looptijd1auto5KM212Mnd = $looptijd1auto5KM2 * 12;
                                    $looptijd1auto5KM212MndRoundedTop = ceil($looptijd1auto5KM212Mnd / 1000) * 1000;
                                    $looptijd1auto5KM212MndRounded = number_format($looptijd1auto5KM212MndRoundedTop, 0, '.', '.');
                                @endphp
                                {{ $looptijd1auto5KM212MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                        @isset($looptijd1auto5KM3)
                            <p class="tarief-value"> € {{ $looptijd1auto5Tarief3 }},-
                                @isset($btw)
                                    @php
                                        $looptijd1auto5Tarief3BTW = $looptijd1auto5Tarief3 * 1.21;
                                        $looptijd1auto5Tarief3BTWRounded = number_format($looptijd1auto5Tarief3BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd1auto5Tarief3BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd1auto5KM3 }}km </b> per
                                maand (

                                @php
                                    $looptijd1auto5KM312Mnd = $looptijd1auto5KM3 * 12;
                                    $looptijd1auto5KM312MndRoundedTop = ceil($looptijd1auto5KM312Mnd / 1000) * 1000;
                                    $looptijd1auto5KM312MndRounded = number_format($looptijd1auto5KM312MndRoundedTop, 0, '.', '.');
                                @endphp

                                {{ $looptijd1auto5KM312MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                    </div>
                @else
                @endisset
                @isset($looptijd2auto5)
                    <div class="tarieven">
                        <p class="tarief-title">{{ $looptijd2auto5 }} maand of langer</p>
                        @isset($looptijd2auto5Tarief1)
                            <p class="tarief-value">€ {{ $looptijd2auto5Tarief1 }},-
                                @isset($btw)
                                    @php
                                        $looptijd2auto5Tarief1BTW = $looptijd2auto5Tarief1 * 1.21;
                                        $looptijd2auto5Tarief1BTWRounded = number_format($looptijd2auto5Tarief1BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd2auto5Tarief1BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd2auto5KM1 }}km </b> per
                                maand (
                                @php
                                    $looptijd2auto5KM112Mnd = $looptijd2auto5KM1 * 12;
                                    $looptijd2auto5KM112MndRoundedTop = ceil($looptijd2auto5KM112Mnd / 1000) * 1000;
                                    $looptijd2auto5KM112MndRounded = number_format($looptijd2auto5KM112MndRoundedTop, 0, '.', '.');
                                @endphp

                                {{ $looptijd2auto5KM112MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                        @isset($looptijd2auto5Tarief2)
                            <p class="tarief-value"> € {{ $looptijd2auto5Tarief2 }},-
                                @isset($btw)
                                    @php
                                        $looptijd2auto5Tarief2BTW = $looptijd2auto5Tarief2 * 1.21;
                                        $looptijd2auto5Tarief2BTWRounded = number_format($looptijd2auto5Tarief2BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd2auto5Tarief2BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd2auto5KM2 }}km </b> per
                                maand (

                                @php
                                    $looptijd2auto5KM212Mnd = $looptijd2auto5KM2 * 12;
                                    $looptijd2auto5KM212MndRoundedTop = ceil($looptijd2auto5KM212Mnd / 1000) * 1000;
                                    $looptijd2auto5KM212MndRounded = number_format($looptijd2auto5KM212MndRoundedTop, 0, '.', '.');
                                @endphp

                                {{ $looptijd2auto5KM212MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                        @isset($looptijd2auto5KM3)
                            <p class="tarief-value"> € {{ $looptijd2auto5Tarief3 }},-
                                @isset($btw)
                                    @php
                                        $looptijd2auto5Tarief3BTW = $looptijd2auto5Tarief3 * 1.21;
                                        $looptijd2auto5Tarief3BTWRounded = number_format($looptijd2auto5Tarief3BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd2auto5Tarief3BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd2auto5KM3 }}km </b> per
                                maand (
                                @php
                                    $looptijd2auto5KM312Mnd = $looptijd2auto5KM3 * 12;
                                    $looptijd2auto5KM312MndRoundedTop = ceil($looptijd2auto5KM312Mnd / 1000) * 1000;
                                    $looptijd2auto5KM312MndRounded = number_format($looptijd2auto5KM312MndRoundedTop, 0, '.', '.');
                                @endphp
                                {{ $looptijd2auto5KM312MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                    </div>
                @else
                @endisset
                @isset($looptijd3auto5)
                    <div class="tarieven">
                        <p class="tarief-title">{{ $looptijd3auto5 }} maand of langer</p>
                        @isset($looptijd3auto5Tarief1)
                            <p class="tarief-value">€ {{ $looptijd3auto5Tarief1 }},-
                                @isset($btw)
                                    @php
                                        $looptijd3auto5Tarief1BTW = $looptijd3auto5Tarief1 * 1.21;
                                        $looptijd3auto5Tarief1BTWRounded = number_format($looptijd3auto5Tarief1BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd3auto5Tarief1BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd3auto5KM1 }}km </b> per
                                maand (
                                @php
                                    $looptijd3auto5KM112Mnd = $looptijd3auto5KM1 * 12;
                                    $looptijd3auto5KM112MndRoundedTop = ceil($looptijd3auto5KM112Mnd / 1000) * 1000;
                                    $looptijd3auto5KM112MndRounded = number_format($looptijd3auto5KM112MndRoundedTop, 0, '.', '.');
                                @endphp
                                {{ $looptijd3auto5KM112MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                        @isset($looptijd3auto5Tarief2)
                            <p class="tarief-value"> € {{ $looptijd3auto5Tarief2 }},-
                                @isset($btw)
                                    @php
                                        $looptijd3auto5Tarief2BTW = $looptijd3auto5Tarief2 * 1.21;
                                        $looptijd3auto5Tarief2BTWRounded = number_format($looptijd3auto5Tarief2BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd3auto5Tarief2BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd3auto5KM2 }}km </b> per
                                maand (
                                @php
                                    $looptijd3auto5KM212Mnd = $looptijd3auto5KM2 * 12;
                                    $looptijd3auto5KM212MndRoundedTop = ceil($looptijd3auto5KM212Mnd / 1000) * 1000;
                                    $looptijd3auto5KM212MndRounded = number_format($looptijd3auto5KM212MndRoundedTop, 0, '.', '.');
                                @endphp
                                {{ $looptijd3auto5KM212MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                        @isset($looptijd3auto5KM3)
                            <p class="tarief-value"> € {{ $looptijd3auto5Tarief3 }},-
                                @isset($btw)
                                    @php
                                        $looptijd3auto5Tarief3BTW = $looptijd3auto5Tarief3 * 1.21;
                                        $looptijd3auto5Tarief3BTWRounded = number_format($looptijd3auto5Tarief3BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd3auto5Tarief3BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd3auto5KM3 }}km </b> per
                                maand (
                                @php
                                    $looptijd3auto5KM312Mnd = $looptijd3auto5KM3 * 12;
                                    $looptijd3auto5KM312MndRoundedTop = ceil($looptijd3auto5KM312Mnd / 1000) * 1000;
                                    $looptijd3auto5KM312MndRounded = number_format($looptijd3auto5KM312MndRoundedTop, 0, '.', '.');
                                @endphp
                                {{ $looptijd3auto5KM312MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                    </div>
                @else
                @endisset
                @isset($looptijd4auto5)
                    <div class="tarieven">
                        <p class="tarief-title">{{ $looptijd4auto5 }} maand of langer</p>
                        @isset($looptijd4auto5Tarief1)
                            <p class="tarief-value">€ {{ $looptijd4auto5Tarief1 }},-
                                @isset($btw)
                                    @php
                                        $looptijd4auto5Tarief1BTW = $looptijd4auto5Tarief1 * 1.21;
                                        $looptijd4auto5Tarief1BTWRounded = number_format($looptijd4auto5Tarief1BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd4auto5Tarief1BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd4auto5KM1 }}km </b> per
                                maand (
                                @php
                                    $looptijd4auto5KM112Mnd = $looptijd4auto5KM1 * 12;
                                    $looptijd4auto5KM112MndRoundedTop = ceil($looptijd4auto5KM112Mnd / 1000) * 1000;
                                    $looptijd4auto5KM112MndRounded = number_format($looptijd4auto5KM112MndRoundedTop, 0, '.', '.');
                                @endphp

                                {{ $looptijd4auto5KM112MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                        @isset($looptijd4auto5Tarief2)
                            <p class="tarief-value"> € {{ $looptijd4auto5Tarief2 }},-
                                @isset($btw)
                                    @php
                                        $looptijd4auto5Tarief2BTW = $looptijd4auto5Tarief2 * 1.21;
                                        $looptijd4auto5Tarief2BTWRounded = number_format($looptijd4auto5Tarief2BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd4auto5Tarief2BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd4auto5KM2 }}km </b> per
                                maand (
                                @php
                                    $looptijd4auto5KM212Mnd = $looptijd4auto5KM2 * 12;
                                    $looptijd4auto5KM212MndRoundedTop = ceil($looptijd4auto5KM212Mnd / 1000) * 1000;
                                    $looptijd4auto5KM212MndRounded = number_format($looptijd4auto5KM212MndRoundedTop, 0, '.', '.');
                                @endphp
                                {{ $looptijd4auto5KM212MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                        @isset($looptijd4auto5KM3)
                            <p class="tarief-value"> € {{ $looptijd4auto5Tarief3 }},-
                                @isset($btw)
                                    @php
                                        $looptijd4auto5Tarief3BTW = $looptijd4auto5Tarief3 * 1.21;
                                        $looptijd4auto5Tarief3BTWRounded = number_format($looptijd4auto5Tarief3BTW, 2, ',', '.');
                                    @endphp
                                    (€ {{ $looptijd4auto5Tarief3BTWRounded }} incl. BTW)
                                @endisset
                                o.b.v. <b>
                                    {{ $looptijd4auto5KM3 }}km </b> per
                                maand (
                                @php
                                    $looptijd4auto5KM312Mnd = $looptijd4auto5KM3 * 12;
                                    $looptijd4auto5KM312MndRoundedTop = ceil($looptijd4auto5KM312Mnd / 1000) * 1000;
                                    $looptijd4auto5KM312MndRounded = number_format($looptijd4auto5KM312MndRoundedTop, 0, '.', '.');
                                @endphp
                                {{ $looptijd4auto5KM312MndRounded }}km per jaar)</p>
                        @else
                        @endisset
                    </div>
                @else
                @endisset
            </div>
        </div>
    </div>
</div>
@endisset
