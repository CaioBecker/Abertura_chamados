<script type="text/javascript">

function foca_data_maior() {

    //DIMINUE DOIS MINUTOS DA DATA DO PEDIDO DA OS

    document.getElementById('data_maior').focus();
    
                    
};

function valida_data() {

    //RECEBE VALORES DO INPUT
    var data_inicial = document.getElementById('data_menor').value;
    var data_final = document.getElementById('data_maior').value;

    //VALIDA SE A DATA INICIAL E NULA
    if(data_inicial == null || data_inicial == undefined || data_inicial == ''){

        alert("Data Inicial está nula");
        document.getElementById('data_menor').value = "";
        window.setTimeout(function ()
        {
            document.getElementById('data_menor').focus();
        }, 0);
        return false; 

        }	

    //VALIDA SE DATA FINAL E MENOR OU IGUAL A DATA INICIAL
    if(data_final <= data_inicial ){

        alert("A Data Final não pode ser menor ou igual a Data Inicial");
        document.getElementById('data_maior').value = "";
        window.setTimeout(function ()
        {
            document.getElementById('data_maior').focus();
        }, 0);
        return false; 

    }				
}
</script>