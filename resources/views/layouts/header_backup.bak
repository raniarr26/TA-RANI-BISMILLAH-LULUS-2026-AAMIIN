<style>

/* ===== GLOBAL ===== */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:#f4f8ff;
    overflow-x:hidden;
}

/* ===== HEADER ===== */

header{

    width:100%;

    background:white;

    padding:18px 60px;

    display:flex;
    justify-content:space-between;
    align-items:center;

    position:sticky;

    top:0;

    z-index:999;

    box-shadow:
    0 2px 12px rgba(0,0,0,0.06);
}

/* ===== LOGO ===== */

.logo img{
    width:70px;
}

/* ===== NAVBAR ===== */

nav{

    display:flex;

    align-items:center;

    gap:35px;
}

nav a{

    text-decoration:none;

    color:#222;

    font-weight:600;

    transition:.3s;
}

nav a:hover{

    color:#ff9800;
}

.active{

    color:#ff9800;
}

/* ===== MENU ITEM ===== */

.menu-item{

    position:relative;

    display:flex;

    align-items:center;

    height:80px;
}

/* ===== MEGA MENU ===== */

.mega-menu{

    position:absolute;

    top:80px;

    left:50%;

    transform:translateX(-65%);

    width:95vw;

    max-width:1400px;

    background:#0d47a1;

    padding:35px 30px;

    border-radius:
    0 0 22px 22px;

    display:none;

    grid-template-columns:
    repeat(5,minmax(180px,1fr));

    align-items:flex-start;

    gap:35px;

    z-index:999;

    transition:.3s;

    box-shadow:
    0 18px 35px rgba(0,0,0,0.25);

    overflow-x:auto;
}

/* ===== SHOW MENU ===== */

.menu-item:hover .mega-menu,
.mega-menu:hover{

    display:grid;
}

/* ===== MEGA COLUMN ===== */

.mega-column h3{

    color:white;

    margin-bottom:20px;

    font-size:22px;

    position:relative;

    padding-bottom:10px;
}

.mega-column h3::after{

    content:"";

    position:absolute;

    left:0;
    bottom:0;

    width:80px;
    height:4px;

    background:#ff9800;

    border-radius:10px;
}

/* ===== BUTTON ===== */

.mega-column button{

    width:100%;

    background:none;

    border:none;

    color:white;

    text-align:left;

    margin-bottom:14px;

    cursor:pointer;

    font-size:15px;

    transition:.3s;

    padding:6px 0;

    word-break:break-word;

    line-height:1.7;
}

.mega-column button:hover{

    color:#ff9800;

    transform:translateX(5px);
}

.mega-column a
{ text-decoration:none; }

/* ===== HELPDESK BUTTON ===== */

.helpdesk-btn{

    background:#fb8c00;

    color:white !important;

    padding:12px 22px;

    border-radius:10px;
}

.helpdesk-btn:hover{

    background:#e67e00;

    color:white;
}

/* ===== FOOTER ===== */

footer{

    background:#0d47a1;

    color:white;

    padding:70px 70px 30px;

    margin-top:80px;
}

/* ===== FOOTER CONTAINER ===== */

.footer-container{

    display:grid;

    grid-template-columns:
    repeat(auto-fit,minmax(250px,1fr));

    gap:40px;
}

/* ===== FOOTER BOX ===== */

.footer-box h3{

    margin-bottom:20px;

    font-size:24px;
}

.footer-box p,
.footer-box a{

    line-height:2;

    color:white;

    text-decoration:none;
}

.footer-box a:hover{

    color:#ff9800;
}

/* ===== FOOTER BOTTOM ===== */

.footer-bottom{

    margin-top:45px;

    padding-top:20px;

    border-top:
    1px solid rgba(255,255,255,0.2);

    text-align:center;
}

/* ===== RESPONSIVE ===== */

