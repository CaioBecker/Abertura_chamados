
<script type="text/javascript">

    //function foca_data_maior() {

      //  document.getElementById('data_maior').focus();                    
    //};

    //function foca_data_pedido() {

      //  document.getElementById('data_pedido').focus();                    
    //};

    function valida_data_fim() {

        //RECEBE VALORES DO INPUT
        var data_inicial = document.getElementById('id_data_menor').value;
        var data_final = document.getElementById('id_data_maior').value;
        var data_pedido = document.getElementById('id_data_pedido').value;
        var data_fim = document.getElementById('id_data_encerramento').value;

        //VALIDAR SE DATA ENCERRAMENTO E MENOR OU IGUAL QUE A DATA PEDIDO
        if(data_fim <= data_pedido){
            alert("Data De Encerramento Não Pode Ser Menor Que A Data Pedido");
            document.getElementById('id_data_encerramento').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_encerramento').focus();
            }, 0);

            
        }

          //VALIDA SE DATA DE ENCERAMENTO E MENOR QUE A DATA INICIAL
          if(data_fim <= data_inicial ){    
            alert("A Data De Encerramento Não Pode Ser Menor Que A Data Inicial");   
            document.getElementById('id_data_encerramento').value = "";
            window.setTimeout(function ()
            {
                document.getElementById('id_data_encerramento').focus();
            }, 0)       
        }   
    }

    

    function valida_data_final(){

        var data_inicial = document.getElementById('id_data_menor').value;
        var data_final = document.getElementById('id_data_maior').value;
        var data_pedido = document.getElementById('id_data_pedido').value;
        var data_fim = document.getElementById('id_data_encerramento').value;

      //VALIDA SE DATA FINAL E MENOR OU IGUAL A DATA INICIAL
        if(data_final <= data_inicial ){
            alert("A Data Final não pode ser menor ou igual a Data Inicial");
            document.getElementById('id_data_maior').value = "";
            window.setTimeout(function ()
            {
                document.getElementById('id_data_maior').focus();
            }, 0);    
        }

            //VALIDAR SE DATA FINAL E MENOR OU IGUAL A DATA PEDIDO
        if(data_final <= data_pedido){
            alert("Data De final Não Pode Ser Menor Que A Data Pedido");
            document.getElementById('id_data_final').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_final').focus();
            }, 0);
        }

        if(data_fim < data_final ){
            alert("A Data Final não pode ser maior que a Data Fim");
            document.getElementById('id_data_maior').value = "";
            window.setTimeout(function ()
            {
                document.getElementById('id_data_maior').focus();
            }, 0);    
        }

      

    }

    function valida_data_inicial(){

        var data_inicial = document.getElementById('id_data_menor').value;
        var data_final = document.getElementById('id_data_maior').value;
        var data_pedido = document.getElementById('id_data_pedido').value;
        var data_fim = document.getElementById('id_data_encerramento').value;

        //VALIDAR SE DATA INICIO E MENOR QUE DATA PEDIDO
        if(data_inicial < data_pedido){
            alert("Hora Inicio Não Pode Ser Menor Que A Data Pedido");
            document.getElementById('id_data_menor').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_menor').focus();
            }, 0);
            return false;
        }  

    }
</script>