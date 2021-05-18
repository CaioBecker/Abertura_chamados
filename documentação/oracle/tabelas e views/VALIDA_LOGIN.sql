CREATE OR REPLACE FUNCTION pocomed.VALIDA_SENHA_FUNC_MEDICAMENTOS
(var_login IN VARCHAR2, var_senha IN VARCHAR2)
RETURN VARCHAR2
IS
  --DECLARANDO VARIAVEL DE RETORNO
  var_retorno VARCHAR2(200);

  --DECLARANDO VARIAVEL PARA VERIFICAR FUNCIONARIO
  var_login_func INT;

BEGIN

  --VERIFICA SE EXISTE O LOGIN NA TABELA FUNCIONARIO
  -- 0 - Não existe / 1 - Existe
  SELECT COUNT(*)
  INTO var_login_func
  FROM dbasgu.USUARIOS usu
  INNER JOIN dbasgu.PAPEL_USUARIOS pu
    ON usu.CD_USUARIO =  pu.CD_USUARIO
  WHERE pu.CD_PAPEL IN (318, --PAM
                        333) --PAM ADM
  AND usu.CD_USUARIO = var_login;

  IF FNC_MV2000_HMVPEP(PUSUARIO => var_login, PSENHA => var_senha) = 'USUARIO NAO CADASTRADO'

    THEN var_retorno := 'Usuário não cadastrado';

  ELSIF FNC_MV2000_HMVPEP(PUSUARIO => var_login, PSENHA => var_senha) = 'SENHA INVALIDA'

    THEN var_retorno :=  'Senha inválida';

  ELSIF var_login_func = 0

    THEN var_retorno :=  'Usuário não possui papel';

  ELSIF LENGTH(FNC_MV2000_HMVPEP(PUSUARIO => var_login, PSENHA => var_senha)) = 30
        AND var_login_func > 0

     THEN  var_retorno := 'Login efetuado com sucesso';

  ELSE var_retorno := 'Erro Desconhecido';

END IF;

RETURN var_retorno;

EXCEPTION
WHEN OTHERS THEN
   raise_application_error(-20001,'An error was encountered - '||SQLCODE||' -ERROR- '||SQLERRM);
END;
