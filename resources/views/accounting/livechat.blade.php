
<div class="wrapper">
    
    <div class="notification-badge">
        15
    </div>
    <svg class="bubble" viewBox="0 0 64 65" fill="none" xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="32" cy="32.5" rx="32" ry="32.5" fill="#020D34"/>
        <path d="M43.6455 37.9985C43.545 37.8696 43.4463 37.7407 43.3494 37.6163C42.0174 35.9012 41.2115 34.8661 41.2115 30.0108C41.2115 27.4971 40.6466 25.4346 39.5331 23.8878C38.7121 22.745 37.6023 21.8781 36.1395 21.2375C36.1207 21.2263 36.1038 21.2117 36.0898 21.1943C35.5637 19.3187 34.1239 18.0625 32.5 18.0625C30.8761 18.0625 29.4369 19.3187 28.9108 21.1923C28.8967 21.2091 28.8802 21.2233 28.8617 21.2342C25.4481 22.7302 23.7891 25.6003 23.7891 30.0089C23.7891 34.8661 22.9845 35.9012 21.6512 37.6144C21.5543 37.7388 21.4557 37.8651 21.3551 37.9966C21.0955 38.3299 20.931 38.7354 20.8811 39.1651C20.8312 39.5948 20.898 40.0307 21.0736 40.4213C21.4472 41.2592 22.2434 41.7793 23.1522 41.7793H41.8545C42.7591 41.7793 43.5498 41.2598 43.9246 40.4258C44.1009 40.0351 44.1684 39.5989 44.1189 39.1686C44.0694 38.7384 43.9051 38.3323 43.6455 37.9985ZM32.5 46.9375C33.3749 46.9367 34.2334 46.6839 34.9842 46.2059C35.7351 45.7278 36.3504 45.0423 36.7649 44.2221C36.7845 44.1828 36.7941 44.1388 36.7929 44.0943C36.7918 44.0499 36.7798 44.0065 36.7582 43.9684C36.7367 43.9303 36.7062 43.8989 36.6698 43.877C36.6334 43.8552 36.5924 43.8437 36.5506 43.8438H28.4506C28.4088 43.8436 28.3677 43.855 28.3312 43.8768C28.2947 43.8986 28.2642 43.93 28.2425 43.9681C28.2209 44.0062 28.2089 44.0497 28.2077 44.0942C28.2065 44.1387 28.2161 44.1827 28.2357 44.2221C28.6502 45.0422 29.2654 45.7276 30.0161 46.2057C30.7669 46.6838 31.6252 46.9366 32.5 46.9375Z" fill="#FFF9F9"/>
        </svg>    
    <div class="livechat">
        <div class="header-livechat">
            <h4>Notifikasi</h4>
            <svg class="exit" viewBox="0 0 20 20" fill="none">
                <g clip-path="url(#clip0_2_2)">
                <path d="M2.93 17.07C1.9749 16.1475 1.21308 15.0441 0.688989 13.824C0.164899 12.604 -0.110963 11.2918 -0.122501 9.96402C-0.13404 8.63622 0.118977 7.31943 0.621786 6.09046C1.1246 4.8615 1.86713 3.74498 2.80605 2.80605C3.74498 1.86713 4.8615 1.1246 6.09046 0.621786C7.31943 0.118977 8.63622 -0.13404 9.96402 -0.122501C11.2918 -0.110963 12.604 0.164899 13.824 0.688989C15.0441 1.21308 16.1475 1.9749 17.07 2.93C18.8916 4.81602 19.8995 7.34205 19.8767 9.96402C19.854 12.586 18.8023 15.0941 16.9482 16.9482C15.0941 18.8023 12.586 19.854 9.96402 19.8767C7.34205 19.8995 4.81602 18.8916 2.93 17.07ZM11.4 10L14.23 7.17L12.82 5.76L10 8.59L7.17 5.76L5.76 7.17L8.59 10L5.76 12.83L7.17 14.24L10 11.41L12.83 14.24L14.24 12.83L11.41 10H11.4Z" fill="#FFF1F1"/>
                </g>
                <defs>
                <clipPath id="clip0_2_2">
                <rect width="20" height="20" fill="white"/>
                </clipPath>
                </defs>
            </svg>                    
        </div>
        <div class="content" style="padding: 1em;">
            <div class="chat" style="height: 300px; overflow-y: scroll;">
                @for ($i = 0; $i < 10; $i++)   
                <div class="kotak-notif">
                    <div class="pd-1">
                        <p class="nama">Supplier Sapi</p>
                        <p class="pesan">Invoice Sudah Melewati Batas tanggal</p>
                    </div>
                    <div class="pd-2">
                        <p>Ok</p>
                    </div>
                </div>
                @endfor 
            </div>
        </div>
    </div>
