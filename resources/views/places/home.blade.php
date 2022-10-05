@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
    <body>
        
        <div id="jp_map">
            <ul class="tohoku" aria-label="北海道">
                <li class="hokkaido"><a href="#pref_hokkaido"><span class="pref_name">北海道</span></a></li>
            </ul>
            
            <ul class="tohoku" aria-label="東北">
                <li class="aomori"><a href="#pref_aomori"><span class="pref_name">青森</span></a></li>
                <li class="akita"><a href="#pref_akita"><span class="pref_name">秋田</span></a></li>
                <li class="iwate"><a href="#pref_iwate"><span class="pref_name">岩手</span></a></li>
                <li class="yamagata"><a href="#pref_yamagata"><span class="pref_name">山形</span></a></li>
                <li class="miyagi"><a href="#pref_miyagi"><span class="pref_name">宮城</span></a></li>
                <li class="fukushima"><a href="#pref_fukushima"><span class="pref_name">福島</span></a></li>
            </ul>
            
            <ul class="kanto" aria-label="関東">
                <li class="gunma"><a href="#pref_gunma"><span class="pref_name">群馬</span></a></li>
                <li class="tochigi"><a href="#pref_tochigi"><span class="pref_name">栃木</span></a></li>
                <li class="ibaraki"><a href="#pref_ibaraki"><span class="pref_name">茨城</span></a></li>
                <li class="saitama"><a href="#pref_saitama"><span class="pref_name">埼玉</span></a></li>
                <li class="chiba"><a href="#pref_chiba"><span class="pref_name">千葉</span></a></li>
                <li class="tokyo"><a href="#pref_tokyo"><span class="pref_name">東京</span></a></li>
                <li class="kanagawa"><a href="#pref_kanagawa"><span class="pref_name">神奈川</span></a></li>
            </ul>
            
            <ul class="chubu" aria-label="中部">
                <li class="nigata"><a href="#pref_nigata"><span class="pref_name">新潟</span></a></li>
                <li class="toyama"><a href="#pref_toyama"><span class="pref_name">富山</span></a></li>
                <li class="ishikawa"><a href="#pref_ishikawa"><span class="pref_name">石川</span></a></li>
                <li class="fukui"><a href="#pref_fukui"><span class="pref_name">福井</span></a></li>
                <li class="nagano"><a href="#pref_nagano"><span class="pref_name">長野</span></a></li>
                <li class="gifu"><a href="#pref_gifu"><span class="pref_name">岐阜</span></a></li>
                <li class="yamanashi"><a href="#pref_yamanashi"><span class="pref_name">山梨</span></a></li>
                <li class="aichi"><a href="#pref_aichi"><span class="pref_name">愛知</span></a></li>
                <li class="shizuoka"><a href="#pref_shizuoka"><span class="pref_name">静岡</span></a></li>
            </ul>
            
            <ul class="kansai" aria-label="近畿">
                <li class="kyoto"><a href="#pref_kyoto"><span class="pref_name">京都</span></a></li>
                <li class="shiga"><a href="#pref_shiga"><span class="pref_name">滋賀</span></a></li>
                <li class="osaka"><a href="#pref_osaka"><span class="pref_name">大阪</span></a></li>
                <li class="nara"><a href="#pref_nara"><span class="pref_name">奈良</span></a></li>
                <li class="mie"><a href="#pref_mie"><span class="pref_name">三重</span></a></li>
                <li class="wakayama"><a href="#pref_wakayama"><span class="pref_name">和歌山</span></a></li>
                <li class="hyogo"><a href="#pref_hyougo"><span class="pref_name">兵庫</span></a></li>
            </ul>
            
            <ul class="chugoku" aria-label="中国">
                <li class="tottori"><a href="#pref_tottori"><span class="pref_name">鳥取</span></a></li>
                <li class="okayama"><a href="#pref_okayama"><span class="pref_name">岡山</span></a></li>
                <li class="shimane"><a href="#pref_shimane"><span class="pref_name">島根</span></a></li>
                <li class="hiroshima"><a href="#pref_hiroshima"><span class="pref_name">広島</span></a></li>
                <li class="yamaguchi"><a href="#pref_yamaguchi"><span class="pref_name">山口</span></a></li>
            </ul>
            
            <ul class="shikoku" aria-label="四国">
                <li class="kagawa"><a href="#pref_kagawa"><span class="pref_name">香川</span></a></li>
                <li class="ehime"><a href="#pref_ehime"><span class="pref_name">愛媛</span></a></li>
                <li class="tokushima"><a href="#pref_tokushima"><span class="pref_name">徳島</span></a></li>
                <li class="kochi"><a href="#pref_kouchi"><span class="pref_name">高知</span></a></li>
            </ul>
            
            <ul class="kyushu" aria-label="九州">
                <li class="fukuoka"><a href="#pref_fukuoka"><span class="pref_name">福岡</span></a></li>
                <li class="saga"><a href="#pref_saga"><span class="pref_name">佐賀</span></a></li>
                <li class="nagasaki"><a href="#pref_nagasaki"><span class="pref_name">長崎</span></a></li>
                <li class="oita"><a href="#pref_oita"><span class="pref_name">大分</span></a></li>
                <li class="kumamoto"><a href="#pref_kumamoto"><span class="pref_name">熊本</span></a></li>
                <li class="miyazaki"><a href="#pref_miyazaki"><span class="pref_name">宮崎</span></a></li>
                <li class="kagoshima"><a href="#pref_kagoshima"><span class="pref_name">鹿児島</span></a></li>
            </ul>
            
            <ul class="okinawa" aria-label="沖縄">
                <li class="okinawa"><a href="#pref_okinawa"><span class="pref_name">沖縄</span></a></li>
            </ul>
        </div>
    </body>
</html>
@endsection