@media(max-width:950px){

    header{

        flex-direction:column;

        gap:20px;

        padding:20px;
    }

    nav{

        flex-wrap:wrap;

        justify-content:center;
    }

    .mega-menu{

        width:100vw;

        left:0;

        transform:none;

        padding:35px 30px;

        grid-template-columns:1fr;

        gap:20px;

        overflow-y:auto;

        max-height:80vh;
    }

    footer{

        padding:50px 30px 20px;
    }

}

</style>

<!-- ===== HEADER ===== -->

<header>

    <div class="logo">

        <img src="{{ asset('images/logo-polibatam.png') }}">

    </div>

    <nav>

        <!-- ===== BERANDA ===== -->

        <a href="/">
            Beranda
        </a>

<!-- ===== PROGRAM STUDI ===== -->

<div class="menu-item">

    <a href="#">
        Program Studi
    </a>

    <div class="mega-menu">

        <!-- DIPLOMA 2 -->

        <div class="mega-column">

            <h3>
                Diploma 2
            </h3>

            @foreach($prodis->where('kategori', 'Diploma 2') as $prodi)

            <a href="/prodi/detail/{{ $prodi->id }}">

                <button>

                    {{ $prodi->nama_prodi }}

                </button>

            </a>

            @endforeach

        </div>

        <!-- DIPLOMA 3 -->

        <div class="mega-column">

            <h3>
                Diploma 3
            </h3>

            @foreach($prodis->where('kategori', 'Diploma 3') as $prodi)

            <a href="/prodi/detail/{{ $prodi->id }}">

                <button>

                    {{ $prodi->nama_prodi }}

                </button>

            </a>

            @endforeach

        </div>

        <!-- DIPLOMA 4 -->

        <div class="mega-column">

            <h3>
                Diploma 4
            </h3>

            @foreach($prodis->where('kategori', 'Diploma 4') as $prodi)

            <a href="/prodi/detail/{{ $prodi->id }}">

                <button>

                    {{ $prodi->nama_prodi }}

                </button>

            </a>

            @endforeach

        </div>

        <!-- MAGISTER -->

        <div class="mega-column">

            <h3>
                Magister
            </h3>

            @foreach($prodis->where('kategori', 'Magister') as $prodi)

            <a href="/prodi/detail/{{ $prodi->id }}">

                <button>

                    {{ $prodi->nama_prodi }}

                </button>

            </a>

            @endforeach

        </div>

        <!-- PSPPI -->

        <div class="mega-column">

            <h3>
                PSPPI
            </h3>

            @foreach($prodis->where('kategori', 'PSPPI') as $prodi)

            <a href="/prodi/detail/{{ $prodi->id }}">

                <button>

                    {{ $prodi->nama_prodi }}

                </button>

            </a>

            @endforeach

        </div>

    </div>

</div>

<!-- ===== JALUR PENDAFTARAN ===== -->

<div class="menu-item">

   <a href="#">
        Jalur Pendaftaran
    </a>

    <!-- ===== MEGA MENU ===== -->

    <div class="mega-menu">

        @foreach($jalurs->groupBy('kategori') as $kategori => $items)

        <div class="mega-column">

            <h3>

                {{ $kategori }}

            </h3>

            @foreach($items as $jalur)

            <a href="/jalur/detail/{{ $jalur->id }}"
                class="action-btn detail-btn"
            style="text-decoration:none;">
                <button>
                {{ $jalur->nama_jalur }}
                </button>
            </a>

            @endforeach

        </div>

        @endforeach

    </div>

</div>
       

        <!-- ===== FAQ ===== -->

        <a href="/faq">
            FAQ
        </a>

        <!-- ===== KUESIONER ===== -->

        <a href="/kuesioner">
            Kuesioner
        </a>

         <!-- ===== ABOUT US ===== -->
        <a href="/about-us">
             About Us
        </a>

        <!-- ===== HELPDESK ===== -->

        <a href="/helpdesk"
        class="helpdesk-btn">

            Helpdesk

        </a>

    </nav>

</header>