</div>
<script>
    let bubble = document.querySelector('.bubble')
    let exit = document.querySelector('.exit')
    let livechat = document.querySelector('.livechat')

    bubble.addEventListener('click',()=>{
        livechat.classList.add('animate-chat')
    })
    exit.addEventListener('click',()=>{
        livechat.classList.remove('animate-chat')
    })
</script>
<style>
.notification-badge{
    border: 2px solid rgba(2, 13, 52, 0.5);
    position:fixed;
    width: 2em;
    bottom: 7em;
    right: 3em;
    cursor: pointer;
    text-align: center;
    border-radius: 50%;
    background: #020d34;
    color: white;
    z-index: 1;
}
.kotak-notif{
    display: flex;
    justify-content: space-between;
    margin-right: 1em;
    margin-bottom:8px;
    padding-left: 5px; 
    border-radius: 4px;
    height: 50px;
    background-color: rgba(2, 13, 52, 0.5);
}
.pd-2{
    background:#020d34;
    width: 50px;
    padding: 5px;
    cursor: pointer;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 4px;
}
.pd-2 > p{
    margin-top:.8em;
    margin-left:.7em;
    color: white;
    cursor: pointer;
    font-size: small;
}
.pd-1{
    margin-top: 5px;
}
.pd-1 > p.nama{
    font-weight: bold;
    font-size: small;
    margin-bottom: 2px; 
    color: white;
}
.pd-1 > p.pesan{
    font-size: small;
    margin-top: 2px;
    color: white;

}
.livechat{
    background: white;
    position: fixed;
    bottom: 4em;
    right: .5em;
    width: 75%;
    border-radius: 1em;
    box-shadow: 14px 14px 38px 0px #00000000;
    max-width: 350px;
    clip-path: circle(0% at 100% 100%);

   
}
.header-livechat {
    background: #020d34;
    padding: 1em;
    display: flex;
    justify-content: space-between;
    color: white;
    border-top-left-radius: 1em;
    border-top-right-radius: 1em;
}
h4{
    margin: 0;
    font-size: 1.2rem;
    font-weight: bold;
}
.content{
    padding:1em;
}
.chat{
    height: 350px;
    overflow-y: scroll;
}
.chat::-webkit-scrollbar {
    width: 5px; /* lebar scroll */
    border-radius: .5em;
}

.chat::-webkit-scrollbar-track {
    background-color: #f1f1f1; /* warna latar belakang track scroll */
}

.chat::-webkit-scrollbar-thumb {
    background-color: #020d34; /* warna thumb scroll */
}

.chat::-webkit-scrollbar-thumb:hover {
    background-color: #1DD5EF; /* warna thumb scroll saat dihover */
}
.message p.name{
    font-weight: bold;
    margin-bottom: 0;
    margin-top: 0;
}
.message p.msg{
    margin-bottom: 1.5em;
    font-size: small;
}
.message.operator .name{
    color: #1DD5EF;
}
.message.user .name, .message.user .msg {
    text-align: right;
    margin-right: 1em;
}
.send-container{
    display: grid;
    grid-template-columns: 70% auto;
    margin: 1em 0 .5em;
    border-radius: .7em;
    box-shadow: 6px 6px 18px rgba(0, 0, 0, 0.12);
    
}
svg.bubble{
    position:fixed;
    width: 4em;
    bottom: 4em;
    right: .5em;
    cursor: pointer;
}
svg.exit{
    width: 1.5em;;
    cursor: pointer;
}

.animate-chat{
    animation: grow-circle .3s forwards ease-out;
}

@keyframes grow-circle {
    from{
        clip-path: circle(0% at 100% 100%);
    }
    to{
        clip-path: circle(100% at 50% 50%);
    }
}
</style>