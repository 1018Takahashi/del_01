@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
    <body class="bg-secondary bg-opacity-25">
        
        <div class="bg-dark">
            <div style="height:3%"></div>
            
            <div id="jp_map" class="bg-dark">
                <div class="okinawa-line"><p class="text-light">test</p></div>
                
                <ul class="tohoku bg-dark" aria-label="北海道">
                    <li class="hokkaido" ><a href="/places/1" style="background-color:#6A5ACD;"><span class="pref_name">北海道</span></a></li>
                </ul>
                
                <ul class="tohoku" aria-label="東北">
                    <li class="aomori"><a href="/places/2"><span class="pref_name">青森</span></a></li>
                    <li class="akita"><a href="/places/5"><span class="pref_name">秋田</span></a></li>
                    <li class="iwate"><a href="/places/3"><span class="pref_name">岩手</span></a></li>
                    <li class="yamagata"><a href="/places/6"><span class="pref_name">山形</span></a></li>
                    <li class="miyagi"><a href="/places/4"><span class="pref_name">宮城</span></a></li>
                    <li class="fukushima"><a href="/places/7"><span class="pref_name">福島</span></a></li>
                </ul>
                
                <ul class="kanto" aria-label="関東">
                    <li class="gunma"><a href="/places/10"><span class="pref_name">群馬</span></a></li>
                    <li class="tochigi"><a href="/places/9"><span class="pref_name">栃木</span></a></li>
                    <li class="ibaraki"><a href="/places/8"><span class="pref_name">茨城</span></a></li>
                    <li class="saitama"><a href="/places/11"><span class="pref_name">埼玉</span></a></li>
                    <li class="chiba"><a href="/places/12"><span class="pref_name">千葉</span></a></li>
                    <li class="tokyo"><a href="/places/13"><span class="pref_name">東京</span></a></li>
                    <li class="kanagawa"><a href="/places/14"><span class="pref_name">神奈川</span></a></li>
                </ul>
                
                <ul class="chubu" aria-label="中部">
                    <li class="nigata"><a href="/places/15"><span class="pref_name">新潟</span></a></li>
                    <li class="toyama"><a href="/places/16"><span class="pref_name">富山</span></a></li>
                    <li class="ishikawa"><a href="/places/17"><span class="pref_name">石川</span></a></li>
                    <li class="fukui"><a href="/places/18"><span class="pref_name">福井</span></a></li>
                    <li class="nagano"><a href="/places/20"><span class="pref_name">長野</span></a></li>
                    <li class="gifu"><a href="/places/21"><span class="pref_name">岐阜</span></a></li>
                    <li class="yamanashi"><a href="/places/19"><span class="pref_name">山梨</span></a></li>
                    <li class="aichi"><a href="/places/23"><span class="pref_name">愛知</span></a></li>
                    <li class="shizuoka"><a href="/places/22"><span class="pref_name">静岡</span></a></li>
                </ul>
                
                <ul class="kansai" aria-label="近畿">
                    <li class="kyoto"><a href="/places/26"><span class="pref_name">京都</span></a></li>
                    <li class="shiga"><a href="/places/25"><span class="pref_name">滋賀</span></a></li>
                    <li class="osaka"><a href="/places/27"><span class="pref_name">大阪</span></a></li>
                    <li class="nara"><a href="/places/29"><span class="pref_name">奈良</span></a></li>
                    <li class="mie"><a href="/places/24"><span class="pref_name">三重</span></a></li>
                    <li class="wakayama"><a href="/places/30"><span class="pref_name">和歌山</span></a></li>
                    <li class="hyogo"><a href="/places/28"><span class="pref_name">兵庫</span></a></li>
                </ul>
                
                <ul class="chugoku" aria-label="中国">
                    <li class="tottori"><a href="/places/31"><span class="pref_name">鳥取</span></a></li>
                    <li class="okayama"><a href="/places/33"><span class="pref_name">岡山</span></a></li>
                    <li class="shimane"><a href="/places/32"><span class="pref_name">島根</span></a></li>
                    <li class="hiroshima"><a href="/places/34"><span class="pref_name">広島</span></a></li>
                    <li class="yamaguchi"><a href="/places/35"><span class="pref_name">山口</span></a></li>
                </ul>
                
                <ul class="shikoku" aria-label="四国">
                    <li class="kagawa"><a href="/places/37"><span class="pref_name">香川</span></a></li>
                    <li class="ehime"><a href="/places/38"><span class="pref_name">愛媛</span></a></li>
                    <li class="tokushima"><a href="/places/36"><span class="pref_name">徳島</span></a></li>
                    <li class="kochi"><a href="/places/39"><span class="pref_name">高知</span></a></li>
                </ul>
                
                <ul class="kyushu" aria-label="九州">
                    <li class="fukuoka"><a href="/places/40"><span class="pref_name">福岡</span></a></li>
                    <li class="saga"><a href="/places/41"><span class="pref_name">佐賀</span></a></li>
                    <li class="nagasaki"><a href="/places/42"><span class="pref_name">長崎</span></a></li>
                    <li class="oita"><a href="/places/44"><span class="pref_name">大分</span></a></li>
                    <li class="kumamoto"><a href="/places/43"><span class="pref_name">熊本</span></a></li>
                    <li class="miyazaki"><a href="/places/45"><span class="pref_name">宮崎</span></a></li>
                    <li class="kagoshima"><a href="/places/46"><span class="pref_name">鹿児島</span></a></li>
                </ul>
                
                <ul class="okinawa" aria-label="沖縄">
                    <li class="okinawa"><a href="/places/47"><span class="pref_name">沖縄</span></a></li>
                </ul>
                
                <ul class="else" aria-label="その他">
                    <li class="else"><a href="/places/48"><span class="pref_name">その他</span></a></li>
                </ul>
                
            </div>
        </div>
    </body>
</html>
@endsection