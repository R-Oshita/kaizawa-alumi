//ページトップボタン
const scroll_to_top_btn = document.getElementById('pagetop-wrap');
scroll_to_top_btn.addEventListener('click', scroll_to_top);

//右下のページトップボタンのフェードイン
window.addEventListener('scroll', function () {
  let scrollTop = window.pageYOffset;
  if (scrollTop > 200) { 
    scroll_to_top_btn.classList.add("pagetop-fadein")
  } else {
    scroll_to_top_btn.classList.remove("pagetop-fadein")
  }
});

//ページトップボタン以外のページトップへ
const scroll_to_top_Trigger = document.getElementsByClassName("scroll_to_top");
for (let i = 0; i < scroll_to_top_Trigger.length; i++) {
    scroll_to_top_Trigger[i].addEventListener('click', scroll_to_top);
}

//ページトップへスムースするための関数
function scroll_to_top(){
  window.scroll({top: 0, behavior: 'smooth'});
};

//スムーススクロール
const smoothScrollTrigger1 = document.querySelectorAll('a[href^="#"]:not(.nav-link)');
const smoothScrollTrigger2 = document.querySelectorAll('area[href^="#"]:not(.nav-link)');
let smoothScrollTrigger1array = [].slice.call(smoothScrollTrigger1);
let smoothScrollTrigger2array = [].slice.call(smoothScrollTrigger2);
const smoothScrollTrigger = smoothScrollTrigger1array.concat(smoothScrollTrigger2array);
// 2. 1のaタグにそれぞれクリックイベントを設定
for (let i = 0; i < smoothScrollTrigger.length; i++) {
    smoothScrollTrigger[i].addEventListener('click', (e) => {
        // 3. ターゲットの位置を取得
        e.preventDefault();
        let href = smoothScrollTrigger[i].getAttribute('href'); // 各a要素のリンク先を取得
        let targetElement = document.getElementById(href.replace('#', '')); // リンク先の要素（コンテンツ）を取得
        
        const rect = targetElement.getBoundingClientRect().top; // ブラウザからの高さを取得
        const offset = window.pageYOffset; // 現在のスクロール量を取得
        let windowWidth = window.innerWidth;
        let windowSm = 992;
        let gap = 56;
        if (windowWidth >= windowSm) {//画面幅992px以上の時
          gap = 56;//PC版においてのスクロール後のヘッダーの高さを代入
          if (offset == 0) {//画面幅992px以上の場合において、ページ最上部にいる時（ページ最上部にいる場合、小さくなる前のヘッダーの高さを入れても、小さくなった後のヘッダーの高さを入れても要素に被ります。）
            gap = gap + 58;//がんばって丁度良くなるよう数値を入れる
          }
        } else {//画面幅992px未満の時
          gap = 44;//SP版においてのスクロール後のヘッダーの高さを代入
        }
        const target = rect + offset - gap; //最終的な位置を割り出す
        //alert(gap);//gapの値を出力（動作確認用）
        // 4. スムースにスクロール
        window.scrollTo({
            top: target,
            behavior: 'smooth',
        });
    });
}

//別ページからのアンカーリンク
document.addEventListener("DOMContentLoaded", () => {
  if (location.hash) {
    let gnavheight = document.getElementById('global-navi').offsetHeight;
    setTimeout(() => {
      window.scrollBy(0, - gnavheight);
    },10)
  }
})

//右下のページトップボタンのフェードイン
window.addEventListener('scroll', function () {
  let scrollTop = window.pageYOffset;
  if (scrollTop > 200) { 
    document.getElementById("pagetop-wrap").classList.add("pagetop-fadein")
  } else {
    document.getElementById("pagetop-wrap").classList.remove("pagetop-fadein")
  }
});

