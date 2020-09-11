
$('.slider').lbSlider({

    leftBtn: '.sa-left', // left button selector
    rightBtn: '.sa-right', // right button selector
    visible: 3, // visible elements quantity
    autoPlay: false, // autoscroll
    autoPlayDelay: 3 // delay of autoscroll in seconds

})
$(document).ready(function(){
    function proizvodUKorpi() {

  return   JSON.parse(localStorage.getItem("products"));

    }


  $(".gg").click(function(){
    izvrsi($(this).data("id"))
  })
  function izvrsi(id){
      var id= id
      var products = proizvodUKorpi();
      if(products) {
          if(productIsAlreadyInCart()) {
              updateQuantity();
          } else {
              addToLocalStorage()
          }
      } else {
          addFirstItemToLocalStorage();}
      alert("Proizvod ste dodali u korpu! Potvrdite kupovinu klikom na korpu!");
      function productIsAlreadyInCart() {
          return products.filter(p => p.id == id).length;}
      function addToLocalStorage() {
          let products = proizvodUKorpi();
          products.push({
              id : id,
              quantity : 1,
          });
          localStorage.setItem("products", JSON.stringify(products));
      }
      function updateQuantity() {
          let products = proizvodUKorpi();
          for(let i in products)
          {
          if(products[i].id == id){
            products.push({
              id : id,
              quantity : 1,
          });
          console.log("ubacuje")
        }}
          localStorage.setItem("products", JSON.stringify(products));
      }



      function addFirstItemToLocalStorage() {
          let products = [];
          products[0] = {
              id : id,
              quantity : 1, }

          localStorage.setItem("products", JSON.stringify(products));}}})

    $(document).ready(function(){
        slideShow();
      });

      function slideShow() {
        var trenutni = $('#slajder .aktivna');
        var next = trenutni.next().length ? trenutni.next() :trenutni.parent().children(':first');

        trenutni.hide().removeClass('aktivna');
        next.fadeIn().addClass('aktivna');

        setTimeout(slideShow, 4000);
      }


