<?php




$datatime1 = new DateTime($dataIni);
$datatime2 = new DateTime($dataFim);

$intervaloEmMinuto = new DateInterval('PT1M');
$periodo = new DatePeriod($datatime1, $intervaloEmMinuto, $datatime2);
$minutos = 0;
foreach ($periodo as $data) {
        /* @var $data \DateTime */
        $dataEmMinuto = clone $data;

        $inicioDoPrimeiroTurno = clone $dataEmMinuto->setTime(7, 30, 0);
        $fimDoPrimeiroTurno = clone $dataEmMinuto->setTime(12, 0, 0);
        $inicioDoSegundoTurno = clone $dataEmMinuto->setTime(13, 0, 0);
        $fimDoSegundoTurno = clone $dataEmMinuto->setTime(18, 0, 0);

        if (($inicioDoPrimeiroTurno < $data && $data < $fimDoPrimeiroTurno) || ($inicioDoSegundoTurno < $data && $data < $fimDoSegundoTurno)) {
                $minutos++;
        }
}

$intervalo = new DateInterval("PT{$minutos}M");
$data = new DateTime();
$dataAtual = clone $data;
$data->add($intervalo);
$horasUteisEntreDuasDatas = $dataAtual->diff($data);
echo '</br>Horas úteis entre duas datas: '. $horasUteisEntreDuasDatas->format('%d dias %H horas %i minutos');
?>