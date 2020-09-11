$(document).ready(function(){
    //provera registracije
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
$("#rdugme").click(function(){
    var reime = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$/;
    var reprezime = /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})*$/;
    var reemail = /^[\w]+[\.\_\-\w]*[0-9]{0,3}\@[\w]+([\.][\w]+)+$/;
    var resifra=/^[A-z]{3,}[0-9]{1,}/;
    let ime=$("#rime");
    let prezime=$("#rprezime")
    let email=$("#remejl")
    let lozinka=$("#rlozinka")
    let ponovo=$("#rponlozinka")
    var greske=[];
    if(ime.val()==""){
        greske.push("Niste uneli ime")
        ime.css("border-color","red");
    }
    else if(!reime.test(ime.val())){
        greske.push("Ime nije u dobrom formatu")
        ime.css("border-color","red");

    }
    else{
        ime.css("border-color","green");
    }


    if(prezime.val()==""){
        greske.push("Niste uneli prezime")
        prezime.css("border-color","red");
    }
    else if(!reprezime.test(prezime.val())){
        greske.push("Prezime nije u dobrom formatu")
        prezime.css("border-color","red");

    }
    else{
        prezime.css("border-color","green");
    }


    if(email.val()==""){
        greske.push("Niste uneli E-mail")
        email.css("border-color","red");
    }
    else if(!reemail.test(email.val())){
        greske.push("E-mail nije u dobrom formatu")
        email.css("border-color","red");

    }
    else{
        email.css("border-color","green");
    }


    if(lozinka.val()==""){
        greske.push("Niste uneli lozinku")
        lozinka.css("border-color","red");
    }
    else if(!resifra.test(lozinka.val())){
        greske.push("Lozinka nije u dobrom formatu")
        lozinka.css("border-color","red");

    }
    else{
        lozinka.css("border-color","green");
    }


    if(ponovo.val()==""){
        greske.push("Niste ponovili lozinku")
        ponovo.css("border-color","red");
    }
    else if(ponovo.val()!=lozinka.val()){
        greske.push("Lozinke se ne poklapaju")
        ponovo.css("border-color","red");
    }

    else{
        ponovo.css("border-color","green");
    }
    if(greske.length==0){
        $.ajax({
            url:"/registracija",
            type:'post',
            data:{ime:ime.val(),prezime:prezime.val(),email:email.val(),lozinka:lozinka.val(),ponovo:ponovo.val()},
            success:function(x){
            vratiModel(promenjiva=$("#myModal4"))
            ime.val("")
             prezime.val("")
             email.val("")
             lozinka.val("")
             ponovo.val("")
            },
            error:function(xhr,status,error){
                if(xhr.status==500){
                    vratiModel(promenjiva=$("#myModal5"))
                }
            }
        })
    }
   else{

        var ispis="<ul>"

    for(var i=0;i<greske.length;i++){
    ispis+=`<li>${greske[i]}</li>`


    }
    ispis+="</ul>"

 $("#greske").html(ispis)

    }
})















  $(".fa-question-circle").click(function(){
    $(this).next().toggle();

  })




})