$(document).ready(function(){

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// komentariiiii
$("#dugmekom").click(function(){

    var idproiz=$(this).data('idproizvod');
    var idkorisnik=$(this).data('idkorisnik');

    var polje=$("#komentartext").val();
    var greske=0;
    if(polje==""){
        $("#komentartext").css("border-color","red");
        greske=1;
    }
    if(greske==0){
    $.ajax({
        url:"/proizvod",
        method:"post",
        data:{idproiz:idproiz,idkorisnik:idkorisnik,polje:polje},
        success:function(x){

            $("#komentartext").val("");
            dohvatiKomentare(idproiz);
        },error:function(xhr,status,error){
            console.log(xhr,status,error)
        }
    })}
    })


    $("#dugme").click(function(){
        let marke=$("#markal").val();
        let pol=$("#pollista").val();
        let trazi=$("#trazi").val();
        let sort=$("#sort").val();
        let cena=$("#cenas").val();

        $.ajax({
            url:"/proizvodi/prikazi?marke="+marke+"&pol="+pol+"&trazi="+trazi+"&sortiraj="+sort+"&cena="+cena,
            type:"get",
            dataType:"json",
            success:function(x){
                ispisiProizvode(x.data)
                ispisiPaginaciju(x)

                if(x.data.length!=0){
                    $("#brojevi").html("Strana "+x.current_page+" "+"od "+x.last_page)

                 }
                 else{
                    $("#brojevi").html("")
                 }


            },error:function(xhr,status){
                console.log(xhr,status)
            }
        })
    })
function ispisiPaginaciju(x){

    if(x.data.length!=""){
let ispis=`<ul class="pagination">`
if(x.from==1){
    ispis+=`<li class="page-item disabled" aria-disabled="true"  aria-label="» Next">
    <span class="page-link" aria-hidden="true">‹</span>
</li>`}
else{
ispis+=`
<li class="page-item">
<a class="page-link" href="${x.prev_page_url}" rel="prev" aria-label="« Previous">‹</a>
</li>`}

var totalno=Math.ceil(x.total/6);
for(let i=1;i<=totalno;i++){
ispis+=`<li class="page-item"><a class="page-link" href="http://127.0.0.1:8000/proizvodi?page=${i}">${i}</a></li>`}
ispis+=`<li class="page-item">`
if(x.next_page_url==null){
    ispis+=`<li class="page-item disabled" aria-disabled="true"  aria-label="» Next">
    <span class="page-link" aria-hidden="true">›</span>
</li>`}
else{
    ispis+=`
<a class="page-link" href="${x.next_page_url}" rel="next" aria-label="Next »">›</a>`}
ispis+=`
</li>
</ul>`
$(".pag").html(ispis)

}
else{$(".pag").html("")}
}

  function ispisiProizvode(x){
      if(x.length!=""){
      let ispis=""
      for(var proiz of x){
          ispis+=` <div class="proizvod">
          <img src="slike/${proiz.slikamala}" alt="slika"/>
             <p id="marka">${proiz.nazivMarka.toUpperCase()}</p>
             <p id="model">${proiz.model}</p>
             <p id="cena">${proiz.cena },00 RSD</p>

             <a href="/proizvod/${proiz.idproizvod}" class="lopsirno">Opsirnije</a>

            </div>`
      }

      $("#proizvodi").html(ispis)
  }
    else{ $("#proizvodi").html("<h2 class='nemapr'>Nema proizvoda po traženom kriterijumu!</h2>")}
}
    $(document).on("click",".pagination a",function(e){
        e.preventDefault();

       var page=$(this).attr('href').split('page=')[1];
       dohvatiProizvode(page)



    })
    function dohvatiProizvode(page){
        let marke=$("#markal").val();
        let pol=$("#pollista").val();
        let trazi=$("#trazi").val();
        let sort=$("#sort").val();
        let cena=$("#cenas").val();
        $.ajax({
            url:"/proizvodi/prikazi?page="+page+"&marke="+marke+"&pol="+pol+"&trazi="+trazi+"&sortiraj="+sort+"&cena="+cena,
            type:"get",
            dataType:"json",
            success:function(c){
             ispisiProizvode(c.data)
             ispisiPaginaciju(c)

             if(c.data.length!=0){
                $("#brojevi").html("Strana "+c.current_page+" "+"od "+c.last_page)

             }
             else{
                $("#brojevi").html("")
             }


            }
        })}

// ucitavanje bez osvezavanja strane
    function dohvatiKomentare(id){
        let idd=id

        $.ajax({
        url:"/proizvod/"+idd+"/dohvatiKomentareSve",
        method:"get",
        dataType:"json",
        success:function(x){
            console.log(x)

       let ispis=""
        let ispis2=""
        for(var k of x){

     ispis+=`<div id="reader">
     <ol>
     <li>
    <div class="comment_box">
    <div class="inside_comment">
    <div class="comment-meta">
    <div class="commentsuser">${k.ime}</div>`
                              let prom=k.vreme;
                              let niz=["January","February","March","April","May","June","July","August","September","October","November","December"];
                              let datum=new Date(k.vreme);

                              let mesec=niz[datum.getMonth()];

                              ispis+=`<div class="comment_date">${mesec+" "+(datum.getDate())+","+datum.getFullYear()+" "+datum.getHours()+":"+datum.getMinutes()+":"+datum.getSeconds()}</div>
                          </div>
                          <div class="comment-body">
                            <p>${k.komentar}</p>
                          </div>
                        </div></div>`

                        if(k.iduloga=="1"){
                            ispis+=`
                        <span id="upisi">
                    <span class="obrisiKom" data-id=${k.idproizvod } data-idkom=${k.idkomentar}>X</span></span>`}
                    ispis+=`
                        </li>
                        </ol>
                        </div>`
                }
                if(x.length==0){
                    ispis+=`<h3 class="podpoj">Ovaj proizvod nema komentara.</h3>`
                }

                $("#boxovi").html(ispis)
                    if(x.length==0){

                    }
            },error:function(xhr,status,error){
                console.log(xhr,status,error)
    }})}

//brisanje komentara
$("#boxovi").on("click",".obrisiKom",function(){
    var idKom=$(this).data('idkom')
    let idPr=$(this).data("id");
    $.ajax({
        url:"/proizvod/"+idKom,
        method:"delete",
        success:function(x){
            dohvatiKomentare(idPr)
        },error:function(xhr,status,error){
            console.log(xhr,status,error)
        }})})

        function vratiModel(promenjiva){
            var modal2 =promenjiva;
            var span = $(".close");
              modal2.css("display","block");
            span.click (function() {
              modal2.css("display","none");
            })
            window.onclick = function(event) {
              if (event.target == modal2) {
                modal2.css("display","none");}}}
// glasanje
$(".star").click(function(){
    $(".rating-widget").css("pointer-events","none")
$(".rating-widget ul li").css("opacity","0.8")
    var id=$(this).data("pro");
    var vr=$(this).data("value");

    $.ajax({
      url:"/proizvod/"+id+"/proveriGlasanje",
      type:"get",
      dataType:"json",
      success:function(x){
          console.log(x)
      if(x<1){
        upisi(id,vr)

      }
      if(x>=1){
       vratiModel(promenjiva=$("#myModal9"))

      }

      },
      error:function(xhr,status,error){
       vratiModel(promenjiva=$("#myModal8"))

      }


    })})
    function upisi(idpr,vr){
let idproizvod=idpr;
let vre=vr
$.ajax({
url:"/proizvod/glasaj",
type:"post",
data:{vr:vre,idproizvod:idproizvod},
success:function(x){
console.log("uneto")

},
error:function(xhr,status,error){
console.log(xhr.status)
if(xhr.status==401){
vratiModel(promenjiva=$("#myModal8"))
}
}
})}
$("#cenas").change(function(){
$("#tekstc").html($(this).val())

})


  $("#proiztabla tr:odd").css("background-color", "#e4e1e1");
  $("#proiztabla tr:even").css("background-color", "#232e58");
  $("#proiztabla tr:even td").css("color", "white");
  $("#proiztabla tr:even th").css("color", "white");


  // $(".navdugme").css("display","none");
$(".navdugme").click(function(){
  $(this).css("display","none")
  $("#lblCartCount").toggle("slow");
  $(".snip1226").slideDown("slow");
  $("#X").css("display","flex")

})
$("#X").click(function(){
  $(this).css("display","none")
  $("#lblCartCount").toggle("slow");
  $(".snip1226").slideUp("fast");
  $(".navdugme").css("display","block")

})

$("#filterdugme").click(function(){
  $("#filteri").slideToggle();

})})
////////////////////////////////////////////////////////////// modal za uspesnu kupovinu
var modal =$("#myModal");
var span = $(".close");
// if(1==1){
//   modal.css("display","block");

