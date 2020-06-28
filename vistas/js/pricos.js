$(document).ready(function(){
   
    $("#id_ano_prico").change(function(){

        var año=$("#id_ano_prico").val();

        window.location = "index.php?ruta=pricos&ano_prico="+año;

        //capturamos el indice
        var index=document.getElementById("id_ano_prico").selectedIndex;
        localStorage.setItem("index",index);

       // var devolverIndex=document.getElementById("id_ano_prico").selectedIndex=index;

        if (localStorage.getItem("index") !=null ) {
           // $("#id_ano_prico").val(localStorage.getItem("index"));
            document.getElementById("id_ano_prico").selectedIndex=localStorage.getItem("index");
        } else{

            console.log('NO HAY NADA' )
        }

    })


    $("#btnImprimirPricos").click(function(){
        let urlGet = new URLSearchParams(location.search);
        var prico = urlGet.get('ano_prico');
        console.log(prico)

        window.open("extensiones/tcpdf/pdf/reportePricos.php?ano_prico="+prico,"_blank");

    })

    $("#btnExcelPricos").click(function(){
        let urlGet = new URLSearchParams(location.search);
        var prico = urlGet.get('ano_prico');
        
        window.open("extensiones/PhpSpreadsheet/pruebaExcel.php","_blank");

    })
    
})