//ハンバーガーメニューの開閉
const navbtn = document.getElementById('navbtn1');
const navbtn2 = document.getElementById('navbtn2');
const navbtn3 = document.getElementById('navbtn3');
const navcontent = document.getElementById('nav-outer');
const trigger = document.getElementById('nav-tgl');
let html = document.getElementsByTagName('html');
let body = document.getElementsByTagName('body');
const gnavlinks = document.querySelectorAll(".nav-wrapper a");//ヘッダーメニューの中身を取得
navbtn.addEventListener("click", function() {
  let st = document.documentElement.scrollTop || document.body.scrollTop;
  const scrollbarWidth = window.innerWidth - document.body.clientWidth;
  if(trigger.checked == false) {//チェックを入れる時の動作
    trigger.checked = true;
    navcontent.classList.add('nav-open');
    html[0].classList.add('noscroll');
    body[0].style.paddingRight = scrollbarWidth + 'px';
    navbtn2.setAttribute("tabindex", "0");//閉じるボタンがフォーカスされるように
    for (let i = 0; i < gnavlinks.length; i++) {
      gnavlinks[i].setAttribute("tabindex", "0");//ハンバーガーを開いた時、フォーカスされるように。
    }
    navbtn2.addEventListener("click", function() {
      trigger.checked = false;
      navcontent.classList.remove('nav-open');
      html[0].classList.remove('noscroll');
      body[0].style.paddingRight = 0;
      navbtn2.setAttribute("tabindex", "-1");//閉じるボタンがフォーカスされないように
      for (let i = 0; i < gnavlinks.length; i++) {
        gnavlinks[i].setAttribute("tabindex", "-1");//ハンバーガーを閉じた後、フォーカスされないように。
      }
    });
    navbtn3.addEventListener("click", function() {
      trigger.checked = false;
      navcontent.classList.remove('nav-open');
      html[0].classList.remove('noscroll');
      body[0].style.paddingRight = 0;
      navbtn2.setAttribute("tabindex", "-1");//閉じるボタンがフォーカスされないように
      for (let i = 0; i < gnavlinks.length; i++) {
        gnavlinks[i].setAttribute("tabindex", "-1");//ハンバーガーを閉じた後、フォーカスされないように。
      }
    });

    gnavlinks.forEach( function(element) {
      // ハンバーガーメニュー内のリンクタグをクリックしたら
      element.addEventListener('click',function(){
        // ハンバーガーメニューのcheckedを外す
        trigger.checked = false;
        navcontent.classList.remove('nav-open');
        html[0].classList.remove('noscroll');
        body[0].style.paddingRight = 0;
      });
    });
  }
});
//ページ移動時、もしチェックが入っていたら外す
window.addEventListener('unload',function(){
  if(trigger.checked == true) {
    trigger.checked = false;
  }
});


// slideUp
const slideUp = (el, duration = 300) => {
  el.style.height = el.offsetHeight + "px";
  el.offsetHeight;
  el.style.transitionProperty = "height, margin, padding";
  el.style.transitionDuration = duration + "ms";
  el.style.transitionTimingFunction = "ease";
  el.style.overflow = "hidden";
  el.style.height = 0;
  el.style.paddingTop = 0;
  el.style.paddingBottom = 0;
  el.style.marginTop = 0;
  el.style.marginBottom = 0;
  setTimeout(() => {
    el.style.display = "none";
    el.style.removeProperty("height");
    el.style.removeProperty("padding-top");
    el.style.removeProperty("padding-bottom");
    el.style.removeProperty("margin-top");
    el.style.removeProperty("margin-bottom");
    el.style.removeProperty("overflow");
    el.style.removeProperty("transition-duration");
    el.style.removeProperty("transition-property");
    el.style.removeProperty("transition-timing-function");
  }, duration);
};