// }

// When the user clicks on <span> (x), close the modal
span.click (function() {
  modal.css("display","none");
})
// When the user clicks anywhere outside of the modal, close it
$(window).click(function(event) {

  if (event.target != modal) {

    modal.css("display","none");
  }
})
/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////// modal za neuspesno ocenjivanje
var modal3 =$("#myModal3");
var span = $(".close");
// if(1==1){
//   modal3.css("display","block");

// }

// When the user clicks on <span> (x), close the modal
span.click (function() {
  modal3.css("display","none");
})
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal3) {
    modal3.css("display","none");
  }
}
/////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////// modal za neuspesnu kupovinu
var modal2 =$("#myModal2");
var span = $(".close");
// if(1==1){
//   modal2.css("display","block");

// }

// When the user clicks on <span> (x), close the modal
span.click (function() {
  modal2.css("display","none");
})
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal2) {
    modal2.css("display","none");
  }
}
/////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// zvezde
$(document).ready(function(){

  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });

  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
$(".ocene tr:odd").css("background-color","#232e58");
$(".ocene tr:even").css("background-color","gray");
$(".oc tr:odd").css("background-color","#232e58");
$(".oc tr:even").css("background-color","gray");
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }})








    $(".star").click(function(){

var vr=$(this).data("value");

$(".rating-widget").css("pointer-events","none")
$(".rating-widget ul li").css("opacity","0.8")
    })


$(".proizvod").hover(
  function() {
    $( this ).css( "box-shadow","0px 0px 5px");

  }, function() {
    $( this ).css( "box-shadow","1px 3px 12px");

  }
);

$(".proizvod").children().hover(
  function() {
    $( this ).css( "opacity","0.9");
  }, function() {
    $( this ).css( "opacity","1");
  })








})

//////////////////////////////

