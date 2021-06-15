<script type="text/javascript">

    function valida_data_fim() {

        var data_inicial = document.getElementById('id_data_menor').value;
        var data_final = document.getElementById('id_data_maior').value;
        var data_pedido = document.getElementById('id_data_pedido').value;
        var data_fim = document.getElementById('id_data_encerramento').value;

        if(data_fim <= data_pedido){
            alert("Data De Encerramento Não Pode Ser Menor Que A Data Pedido");
            document.getElementById('id_data_encerramento').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_encerramento').focus();
            }, 0);

            
        }

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

        if(data_final <= data_inicial ){
            alert("A Data Final Não Pode Ser menor Ou Igual A Data Inicial");
            document.getElementById('id_data_maior').value = "";
            window.setTimeout(function ()
            {
                document.getElementById('id_data_maior').focus();
            }, 0);    
        }

        if(data_final <= data_pedido){
            alert("Data De final Não Pode Ser Menor Que A Data Pedido");
            document.getElementById('id_data_final').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_final').focus();
            }, 0);
        }

        if(data_fim <= data_final ){
            alert("A Data Final Não Pode Ser Maior Ou Igual A Data Fim");
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

        if(data_inicial <= data_pedido){
            alert("Hora Inicio Não Pode Ser Menor Ou Igual A Data Pedido");
            document.getElementById('id_data_menor').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_menor').focus();
            }, 0);
            return false;
        }  

        if(data_inicial >= data_fim){
            alert("Hora Inicio Não Pode Ser Maior ou Igual A Data Encerramento");
            document.getElementById('id_data_menor').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_menor').focus();
            }, 0);
            return false;
        }

        if(data_inicial = data_final){
            alert("Hora Inicio Não Pode Ser Igual A Data Final");
            document.getElementById('id_data_menor').value= "";
            window.setTiemout(function ()
            {
                document.getElementById('id_data_menor').focus();
            }, 0);
            return false;
        }
    }

    function valida_data_pedido(){

        var data_inicial = document.getElementById('id_data_menor').value;
        var data_final = document.getElementById('id_data_maior').value;
        var data_pedido = document.getElementById('id_data_pedido').value;
        var data_fim = document.getElementById('id_data_encerramento').value;
        var disabled_pedido = document.getElementById('id_data_pedido');
        
        if(data_pedido != ''){
            document.getElementById('id_data_pedido_hd').value = data_pedido;
            disabled_pedido.disabled = true; 
        }
    }
</script>