$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
$(".obrisiKorisnika").click(function(){
let id=$(this).data('id');

$.ajax({
    url:"/adminPanel/korisnici/"+id,
    type:"DELETE",
    success:function(x){
        window.location.href = "http://127.0.0.1:8000/adminPanel/korisnici";

    },
    error:function(xhr,status,error){
        console.log(xhr,status)
    }

})})
$(".obrisiProizvod").click(function(){
    let id=$(this).data('id');

    $.ajax({
        url:"/adminPanel/proizvodi/"+id,
        type:"DELETE",
        success:function(x){
            window.location.href = "http://127.0.0.1:8000/adminPanel/proizvodi";

        },
        error:function(xhr,status,error){
            console.log(xhr,status)
        }

    })})
    $(".obrisiKomentar").click(function(){
        let id=$(this).data('id');
        let idpr=$(this).data('pr');
        $.ajax({
            url:"/adminPanel/komentari/"+id,
            type:"DELETE",
            success:function(x){
                window.location.href = "http://127.0.0.1:8000/adminPanel/komentari/"+idpr;

            },
            error:function(xhr,status,error){
                console.log(xhr,status)
            }

        })})
        $(".obrisiMarku").click(function(){
            let id=$(this).data('id');

            $.ajax({
                url:"/adminPanel/marke/"+id,
                type:"DELETE",
                success:function(x){
                    window.location.href = "http://127.0.0.1:8000/adminPanel/proizvodi";

                },
                error:function(xhr,status,error){
                    console.log(xhr,status)
                }

            })})

            $("#trazi").keyup(function(){
                let vreme=$(this).val();
                $.ajax({
                url:"/adminPanel/filtriraj?trazi="+vreme,
                dataType:"json",
                type:"get",
                success:function(x){
                    console.log(x)
                    let ispis=`


                      <table class="table table-striped table-valign-middle">
                        <thead>
                        <tr>
                             <th>Ime</th>
                          <th>Prezime</th>
                          <th>E-mail</th>
                            <th>Uloga</th>
                            <th>Status aktivnosti</th>
                              <th>Vreme prijave</th>
                                 <th>Vreme odjave</th>
                                    <th>Datum Azuriranja </th>
                               <th>Datum kreiranja</th>
                                  <th>ID korisnik</th>
                        </tr>
                        </thead>
                        <tbody>`
                        for (var a of x ){
                        ispis+=`<tr>
                          <td>
                         ${a.ime}
                          </td>
                          <td>
                          ${a.prezime}
                          <td>
                          ${a.email}
                          </td>
                          <td>
                          ${a.naziv}
                          </td>
                           <td>`
                           if(a.aktivan==0){
                           ispis+=`
                          Nije aktivan`
                           }
                            else{
                                ispis+=`
                              Aktivan
                          `}
                          ispis+=`
                          </td>

                          <td>`
                          if(a.poslednjaAktivnost==null){
                              ispis+=`
                              Nije se nikada prijavio`}
                              else{

                             ispis+=` ${a.poslednjaAktivnost }`}
                             ispis+=`

                          </td>

                           <td>`
                         if(a.poslednjeOdjavljivanje==null){
                         ispis+=`
                              /`}
                                else{
                                    ispis+=`

                              ${a.poslednjeOdjavljivanje }`}
                              ispis+=`

                          </td>
                            <td>
                            ${a.datumAzuriranja }

                          </td>
                           <td>
                           ${a.datumKreiranja }
                          </td>
                            <td>
                            ${a.idkorisnik }

                          </td>

                        </tr>


                        `
                   }
                   ispis+=`</tbody>
                      </table>`
                    $("#ide").html(ispis)

                },
                error:function(xhr,status,error){
                    console.log(xhr,status)
                }



            })
        })
        $(".marke").click(function(){
            $("#modalmarke").css('display','block')
        })
        $(".marke").click(function(){
            $("#modalmarke").css('display','block')
        })
        $(".marked").click(function(){
            $("#modalmarke").css('display','none')
        })
        $(".dodajm").click(function(){

            $("#formamarka").toggle();
        })


}
)
