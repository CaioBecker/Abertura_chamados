<script type="text/javascript">
     ////////////////////////////
    //////////DATA FIM//////////
   ////////////////////////////
    function valida_data_encerramento() {

        var hr_inicial = document.getElementById('id_hr_inicial').value;
        var hr_final = document.getElementById('id_hr_final').value;
        var data_pedido = document.getElementById('id_data_pedido').value;
        var data_fim = document.getElementById('id_data_encerramento').value;

        if(data_fim <= data_pedido && data_pedido != ''){
            alert("Data De Encerramento Não Pode Ser Menor Que A Data Pedido");
            document.getElementById('id_data_encerramento').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_encerramento').focus();
            }, 0);

            
        }

          if(data_fim <= hr_inicial && hr_inicial != ''){    
            alert("A Data De Encerramento Não Pode Ser Menor Que A Data Inicial");   
            document.getElementById('id_data_encerramento').value = "";
            window.setTimeout(function ()
            {
                document.getElementById('id_data_encerramento').focus();
            }, 0)       
        }   
    }
     /////////////////////////////
    //////////HORA FINAL/////////
   /////////////////////////////
    function valida_hora_final(){

        var hr_inicial = document.getElementById('id_hr_inicial').value;
        var hr_final = document.getElementById('id_hr_final').value;
        var data_pedido = document.getElementById('id_data_pedido').value;
        var data_fim = document.getElementById('id_data_encerramento').value;

        if(hr_final <= hr_inicial && hr_inicial != ''){
            alert("A Data Final Não Pode Ser menor Ou Igual A Data Inicial");
            document.getElementById('id_hr_final').value = "";
            window.setTimeout(function ()
            {
                document.getElementById('id_hr_final').focus();
            }, 0);    
        }

        if(hr_final <= data_pedido && data_pedido != ''){
            alert("Data De final Não Pode Ser Menor Que A Data Pedido");
            document.getElementById('id_hr_final').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_hr_final').focus();
            }, 0);
        }

        if(data_fim <= hr_final && data_fim != ''){
            alert("A Data Final Não Pode Ser Maior Ou Igual A Data Fim");
            document.getElementById('id_hr_final').value = "";
            window.setTimeout(function ()
            {
                document.getElementById('id_hr_final').focus();
            }, 0);    
        }
    }
     /////////////////////////////
    /////////HORA INICIAL////////
   /////////////////////////////
    function valida_hora_inicial(){

        var hr_inicial = document.getElementById('id_hr_inicial').value;
        var hr_final = document.getElementById('id_hr_final').value;
        var data_pedido = document.getElementById('id_data_pedido').value;
        var data_fim = document.getElementById('id_data_encerramento').value;

        if(hr_inicial <= data_pedido && data_pedido != ''){
            alert("Hora Inicio Não Pode Ser Menor Ou Igual A Data Pedido");
            document.getElementById('id_hr_inicial').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_hr_inicial').focus();
            }, 0);
            return false;
        }  

        if(hr_inicial >= data_fim && data_fim != ''){
            alert("Hora Inicio Não Pode Ser Maior ou Igual A Data Encerramento");
            document.getElementById('id_data_encerramento').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_encerramento').focus();
            }, 0);
            return false;
        }

        if(hr_inicial >= hr_final && hr_final != ""){
            alert("Hora Inicio Não Pode Ser Maior ou Igual A Hora Final");
            document.getElementById('id_hr_final').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_hr_final').focus();
            }, 0);
            return false;
        }
    }
     /////////////////////////////
    /////////DATA PEDIDO/////////
   /////////////////////////////
    function valida_data_pedido_old(){

        var data_inicial = document.getElementById('id_hr_inicial').value;
        var data_final = document.getElementById('id_hr_final').value;
        var data_pedido = document.getElementById('id_data_pedido').value;
        var data_fim = document.getElementById('id_data_encerramento').value;
        var disabled_pedido = document.getElementById('id_data_pedido_show');
        
        if(data_pedido != ''){
            document.getElementById('id_data_pedido').value = data_pedido;
            disabled_pedido.readOnly = true; 
        }
    }
     ///////////////////////////////////
    /////////DATA PEDIDO TESTE/////////
   ///////////////////////////////////  
    function valida_data_pedido(){

        var hr_inicial = document.getElementById('id_hr_inicial').value;
        var hr_final = document.getElementById('id_hr_final').value;
        var data_pedido = document.getElementById('id_data_pedido').value;
        var data_fim = document.getElementById('id_data_encerramento').value;
      
        if(hr_inicial <= data_pedido && hr_inicial != ''){
            alert("Hora Inicio Não Pode Ser Menor Ou Igual A Data Pedido");
            document.getElementById('id_hr_inicial').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_hr_inicial').focus();
            }, 0);
            return false;
        }  
        if(hr_final <= data_pedido && hr_final != ''){
            alert("Hora Final Não Pode Ser Menor Que A Data Pedido");
            document.getElementById('id_hr_final').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_hr_final').focus();
            }, 0);
        }
        if(data_fim <= data_pedido && data_fim != ''){
            alert("Data De Encerramento Não Pode Ser Menor Que A Data Pedido");
            document.getElementById('id_data_encerramento').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_encerramento').focus();
            }, 0);    
        }
    }
</script>