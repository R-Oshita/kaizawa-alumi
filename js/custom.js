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
        let windowSm = 992;//ブレイクポイントを変更する場合はここを変更してください。
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
    let gnavheight = document.getElementById('header').offsetHeight;
    setTimeout(() => {
      window.scrollBy(0, - gnavheight);
    },10)
  }
})

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
  }
});
window.addEventListener('DOMContentLoaded', function(){
  window.addEventListener('resize', function(){
    let windowWidth = window.innerWidth;
    let windowSm = 992;//ブレイクポイントを変更する場合はここを変更してください。
    if (windowWidth >= windowSm) {
      for (let i = 0; i < gnavlinks.length; i++) {
        gnavlinks[i].setAttribute("tabindex", "1");//ハンバーガーメニューが開いている状態で画面幅が大きくなった時、aタグがフォーカスされるように。
      }
    }
    if (windowWidth < windowSm) {
      if(trigger.checked == false) {
        for (let i = 0; i < gnavlinks.length; i++) {
          gnavlinks[i].setAttribute("tabindex", "-1");//ハンバーガーメニューが閉じている状態で画面幅が大きくなりまた小さくなった時、aタグがフォーカスされないように。
        }
      }
    }
  });
});

//ページ移動時、もしチェックが入っていたら外す
window.addEventListener('unload',function(){
  if(trigger.checked == true) {
    trigger.checked = false;
  }
});


//フォーカスされている要素を確認するための記述。
/*
window.addEventListener( "keydown", evt => {
  if( evt.key=="Tab" ) {
  console.log(document.activeElement);
  }
} );*/

/* ドロップダウンをフォーカスに対応 */
const hasChildren = document.querySelectorAll(".nav-wrapper .menu-item-has-children > a");
for (let i = 0; i < hasChildren.length; i++) {
  hasChildren[i].addEventListener('focus',function(){
    hasChildren[i].closest('.menu-item-has-children').classList.add('focused');
  });
  hasChildren[i].addEventListener('blur',function(){
    hasChildren[i].closest('.menu-item-has-children').classList.remove('focused');   
  });
}

const children = document.querySelectorAll(".nav-wrapper .menu-item-has-children .sub-menu a"); 
for (let i = 0; i < children.length; i++) {
  children[i].addEventListener('focus',function(){
    children[i].closest('.menu-item-has-children').classList.add('focused');   
  });
  children[i].addEventListener('blur',function(){
    children[i].closest('.menu-item-has-children').classList.remove('focused');  
  });
}
/* //ドロップダウンをフォーカスに対応 */

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
  submenu[i].insertAdjacentHTML('afterend', '<button class="accordionBtn"></button>');
}

//アコーディオン（ナビゲーション用）
const menu = document.getElementsByClassName("accordionBtn");
for (let i = 0; i < menu.length; i++) {
  menu[i].addEventListener('click', function(){
    menu[i].classList.toggle('chlidnav-opened');
    const childwrapper = menu[i].previousElementSibling;
    slideToggle(childwrapper, 300);
    childwrapper.classList.toggle('active');
  }, false);
}

//アコーディオン（FAQボックス等のコンテンツ用）
const accordionHead = document.getElementsByClassName("js-accordion-head");
const accordionContent = document.getElementsByClassName("js-accordion-content");
for (let i = 0; i < accordionHead.length; i++) {
  accordionHead[i].addEventListener('click', function(){
      accordionHead[i].classList.toggle('is-accordion-head-opened');
      slideToggle(accordionContent[i], 300);
      accordionContent[i].classList.toggle('is-accordion-content-active');
  }, false);
}

//ヘッダーの検索窓（検索窓使用しない場合は削除してください。）↓↓
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
//ヘッダーの検索窓（検索窓使用しない場合は削除してください。）↑↑

//上から降りてくるタイプのグローバルナビ（スクロール後用ヘッダー使用しない場合は削除してください）↓↓
const headerlinks_F = document.querySelectorAll("#global-navi_fixed a");
const headerlinks_notF1 = document.querySelectorAll("#pc-top-band a");
const headerlinks_notF2 = document.querySelectorAll("#global-navi a");
let searchinput = document.getElementById('s');
let searchbtn = document.getElementById('searchsubmit');
for (let i = 0; i < headerlinks_F.length; i++) {
  headerlinks_F[i].setAttribute("tabindex", "-1");
}
window.addEventListener('scroll', function () {
  let fixnav = document.getElementById('global-navi_fixed');
  let navheight = document.getElementById('header').offsetHeight;
  let scrollTop = window.pageYOffset;
  if (scrollTop > navheight + 10) { 
    fixnav.classList.add("global-navi_fadein");
    for (let i = 0; i < headerlinks_F.length; i++) {
      headerlinks_F[i].setAttribute("tabindex", "0");
    }
    for (let i = 0; i < headerlinks_notF1.length; i++) {
      headerlinks_notF1[i].setAttribute("tabindex", "-1");
    }
    for (let i = 0; i < headerlinks_notF2.length; i++) {
      headerlinks_notF2[i].setAttribute("tabindex", "-1");
    }
    searchinput.setAttribute("tabindex", "-1");
    searchbtn.setAttribute("tabindex", "-1");
  } else {
    fixnav.classList.remove("global-navi_fadein");
    for (let i = 0; i < headerlinks_F.length; i++) {
      headerlinks_F[i].setAttribute("tabindex", "-1");
    }
    for (let i = 0; i < headerlinks_notF1.length; i++) {
      headerlinks_notF1[i].setAttribute("tabindex", "0");
    }
    for (let i = 0; i < headerlinks_notF2.length; i++) {
      headerlinks_notF2[i].setAttribute("tabindex", "0");
    }
    searchinput.setAttribute("tabindex", "0");
    searchbtn.setAttribute("tabindex", "0");
  }
});
//上から降りてくるタイプのグローバルナビ（スクロール後用ヘッダー使用しない場合は削除してください）↑↑

//フェードイン等スクロール発火エフェクト用
window.addEventListener("DOMContentLoaded", () => {
  const items = document.querySelectorAll(".scrollcheck");
  let isScroll = true;
  let fromBtm = 300;

  function onScroll() {
    isScroll = true;

    items.forEach(item => {
      let rect = item.getBoundingClientRect();
      if (rect.top < window.innerHeight - fromBtm) {
        item.classList.add("scrolled");
      };
    });
  };
  onScroll();

  window.addEventListener("scroll", e => {
    if (isScroll) {
      requestAnimationFrame(onScroll);
      isScroll = false;
    };
  }, {passive: true});
});