// slideDown
const slideDown = (el, duration = 300) => {
  el.style.removeProperty("display");
  let display = window.getComputedStyle(el).display;
  if (display === "none") {
    display = "block";
  }
  el.style.display = display;
  let height = el.offsetHeight;
  el.style.overflow = "hidden";
  el.style.height = 0;
  el.style.paddingTop = 0;
  el.style.paddingBottom = 0;
  el.style.marginTop = 0;
  el.style.marginBottom = 0;
  el.offsetHeight;
  el.style.transitionProperty = "height, margin, padding";
  el.style.transitionDuration = duration + "ms";
  el.style.transitionTimingFunction = "ease";
  el.style.height = height + "px";
  el.style.removeProperty("padding-top");
  el.style.removeProperty("padding-bottom");
  el.style.removeProperty("margin-top");
  el.style.removeProperty("margin-bottom");
  setTimeout(() => {
    el.style.removeProperty("height");
    el.style.removeProperty("overflow");
    el.style.removeProperty("transition-duration");
    el.style.removeProperty("transition-property");
    el.style.removeProperty("transition-timing-function");
  }, duration);
};

// slideToggle
const slideToggle = (el, duration = 300) => {
  if (window.getComputedStyle(el).display === "none") {
    return slideDown(el, duration);
  } else {
    return slideUp(el, duration);
  }
};

//サブメニューにアコーディオンボタンを追加
const submenu = document.querySelectorAll(".navbar-nav > li > .sub-menu");
for (let i = 0; i < submenu.length; i++) {
  submenu[i].insertAdjacentHTML('afterend', '<span class="accordionBtn"></span>');
}

//アコーディオン（ナビゲーション用）
const menu = document.getElementsByClassName("accordionBtn");
for (let i = 0; i < menu.length; i++) {
  let childtrigger = document.getElementsByClassName('accordionBtn')[i];
    if(menu){
      childtrigger.addEventListener('click', function(){
        let childbtn = document.getElementsByClassName('accordionBtn')[i];
        childbtn.classList.toggle('chlidnav-opened');
        const childwrapper = childbtn.previousElementSibling;
        slideToggle(childwrapper, 300);
        childwrapper.classList.toggle('active');
    }, false);
  }
}

//アコーディオン（FAQボックス等のコンテンツ用）
const accbox = document.getElementsByClassName("acc-content-Btn");
for (let i = 0; i < accbox.length; i++) {
  let childtrigger = document.getElementsByClassName('acc-content-Btn')[i];
    if(accbox){
      childtrigger.addEventListener('click', function(){
        let childbtn = document.getElementsByClassName('acc-content-Btn')[i];
        childbtn.classList.toggle('acc-content-opened');
        let childbox = document.getElementsByClassName('acc-content-child')[i];
        slideToggle(childbox, 200);
        childbox.classList.toggle('acc-content-active');
    }, false);
  }
}

//ヘッダーの検索窓
document.addEventListener('click', (e) => {
  if(!e.target.closest('#search-btn-inner')) {
    let searchwrap = document.getElementById('search-btn-inner');
    searchwrap.classList.remove('searchactive');
  } else {
    let searchwrap = document.getElementById('search-btn-inner');
    searchwrap.classList.add('searchactive');
    document.getElementById('s').focus();
  }
})

//上から降りてくるタイプのグローバルナビ
window.addEventListener('scroll', function () {
  let fixnav = document.getElementById('global-navi_fixed');
  let navheight = document.getElementById('header').offsetHeight;
  let scrollTop = window.pageYOffset;
  if (scrollTop > navheight + 10) { 
    fixnav.classList.add("global-navi_fadein")
  } else {
    fixnav.classList.remove("global-navi_fadein")
  }
});

//フェードイン
let els = document.getElementsByClassName('js-fadeIn');
for (let i = 0; i < els.length; i++) {
  els.forEach(function(fadeIn) {
    let windowHeight = window.innerHeight;
    
    window.addEventListener('scroll', function() {
      let offset = fadeIn.getBoundingClientRect().top;
      let scroll = window.scrollY;
      
      if(scroll > offset - windowHeight + 250){
         fadeIn.classList.add('is-scrollIn');
      }
    })
  })
}